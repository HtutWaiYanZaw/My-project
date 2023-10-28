<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fdc-8 fontend project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('storage/company/vendors/fontawesome-free-6.2.1-web/css/all.min.css') }}">
    <style>
        body {
            font: 400 15px Lato, sans-serif;
            line-height: 1.8;
            color: #818181;
        }

        h2 {
            font-size: 24px;
            text-transform: uppercase;
            color: #303030;
            font-weight: 600;
            margin-bottom: 30px;
        }

        h4 {
            font-size: 19px;
            line-height: 1.3em;
            color: #303030;
            font-weight: 400;
            margin-bottom: 30px;
        }

        .navbar {
            background-color: #f4511e;
            z-index: 99999;
            font-size: 12px;
            line-height: 1.4;
            letter-spacing: 4px;
            font-family: Montserrat, sans-serif;
        }

        .navbar .navbar-brand,
        .navbar .navbar-nav a {
            color: #fff;
        }

        .navbar .navbar-nav a:hover,
        .navbar .navbar-nav a.active {
            background-color: #fff;
            color: #f4511e;
        }

        #header {
            background-color: #f4511e;
            color: #fff;
            font-family: Montserrat, sans-serif;
            padding: 100px 0px;
        }

        #header form {
            width: 400px;
            margin: auto;
        }

        .container-fluid {
            padding: 60px 50px;
        }

        .logo {
            color: #f4511e;
            font-size: 200px;
        }

        .bg-grey {
            background-color: #f6f6f6;
        }

        .logo-small {
            color: #f4511e;
            font-size: 50px;
        }

        #my-carousel .carousel-control-next i,
        #my-carousel .carousel-control-prev i {
            color: #f4511e;
            font-size: 40px;
        }

        #my-carousel .carousel-indicators button {
            border: 1px solid #f4511e;
        }

        #my-carousel .carousel-indicators button.active {
            background-color: #f4511e;
        }

        #my-carousel .carousel-inner {
            padding: 30px 0px;
        }

        #pricing .price-box {
            border: 1px solid #f4511e;
            transition: box-shadow 3s;
            margin-bottom: 25px;
        }

        #pricing .price-box:hover {
            box-shadow: 5px 0px 40px rgb(0, 0, 0, 0.3);
        }

        #pricing .price-box-header {
            color: #fff;
            background-color: #f4511e;
            padding: 25px 0px;
            margin-bottom: 5px;
        }

        #pricing .price-box-footer h3 {
            font-size: 32px;
        }

        #pricing .price-box-footer h4 {
            font-size: 14px;
            color: #aaa;
        }

        #pricing .price-box-footer .btn,
        #contact .btn {
            background-color: #f4511e;
            color: #fff;
            margin-bottom: 10px;
        }

        #pricing .price-box-footer .btn:hover,
        #contact .btn:hover {
            background-color: #fff;
            color: #f4511e;
            border: 1px solid #f4511e;
        }

        #footer i{
            font-size:40px;
            color:#f4511e;
            margin-bottom: 20px;
        }

        #footer p{
            font-weight: bold;
        }
        
        #footer p a{
            text-decoration: none;
            color:#f4511e;
        }

        .slideAnimationObject{
            visibility: hidden;
        }

        .slide{
            animation-name: slideDown;
            -webkit-animation-name: slideDown ;
            animation-duration: 1s;
            -webkit-animation-duration: 1s;
            visibility: visible;
        }

        @keyframes slideDown {
            0%{
                opacity: 0;
                transform: translateY(-70%);
            }
            100%{
                opacity: 1;
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slideDown {
            0%{
                opacity: 0;
                transform: translateY(-70%);
            }
            100%{
                opacity: 1;
                transform: translateY(0%);
            }
        }
    </style>
</head>

<body id="my-page">
    <!-- nav -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#about">ABOUT</a>
                    <a class="nav-link" href="#services">SERVICES</a>
                    <a class="nav-link" href="#portfolio">PORTFOLIO</a>
                    <a class="nav-link" href="#pricing">PRICING</a>
                    <a class="nav-link" href="#contact">CONTACT</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- header -->
    <div id="header" class="text-center">
        <h1>Company</h1>
        <p>We specialize in bla bla bla</p>
        <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Subscribe Email">
                <button class="input-group-text bg-danger text-white">Subscribe</button>
            </div>
        </form>
    </div>

    <!-- about -->
    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>About Company Page</h2>
                <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                </p>
                <button class="btn btn-danger">Get In Touch</button>
            </div>
            <div class="col-sm-4 d-flex justify-content-center align-items-center">
                <i class="fas fa-signal logo"></i>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-4 d-flex justify-content-center align-items-center">
                <i class="fas fa-globe logo slideAnimationObject"></i>
            </div>
            <div class="col-sm-8">
                <h2>OUR VALUES</h2>
                <h4><b>MISSION:</b> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
                <p>
                    <b>VISION:</b> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                    enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>
    </div>

    <!-- service -->
    <div id="services" class="container-fluid text-center">
        <h2>Services</h2>
        <h4>What we offer</h4>
        <div class="row my-5 slideAnimationObject">
            <div class="col-md-4">
                <i class="fas fa-power-off logo-small"></i>
                <h4>POWER</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-heart logo-small"></i>
                <h4>LOVE</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-lock logo-small"></i>
                <h4>JOB DONE</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
        </div>
        <div class="row my-5 slideAnimationObject">
            <div class="col-md-4">
                <i class="fas fa-leaf logo-small"></i>
                <h4>GREEN</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-certificate logo-small"></i>
                <h4>CERTIFIED</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-wrench logo-small"></i>
                <h4>HARDWORK</h4>
                <p>Lorem ipsum dolor sit amet..</p>
            </div>
        </div>
    </div>

    <!-- portfolio -->  
    @include('cms.portfolio')        

    <!-- pricing -->
    <div id="pricing" class="container-fluid text-center">
        <h2>Pricing</h2>
        <div class="row slideAnimationObject">
            <div class="col-md-4">
                <div class="price-box">
                    <div class="price-box-header">
                        <h1>Basic</h1>
                    </div>
                    <div class="price-box-body">
                        <p>20 Lorem</p>
                        <p>15 Lorem</p>
                        <p>10 Lorem</p>
                        <p>5 Lorem</p>
                        <p>Endless Amet</p>
                    </div>
                    <div class="price-box-footer">
                        <h3>$ 19</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-box">
                    <div class="price-box-header">
                        <h1>Pro</h1>
                    </div>
                    <div class="price-box-body">
                        <p>20 Lorem</p>
                        <p>15 Lorem</p>
                        <p>10 Lorem</p>
                        <p>5 Lorem</p>
                        <p>Endless Amet</p>
                    </div>
                    <div class="price-box-footer">
                        <h3>$ 39</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="price-box">
                    <div class="price-box-header">
                        <h1>Premium</h1>
                    </div>
                    <div class="price-box-body">
                        <p>20 Lorem</p>
                        <p>15 Lorem</p>
                        <p>10 Lorem</p>
                        <p>5 Lorem</p>
                        <p>Endless Amet</p>
                    </div>
                    <div class="price-box-footer">
                        <h3>$ 59</h3>
                        <h4>per month</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- contact -->
    <div id="contact" class="container-fluid bg-grey">
        <h2 class="text-center">Contact</h2>
        <div class="row">
            <div class="col-md-5">
                <p>Contact us and we'll get back to you within 24 hours.</p>
                <p><i class="fas fa-map-marker-alt"></i>Chicago, US</p>
                <p><i class="fas fa-phone"></i>+00 1515151515</p>
                <p><i class="fas fa-envelope"></i>myemail@something.com</p>
            </div>
            <div class="col-md-7 slideAnimationObject">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="name">
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <textarea class="form-control" rows="5"></textarea>
                    </div>                    
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <button class="btn">Send</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- location map -->
    <img src="./images/map.jpg" alt="location-map" width="100%">

    <!-- footer -->
    <div id="footer" class="container-fluid text-center">
        <a href="#my-page">
            <i class="fas fa-angle-up"></i>
        </a>
        <p>Developed By &nbsp;<a href="https://www.google.com">STRONGFORCE TECHNOLOGY</a></p>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="{{ asset('storage/company/vendors/jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $(window).scroll(()=>{
                let winTop = $(window).scrollTop();
                //console.log(winTop);
                let animatedObjects = $('.slideAnimationObject');
                
                animatedObjects.each(function(){
                    let element = $(this);
                    let elementTopPosition = element.offset().top;
                    console.log(elementTopPosition);
                    if(winTop > elementTopPosition - 600){
                        element.addClass('slide');
                    }
                });

                console.log('------------------');

            });
        });
    </script>
</body>

</html>