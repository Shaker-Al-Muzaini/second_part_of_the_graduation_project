<!DOCTYPE html>
<html lang="en">
<head>
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style>
        .logo-container {
            width: 150px;
            height: 146px;
            position: relative;
            margin: auto;
        }

        .footerSection {
            margin-top: 5rem;
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.1);
            background-color: #051b35;
            padding: 3rem 0;
            color: #ffffff;
        }

        .footerName {
            margin-top: 1rem;
            font-family: 'Raleway', sans-serif;
            font-size: 22px;
            font-weight: 600;
        }

        .social-container {
            margin-top: 30px;
        }

        .social-container .social {
            display: inline-block;
            margin-right: 0.5rem;
            font-size: 1.5rem;
            color: #ffffff;
            transition: transform 250ms;
        }

        .social-container .social:hover {
            transform: translateY(-4px);
        }

        .footerDescription {
            margin-top: 1rem;
            font-family: 'Raleway', sans-serif;
            font-size: 15px;
            font-weight: 400;
        }

        .footerLink {
            text-decoration: none;
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            transition: color 250ms;
        }

        .footerLink:hover {
            color: #ffd900;
        }
    </style>
</head>
<body>
<footer class="footerSection py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="logo-container">
                            <img src="{{asset('img/logo/logo.png')}}" alt="Logo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="footerName">Follow Us</h4>
                        <div class="social-container">
                            <a class="social" href="#"><i class="fab fa-facebook"></i></a>
                            <a class="social" href="#"><i class="fab fa-youtube"></i></a>
                            <a class="social" href="#"><i class="fab fa-linkedin"></i></a>
                            <a class="social" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="social" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="footerName">Address</h4>
                        <ul class="footerLink">
                            <li><i class="fas fa-map"></i> شسيب.</li>
                            <li><i class="fas fa-envelope"></i> شسي</li>
                            <li><i class="fas fa-phone"></i> Phone: شسي68سي6</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="footerName">Information</h4>
                        <ul class="footerLink">
                            <li><a href="#">About Me</a></li>
                            <li><a href="#">Company Profile</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
