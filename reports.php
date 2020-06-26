<?php 
  session_start(); 

  //checks if there is not a session open, if true, it redirects to homepage
  if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
  }

  include 'controllers/reportsController.php';
  require_once 'config/db.php';

  $user_email = $_SESSION["Email"];
$user_id = $_SESSION["U_D"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font-awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">
    

</head>

<body id="reports_page" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top top-nav">
  <a class="navbar-brand" href="#">Welcome, <?php  echo $_SESSION['FName'];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">DASHBOARD <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="IncomeDesign.php">INCOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ExpensesDesign.php">EXPENSES</a>
      </li>
      <li class="nav-item active">
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


<div class="container mt-md-5 text-center text-dark">
        <h2> Search for Anything</h2>
    </div>

    <form action="reports.php" data-ajax="false" method="POST" class="input_form">
        <input class="inputArea" size="5" placeholder="Search for id, comment, date, or type" name="search" type="search">
        <input class="btn btn-rounded btn-sm my-0 rounded-pill"  type="submit" name="button" value="search">
    </form>
    </br>



    <?php 

        if(!isset($_POST['button'])){
          
        }else{
            $search=$_POST['search'];

            //$query=mysqli_query( $conn, "select * from csi3370_expenses_trans where (type_of_expense like '%$search%) OR (expense_trans_id like '%$search%) OR (expense like '%$search%) OR (comment like '%$search%) OR (tiemstamp like '%$search%)'");
            $query=mysqli_query( $conn, "SELECT * from csi3370_expenses_trans where user_id = '$user_id' AND type_of_expense like '%$search%' OR comment like '%$search%' OR timestamp like '%$search%' OR expense_trans_id like '$search'");

            if (mysqli_num_rows($query) > 0) {
                echo "<h3>Expenses Results</h3> <br>";
                echo "<table style='margin-left: auto; font-weight: bold; margin-right: auto; width:70%;'>
                        <tr  style='background-color:white;'>
                          <th style='padding: 5px;'>Expense ID</th>
                          <th>Amount</th>
                          <th>Type of Expense</th>
                          <th>Comment</th>
                          <th>Date</th>
                        </tr>";
                while ($row = mysqli_fetch_array($query)) {
                    echo "<tr>
                            <td  style='padding: 5px;'>".$row['expense_trans_id']."</td>
                            <td>".$row['expense']."</td>
                            <td>".$row['type_of_expense']."</td>
                            <td>".$row['comment']."</td>
                            <td>".$row['timestamp']."</td>
                          </tr>";
                }
                echo "</table><br><br>";
            }else{
                echo "<h3>Expenses Results</h3>";
                echo "No results Found<br><br>";
            }
        }

    ?>
<hr style="width: 70%;">
    <?php 

        if(isset($_POST['button'])){ 
            $search=$_POST['search'];

            $query1=mysqli_query( $conn, "SELECT * from csi3370_income_trans where user_id = '$user_id' AND comment like '%$search%' OR timestamp like '%$search%' OR income_trans_id like '$search'");

            if (mysqli_num_rows($query1) > 0) {
              echo "</br>";
              echo "</br>";
                echo "<h3>Income Results</h3><br>";
                echo "<table style='margin-left: auto; font-weight: bold; margin-right: auto; width:70%;'><tr  style='background-color:white;'><th style='padding: 5px;'>Income ID</th><th>Amount</th><th>Comment</th><th>Date</th></tr>";
                while ($row = mysqli_fetch_array($query1)) {
                    echo "<tr><td  style='padding: 5px;'>".$row['income_trans_id']."</td><td>".$row['income']."</td><td>".$row['comment']."</td><td>".$row['timestamp']."</td></tr>";
                }
                echo "</table>";
            }else{
                echo "<h3>Income Results</h3>";
                echo "No results Found<br><br>";
        }
    }

?>

<hr style="width: 70%;">


<div class="container mt-md-5 text-center text-dark">
        <h1> Reports</h1>
    </div>
</br>
    <script src='jquery-3.3.1.js' type='text/javascript'></script>
   <script src='jquery-ui.min.js' type='text/javascript'></script>
   <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>

    <form method='post' action='' class="input_form">
      <div class="form-group font-weight-bold">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <label class="font-weight-bold">Start Date</label><br>
              <input class="inputArea" width="10%" type='date' class="dateFilter" name='fromDate' placeholder="Start Date Ex: YYYY-MM-DD" value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>'><br><br>
              <label class="font-weight-bold">Stop Date</label><br>
              <input class="inputArea" type='date' class='dateFilter' name='endDate' placeholder="End Date Ex: YYYY-MM-DD" value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>'>
            </div>
          </div>
      </div> 
      <input class="btn btn-rounded btn-sm my-0 rounded-pill" type='submit' name='but_search' value='Search'>
      <button class="btn btn-rounded btn-sm my-0 rounded-pill" onclick="window.print();return false;">Print</button>
   </form>

   <br>
   <br><br>
   <?php
       
       $emp_query = "SELECT * FROM csi3370_income_trans WHERE 1 ";
       $emp_query1 = "SELECT * FROM csi3370_expenses_trans WHERE 1 ";

       // Date filter
       if(isset($_POST['but_search'])){
          $fromDate = $_POST['fromDate'];
          $endDate = $_POST['endDate'];

          if(!empty($fromDate) && !empty($endDate)){
             $emp_query .= " and timestamp between '".$fromDate."' and '".$endDate."' ";
             $emp_query1 .= " and timestamp between '".$fromDate."' and '".$endDate."' ";
          }


          // Sort
        $emp_query .= " ORDER BY timestamp DESC";
        $emp_query1 .= " ORDER BY timestamp DESC";
        $IncomeReports = mysqli_query($conn,$emp_query);
        $ExpenseReports = mysqli_query($conn,$emp_query1);

        // Check records found or not
        if(mysqli_num_rows($IncomeReports) > 0){
          echo "<h3>Income</h3>";
          //echo "<table style='margin-left: 500px; margin-right: auto;'>";
          echo "<table style='margin-left: auto; font-weight: bold; margin-right: auto; width:70%;'><tr style='background-color:white;'><th  style='padding: 5px;'>Income ID</th><th>Date</th><th>Amount</th><th>Comment</th></tr>";
          while($empRecord = mysqli_fetch_assoc($IncomeReports)){
            $id = $empRecord['income_trans_id'];
            $user_id = $empRecord['user_id'];
            $date = $empRecord['timestamp'];
            $amount = $empRecord['income'];
            $comment = $empRecord['comment'];

            //echo "<table>";
            echo "<tr>";
            echo "<td  style='padding: 5px;'>". $id ."</td>";
            echo "<td>". $date ."</td>";
            echo "<td>". $amount ."</td>";
            echo "<td>". $comment ."</td>";
            echo "</tr>";
            //echo "</table>";
          }
        }else{
          echo "<tr>";
          echo "<td colspan='4'>No record found.</td>";
          echo "</tr>";
        }
        echo "</table>";
          
        if(mysqli_num_rows($ExpenseReports) > 0){
          echo "</br> ";
          echo "</br>";
          echo "<h3>Expenses</h3>";
          //echo "<table>";
          echo "<table style='margin-left: auto; margin-right: auto;font-weight: bold; width:70%;'><tr style='background-color:white;'><th   style='padding: 5px;'>Expense ID</th><th>Date</th><th>Amount</th><th>Comment</th><th>Type</th></tr>";
          while($empRecord = mysqli_fetch_assoc($ExpenseReports)){
            $id = $empRecord['expense_trans_id'];
            $user_id = $empRecord['user_id'];
            $date = $empRecord['timestamp'];
            $amount = $empRecord['expense'];
            $comment = $empRecord['comment'];
            $type = $empRecord['type_of_expense'];

            //echo "<table>";
            echo "<tr>";
            echo "<td  style='padding: 5px;'>". $id ."</td>";
            echo "<td>". $date ."</td>";
            echo "<td>". $amount ."</td>";
            echo "<td>". $comment ."</td>";
            echo "<td>". $type ."</td>";
            echo "</tr>";
            //echo "</table>";
          }
        }else{
          echo "<tr>";
          echo "<td colspan='4'>No record found.</td>";
          echo "</tr>";
        }
        echo "</table>";
        }

        
        ?>

          

      <footer class="page-footer font-small unique-color-dark bg-info pt-4">
        <div class="container">
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <a class="nav-link text-dark h5" href="dashboard.php">DASHBOARD</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link text-dark h5" href="IncomeDesign.php">ADD INCOME</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link text-dark h5" href="ExpensesDesign.php">ADD EXPENSES</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link text-dark h5" href="brainstorming.php">TASKS</a>
                </li>
            </ul>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            <p>&copy; 2020 Copyright: CSI-3370 TEAM 2</p>
        </div>
    </footer>

    <!-- Bootstrap JS library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <div class="centerDiv">
    </div>
</body>

</html>
