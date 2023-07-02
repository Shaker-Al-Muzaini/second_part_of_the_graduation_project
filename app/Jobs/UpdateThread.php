<?php

namespace App\Jobs;

use App\Models\Thread;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Mews\Purifier\Facades\Purifier;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Requests\ThreadStoreRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateThread implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $thread;
    private $attributes;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Thread $thread, array $attributes = [])
    {
        $this->thread = $thread;
        $this->attributes = Arr::only($attributes, [
            'title', 'slug', 'body', 'category_id', 'tags'
        ]);
    }

    public static function fromRequest(Thread $thread, ThreadStoreRequest $request): self
    {
        return new static($thread, [
            'title'         => $request->title(),
            'body'          => Purifier::clean($request->body()),
            'category_id'   => $request->category(),
            'slug'          => Str::slug($request->title()),
            'tags'          => $request->tags(),
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // استعراض الخصائص المحدثة
        $updatedAttributes = $this->attributes;

        // التحقق مما إذا كان هناك تحديث لعنوان الموضوع وتحديث slug إذا كان ذلك صحيحًا
        if (Arr::has($updatedAttributes, 'title')) {
            $this->thread->title = $updatedAttributes['title'];
            if (Arr::has($updatedAttributes, 'slug')) {
                $this->thread->slug = Str::slug($updatedAttributes['slug']);
            }
        }

        // التحقق مما إذا كان هناك تحديث لمحتوى الموضوع
        if (Arr::has($updatedAttributes, 'body')) {
            $this->thread->body = Purifier::clean($updatedAttributes['body']);
        }

        // التحقق مما إذا كان هناك تحديث لفئة الموضوع
        if (Arr::has($updatedAttributes, 'category_id')) {
            // تحديث عدد المرات التي تم فيها اختيار الفئة القديمة (في حالة التغيير)
            $oldCategoryId = $this->thread->category_id;
            if ($oldCategoryId !== $updatedAttributes['category_id']) {
                $oldCategory = Category::find($oldCategoryId);
                $oldCategory->decrement('selected_count');
            }

            // تحديث عدد المرات التي تم فيها اختيار الفئة الجديدة
            $newCategoryId = $updatedAttributes['category_id'];
            $newCategory = Category::find($newCategoryId);
            $newCategory->increment('selected_count');

            $this->thread->category_id = $newCategoryId;
        }

        // التحقق مما إذا كان هناك تحديث للوسوم
        if (Arr::has($updatedAttributes, 'tags')) {
            $this->thread->syncTags($updatedAttributes['tags']);
        }

        $this->thread->save();

        return $this->thread;
    }

}
