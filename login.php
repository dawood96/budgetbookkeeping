<?php 
    // this will include the authcontroller where the info will be checked
    require_once 'controllers/loginController.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Font-awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style2.css">

</head>

<body id="login_page" data-spy="scroll" data-target=".navbar" data-offset="60" >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top top-nav">
        <a class="navbar-brand" href="index.php">BUDGET BOOKKEEPING</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">SIGN IN </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="signup.php">SIGN UP</a>
                </li>
            </ul>
        </div>
    </nav>

        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 form-div login">
                    <form action="login.php" method="POST">
                        <h3 class="text-center">Login</h3>

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

                    <!-- Invalid user -->
                    <?php 
                            if(isset($_GET['U_Invalid'])){
                                $Message = $_GET['U_Invalid'];
                                $Message = "Invalid User";

                    ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $Message ?>
                        </div>
                    <?php  
                            }
                    ?>

                    <!-- Invalid Password -->
                    <?php 
                            if(isset($_GET['P_Invalid'])){
                                $Message = $_GET['P_Invalid'];
                                $Message = "Invalid Password";

                    ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $Message ?>
                        </div>
                    <?php  
                            }
                    ?>


                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" required placeholder="Enter Your Email Address" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required placeholder="Enter Your Password" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="login" class="btn btn-primary btn-block btn-lg">Log In <i class="fas fa-sign-in-alt"></i></button>
                        </div>
                        <p class="text-center">
                            Not yet register? <a href="signup.php">Sign Up</a>
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