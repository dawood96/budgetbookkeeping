<?php 

//start the session
session_start();

//check if the session is active
if(isset($_GET['Well'])){

    if(isset($_SESSION['U_D'])){
        // echo '<div class="display-4 mt-5  text-center"> you Have Successfully Logged In. </div>';
        // echo $_SESSION['FName'];
    }
    else {
        header("location: login.php");
        exit();
    }
} else {
    header("location: login.php");
    exit();
}

include 'controllers/dashController.php';


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
                    <li class="nav-item"><a href="dashboard.php">DASHBOARD</a></li>
                    <li class="nav-item"><a href="#">ADD CASH</a></li>
                    <li class="nav-item"><a href="#">ADD EXPENSES</a></li>
                    <li class="nav-item"><a href="#">REPORTS</a></li>
                    <li class="nav-item"><a href="#">BRAINSTORMING</a></li>
                    <li class="nav-item"><a href="login.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <img class="rounded mx-auto d-block img img-thumbnail" src="img/newyork.jpg" alt="">
    </div>
    <div class="container text-center text-dark">
        <h1> <?php  echo $_SESSION['FName'];?> <?php echo $_SESSION['LName'];  ?></h1>
    </div>
    <br>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-left-primary-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Balance
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $balanceIC; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-left-primary-income shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Total Income
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $incomeIC; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-left-primary-expense shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total EXPENSES
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $expenseIC; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary border-left-primary-total shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Number of transactions
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">96</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">DataTables Example</h6>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered" >
                    <thead >
                        <tr>
                            <th width="25%">Transaction ID</th>
                            <th width="25%">amount</th>
                            <th width="25%">date</th>
                            <th width="25%">comment</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Transaction ID</th>
                            <th>amount</th>
                            <th>date</th>
                            <th>comment</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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