<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Bookkeeping</title>
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">


</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <a class="navbar-brand" href="index.html">LOGO</a>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="index.html">HOME</a></li>
                    <li class="nav-item"><a href="about.html">ABOUT</a></li>
                    <li class="nav-item"><a href="project.html">CONTACT</a></li>
                    <li class="nav-item"><a href="login.php">SIGN IN</a></li>
                    <li class="nav-item"><a href="signup.php">SIGN UP</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="http://placehold.it/1900x1080" alt="New York">
                <div class="carousel-caption">
                    <h3>Caption</h3>
                    <p>Say anything</p>
                </div>
            </div>

            <div class="item">
                <img src="http://placehold.it/1900x1080" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Caption</h3>
                    <p>Say anything</p>
                </div>
            </div>
            <div class="item">
                <img src="http://placehold.it/1900x1080" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Caption</h3>
                    <p>Say anything</p>
                </div>
            </div>
            <div class="item">
                <img src="http://placehold.it/1900x1080" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Caption</h3>
                    <p>Say anything.</p>
                </div>
            </div>

            <div class="item">
                <img src="http://placehold.it/1900x1080" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Caption</h3>
                    <p>Say anything.</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <div class="container">
        <div class="text-center">
            <h1>About Us</h1>
            <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto iste nobis facilis cumque tenetur
                excepturi fugiat est reprehenderit, nostrum et quaerat, vero inventore, beatae aliquam accusamus unde
                deserunt eligendi natus!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto iste nobis facilis cumque tenetur
                excepturi fugiat est reprehenderit, nostrum et quaerat, vero inventore, beatae aliquam accusamus unde
                deserunt eligendi natus!
            </h2>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="text-center">
            <h1>Meet the team</h1>
            
        </div>
    </div>
    <br>

    <div class="container">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center"><em>We love our customers!</em></p>
        <div class="row test">
            <div class="col-md-4">
                <p>Fan? Drop a note.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>Michigan, US</p>
                <p><span class="glyphicon glyphicon-phone"></span>Phone: +00 1515151515</p>
                <p><span class="glyphicon glyphicon-envelope"></span>Email: mail@mail.com</p>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <button class="btn pull-right" type="submit">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--Google map-->
    <div id="map-container-google-2" class="z-depth-1-half map-container" style="height:500px">
        <iframe src="https://maps.google.com/maps?q=detroid&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0; height: 100%; width:100%" allowfullscreen></iframe>
    </div>









    <!-- Bootstrap JS library -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <!-- carousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>

</html>