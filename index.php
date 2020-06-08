<?php
    include 'controllers/indexController.php';
?>

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

<body id="index_page" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <a class="navbar-brand" href="index.php">BUDGET BOOKKEEPING</a>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
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
                <img src="img/manage1.png" width="100%" alt="New York">
                <div class="carousel-caption">
                    <h3>Manage</h3>
                    <p>Keep up to date with your money, check your available balance</p>
                </div>
            </div>

            <div class="item">
                <img src="img/update1.png" width="100%" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Update</h3>
                    <p>Add expenses or cash coming in, update your available balance</p>
                </div>
            </div>
            <div class="item">
                <img src="img/record1.png" width="100%" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Record</h3>
                    <p>Keep a history of all of your money movements</p>
                </div>
            </div>
            <div class="item">
                <img src="img/save1.png" width="100%" alt="Chicago">
                <div class="carousel-caption">
                    <h3>Save</h3>
                    <p>Plan ahead and save money with out brianstorming feature</p>
                </div>
            </div>

            <div class="item">
                <img src="img/free1.png" width="100%" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3>Enjoy!</h3>
                    <p>Let us help you organize your money for better investments</p>
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
    <hr style="width: 70%;">

    <div class="container">
        <div class="text-center">
            <h1>Meet the team</h1>
              <div class="container">
  <div class="row">
    <!-- Team Member 1 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/TMgQMXoglsM/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Jessica Mccoy</h5>
          <div class="card-text text-black-50">Project Manager</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">David Shammas</h5>
          <div class="card-text text-black-50">Lead Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 3 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/sNut2MqSmds/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Maurice Fuentes</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 4 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/ZI6p3i9SbVU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Qasim Rathur</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Samantha Belz</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
    <!-- Team Member 2 -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-0 shadow">
        <img src="https://source.unsplash.com/9UVmlIb0wJU/500x350" class="card-img-top" alt="...">
        <div class="card-body text-center">
          <h5 class="card-title mb-0">Tyler Kavanagh</h5>
          <div class="card-text text-black-50">Web Developer</div>
        </div>
      </div>
    </div>
  </div>
        </div>
    </div>
    <br>
    <hr style="width: 70%;">



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
    <hr style="width: 70%;">
    <div class="container">
        <div class="text-center">
            <h2>What are you WAITING for?!</h2>
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h3 class="mb-1">Join our community and be part of <?php echo $total_number_of_users ?> active users.</h3>
                </li>
                <li class="list-inline-item">
                    <a href="signup.php" class="btn btn-outline-white btn-rounded">Sign up!</a>
                </li>
            </ul>
        </div>
    </div>
    <br>
    <hr style="width: 70%;">


    <!--Google map-->
    <div id="map-container-google-2" class="z-depth-1-half map-container" style="height:500px">
        <iframe src="https://maps.google.com/maps?q=detroid&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0; height: 100%; width:100%" allowfullscreen></iframe>
    </div>

    <br?




    <?php include 'footer.php';
    ?>




     <!-- Bootstrap JS library  -->
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
