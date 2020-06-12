<?php 

//start the session
//This is a test
session_start();

//checks if there is not a session open, if true, it reedirects to homepage
if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
}

include 'controllers/dashController.php';


    $result = "SELECT income_trans_id, income, timestamp, comment  FROM csi3370_income_trans where user_id = $user_id AND timestamp >= (CURDATE() - INTERVAL 1 MONTH )  ORDER BY timestamp DESC LIMIT 10";
    $result = mysqli_query($conn, $result);

    $result_expense = "SELECT expense_trans_id, expense, timestamp, comment  FROM csi3370_expenses_trans where user_id = $user_id AND timestamp >= (CURDATE() - INTERVAL 1 MONTH )  ORDER BY timestamp DESC LIMIT 10";
    $result_expense = mysqli_query($conn, $result_expense);

    $result_task = "SELECT task_id, task, timestamp FROM csi3370_task where user_id = $user_id AND is_done = 0 ORDER BY timestamp DESC LIMIT 6";
    $result_task = mysqli_query($conn, $result_task);

    $result_task_done = "SELECT task_id, task FROM csi3370_task where user_id = $user_id AND is_done = 1 ORDER BY is_done DESC LIMIT 6";
    $result_task_done = mysqli_query($conn, $result_task_done);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Bookkeeping</title>
    <!-- Bootstrap CSS library -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">  

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>
    
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>

<body id="myPage">   
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Welcome, <?php  echo $_SESSION['FName'];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">DASHBOARD <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="IncomeDesign.php">ADD CASH</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ExpensesDesign.php">ADD EXPENSES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="reports.php">REPORTS</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="brainstorming.php">BRAINSTORMING</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="logout.php">SIGN OUT</a>
      </li>
    </ul>
  </div>
</nav>

    <div class="main-div">
        <div class="container text-center text-dark">
            <h1> <?php  echo $_SESSION['FName'];?>'s Dashboard </h1>
        </div>
        <br>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12 flip-box">
                <div class="card border-left-primary border-left-primary-balance shadow h-100 py-2 flip-box-inner">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 flip-box-front">
                                <div class="text-xs font-weight-bold  text-uppercase p-1 mb-1">Balance</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $balanceIC1; ?></div>
                            </div>
                            <div class="col mr-2 flip-box-back">
                                <div class="text-xs font-weight-bold  text-uppercase p-1 mb-1">$<?php  echo $balanceIC1; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is calculated by subtracting expenses from income.</div>
                            </div>
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12 flip-box">
                <a href="IncomeDesign.php">
                    <div class="card border-left-primary border-left-primary-income shadow h-100 py-2 flip-box-inner">
                        <div class="card-body ">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 flip-box-front">
                                    <div class="text-xs font-weight-bold text-uppercase p-1 mb-1">Total Income </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $incomeIC1; ?> </div>
                                </div>
                                <div class="col mr-2 flip-box-back">
                                    <div class="text-xs font-weight-bold  text-uppercase mb-1">$<?php  echo $incomeIC1; ?> </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">This is your cumulative reported income amount since you joined. </div>
                                </div>
                                <div class="col-auto">
                                    <i class="far fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12 flip-box">
                <a href="ExpensesDesign.php">
                    <div class="card border-left-primary border-left-primary-expense shadow h-100 py-2 flip-box-inner">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2 flip-box-front">
                                    <div class="text-xs font-weight-bold text-uppercase p-1 mb-1">Total EXPENSES </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $expenseIC1; ?></div>
                                </div>
                                <div class="col mr-2 flip-box-back">
                                    <div class="text-xs font-weight-bold text-uppercase p-1 mb-1">$<?php  echo $expenseIC1; ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">This is your cumulative reported expenses amount since you joined.</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4 col-sm-12 col-xs-12 flip-box">
                <div class="card border-left-primary border-left-primary-total shadow h-100 py-2 flip-box-inner">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2 flip-box-front">
                                <div class="text-xs font-weight-bold text-uppercase p-1 mb-1">Transactions</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_number_of_transaction; ?></div>
                            </div>
                            <div class="col mr-2 flip-box-back">
                                <div class="text-xs font-weight-bold text-uppercase p-1 mb-1"><?php echo $total_number_of_transaction; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">This is the total number of all your income and expenses transactions.</div>
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


        <div class="container">
            <div class="zoom-in">
                <h3><strong>Last 30-day Summary</strong></h3>
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
                                        <div class="text-xs font-weight-bold  text-uppercase mb-1">Last 30-days Income</div>
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
                                        <div class="text-xs font-weight-bold text-uppercase mb-1">Last 30-days Expenses</div>
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
                        <table class="table table-hover">
                            <thead class="thead-dark table-bordered">
                                <tr class="text-center table-success">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Date</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light table-bordered">
                                <tr class="text-center">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Date</th>
                                </tr>
                            </tfoot>
                            <?php while ($row = $result->fetch_assoc() ): ?>
                            <tr class="table-success zoom-in">
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
                        <table class="table table-hover">
                            <thead class="thead-dark table-bordered">
                                <tr class="text-center table-danger">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Date</th>
                                </tr>
                            </thead>
                            <tfoot class="thead-light table-bordered">
                                <tr class="text-center">
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Date</th>
                                </tr>
                            </tfoot>
                            <?php while ($row = $result_expense->fetch_assoc() ): ?>
                            <tr class="table-danger zoom-in">
                                <td><?php echo $row['expense_trans_id']; ?></td>
                                <td class="font-weight-bold"><?php echo $row['expense']; ?></td>
                                <td class="font-weight-bold"><?php echo $row['timestamp']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr style="width: 70%;">

        <div class="container">
            <h2><strong>Your Tasks</strong></h2>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="">
                                <tr class="text-center bg-secondary text-white">
                                    <th class="text-center">Unaccomplished Tasks</th>
                                </tr>
                            </thead>
                            <?php while ($row = $result_task->fetch_assoc() ): ?>
                            <tr class="">
                                <td class="font-weight-bold text-primary"><?php echo $row['task']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>

                <div class="col-md-2 col-lg-2 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4 zoom-in">
                            <a href="brainstorming.php">
                                <div class="card border-primary border-primary-expense shadow h-100 py-2 bg-info text-white rounded-pill">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Accomplished</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $accomplished_task_total; ?></div>
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
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4 zoom-in">
                            <a href="brainstorming.php">
                                <div class="card  shadow h-100 py-2 bg-secondary text-white rounded-pill">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-uppercase mb-1">Unaccomplished</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo $unaccomplished_task_total; ?></div>
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
                </div>

                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="">
                                <tr class="text-center bg-info text-white">
                                    <th class="text-center">Accomplished Tasks</th>
                                </tr>
                            </thead>
                            <?php while ($row = $result_task_done->fetch_assoc() ): ?>
                            <tr class="">
                                <td class="font-weight-bold text-info "><?php echo $row['task']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Bootstrap JS library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


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
