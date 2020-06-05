<?php 
    // this will include the authcontroller where the info will be checked
    require_once 'controllers/authoController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style2.css">
    <title>Sign up</title>
</head>

<body id="signup_page">
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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="signup.php" method="POST">
                    <h3 class="text-center">Register</h3>


                    <!-- display empty fields -->
                    <?php 
                        if(isset($_GET['empty'])){
                            $Message = $_GET['empty'];
                            $Message = "Please Fill in the Blanks";

                   ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $Message ?>
                    </div>
                    <?php  
                        }
                   ?>

                    <!-- Invalid Characters  -->
                    <?php 
                        if(isset($_GET['Invalid'])){
                            $Message = $_GET['Invalid'];
                            $Message = "Invalid Character";

                   ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $Message ?>
                    </div>
                    <?php  
                        }
                   ?>

                    <!-- Invalid Email  -->
                    <?php 
                        if(isset($_GET['Email'])){
                            $Message = $_GET['Invalid'];
                            $Message = "Invalid Email";

                   ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $Message ?>
                    </div>
                    <?php  
                        }
                   ?>

                    <!-- Invalid UserEmail  -->
                    <?php 
                        if(isset($_GET['UserEmail'])){
                            $Message = $_GET['UserEmail'];
                            $Message = "Email is Already Taken";

                   ?>
                    <div class="alert alert-danger text-center">
                        <?php echo $Message ?>
                    </div>
                    <?php  
                        }
                   ?>

                    <!-- success Message -->
                    <?php 
                        if(isset($_GET['success'])){
                            $Message = $_GET['success'];
                            $Message = "You have Successfully Signed Up";

                   ?>
                    <div class="alert alert-success text-center">
                        <?php echo $Message ?>
                    </div>
                    <?php  
                        }
                   ?>



                    <div class="form-group">
                        <label for="FName">First Name</label>
                        <input type="text" name="FName" value="" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="LName">Last Name</label>
                        <input type="text" name="LName" value="" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label for="passwordConf">Confirm Password</label>
                        <input type="password" name="passwordConf" class="form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <p class="text-center">
                        Already signed up? <a href=login.php>Sign In</a>
                    </p>
                </form>
            </div>
        </div>
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
</body>

</html>