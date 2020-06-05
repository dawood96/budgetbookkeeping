<?php 

//start the session
//This is a test
session_start();

//checks if there is not a session open, if true, it reedirects to homepage
if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
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
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">  

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>

</head>

<body id="myPage">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-brand">Welcome, <?php  echo $_SESSION['FName'];?></div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="dashboard.php">DASHBOARD</a></li>
                    <li class="nav-item"><a href="IncomeDesign.php">ADD CASH</a></li>
                    <li class="nav-item"><a href="ExpensesDesign.php">ADD EXPENSES</a></li>
                    <li class="nav-item"><a href="#">REPORTS</a></li>
                    <li class="nav-item"><a href="#">BRAINSTORMING</a></li>
                    <li class="nav-item"><a href="logout.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center text-dark">
        <h1> <?php  echo $_SESSION['FName'];?>'s Dashboard </h1>
    </div>
    <br>


    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12">
            <div class="card border-left-primary border-left-primary-balance shadow h-100 py-2 ">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Balance</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $balanceIC; ?></div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12">
            <a href="IncomeDesign.php">
                <div class="card border-left-primary border-left-primary-income shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Total Income </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $incomeIC; ?> </div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12">
            <a href="ExpensesDesign.php">
                <div class="card border-left-primary border-left-primary-expense shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total EXPENSES </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $expenseIC; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12">
            <div class="card border-left-primary border-left-primary-total shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Number of transactions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $total_number_of_transaction; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 mb-4">
        <div id="donutchart" style="width: 45%px; height: 400px; "></div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 mb-4">
        <div id="top_x_div" style="width: 45%px; height: 400px;"></div>
        </div>
    </div>
    <hr style="width: 70%;">


    <?php  
        $result = "SELECT income_trans_id, income, timestamp, comment  FROM csi3370_income_trans where user_id = $user_id AND timestamp >= (CURDATE() - INTERVAL 1 MONTH )  ORDER BY timestamp DESC LIMIT 10";
        $result = mysqli_query($conn, $result);
    ?>

    <div class="container">
        <div>
            <h3>Last 30-day Summary</h3>
            <h5>(From <?php  echo date('Y/m/d', strtotime('-30 days')); ?> To <?php  echo date("Y/m/d"); ?>)</h5>
            <h4>
                Hello<span class="text-primary text-uppercase"> <?php  echo $_SESSION['FName'];?></span>, this is your summary of the past 30 days. <br>
                You have reported <span class="text-success"><?php  echo $last_month_income_trans; ?></span> income transactions and the total money of these transactions 
                is <span class="text-success">$<?php  echo $last_month_income; ?></span>.
                You have also reported <span class="text-danger"><?php  echo $last_month_expense_trans; ?></span> expense transactions. 
                The total of your expenses for the past 30 days is <span class="text-danger">$<?php  echo $last_month_expense; ?></span>.
            </h5>
        </div>
        <hr>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="IncomeDesign.php">
                    <div class="card border-left-primary border-left-primary-income shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold  text-uppercase mb-1">Total Income This Month</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $last_month_income; ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="IncomeDesign.php">
                    <div class="card border-left-primary border-left-primary-total shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold  text-uppercase mb-1"># of transactions</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $last_month_income_trans; ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="ExpensesDesign.php">
                    <div class="card border-left-primary border-left-primary-expense shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">Total EXPENSES this month</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $last_month_expense; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="ExpensesDesign.php">
                    <div class="card border-left-primary border-left-primary-total shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1"># of transactions </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $last_month_expense_trans; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <hr style="width: 70%;">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark table-bordered">
                            <tr class="text-center table-success">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </tfoot>
                        <?php while ($row = $result->fetch_assoc() ): ?>
                        <tr class="table-success">
                            <td><?php echo $row['income_trans_id']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['income']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['timestamp']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark table-bordered">
                            <tr class="text-center table-danger">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </tfoot>
                        <?php while ($row = $result->fetch_assoc() ): ?>
                        <tr class="table-danger">
                            <td><?php echo $row['income_trans_id']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['income']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['timestamp']; ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
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


    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'amount'],
          ['Expense',<?php  echo ($expenseIC > 0 ? $expenseIC : 1); ?>],
          ['Income', <?php  echo ( $incomeIC > 0 ? $incomeIC : 1); ?>],
        ]);

        var options = {
          title: 'Activities',
          pieHole: 0.3,
          colors: [ '#e61d19', '#36b55a'],
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          ["BILLS/PAYMENTS", <?php  echo $bills_expense_percentage; ?>],
          ["FOOD/DRINKS", <?php  echo $food_expense_percentage; ?>],
          ["SHOPPING", <?php  echo $shopping_expense_percentage; ?>],
          ["GIFTS", <?php  echo $gifts_expense_percentage; ?>],
          ["TECHNOLOGY", <?php  echo $tech_expense_percentage; ?>],
          ['Other', <?php  echo $other_expense_percentage; ?>]
        ]);

        var options = {
          width: 700,
          legend: { position: 'none' },
          
          axes: {
            x: {
              0: { side: 'top', label: 'Expense Categories'} // Top x-axis.
            }
          },
          bar: { groupWidth: "80%" } //this is the width of each bar
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, options);
      };
    </script>

</body>

</html>