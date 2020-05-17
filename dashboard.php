<?php 
//start the session
session_start();


//check if the session is active
//THIS IS A TEST!!
if(isset($_GET['Well'])){

    if(isset($_SESSION['U_D'])){
        echo '<div class="display-4 mt-5  text-center"> you Have Successfully Logged In. </div>';
        echo $_SESSION['FName'];
    }
    else {
        header("location: login.php");
        exit();
    }
} else {
    header("location: login.php");
    exit();
}




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
                    <li class="nav-item"><a href="index.html">DASHBOARD</a></li>
                    <li class="nav-item"><a href="about.html">ADD CASH</a></li>
                    <li class="nav-item"><a href="project.html">ADD EXPENSES</a></li>
                    <li class="nav-item"><a href="login.php">REPORTS</a></li>
                    <li class="nav-item"><a href="contact.html">BRAINSTORMING</a></li>
                    <li class="nav-item"><a href="contact.html">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>











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