<?php 
  session_start(); 

  //checks if there is not a session open, if true, it reedirects to homepage
  if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
  }

  include 'controllers/expensesController.php';
  include 'controllers/dashController.php';

    $query1 = "SELECT expense_trans_id, expense, type_of_expense, timestamp, comment FROM csi3370_expenses_trans where user_id = $user_id ORDER BY timestamp DESC";
    $result = mysqli_query($conn, $query1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenses</title>
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font-awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="expense_page" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top top-nav">
        <a class="navbar-brand" href="#">Welcome, <?php  echo $_SESSION['FName'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item active">
                    <a class="nav-link" href="ExpensesDesign.php">EXPENSES</a>
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
        <br>
        <div class="container text-center text-dark">
            <h1> <?php  echo $_SESSION['FName'];?> <?php echo $_SESSION['LName'];  ?></h1>
        </div>
        <br>


        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- We can have anything here -->
            </div>
            <div class="col-xl-4 col-md-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Expense
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $expenseIC; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-5x fa-money-check zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <!-- We can have anything here -->
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Bills/payments
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $bills_expense; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-money-check-alt zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Food/Drinks
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $food_expense; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-utensils zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Shopping
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $shopping_expense; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-shopping-cart zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Gifts
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $gifts_expense; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-gifts zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Technology
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $tech_expense; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-desktop zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4 zoom-in">
                <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold  text-uppercase mb-1">Other
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $other_expense; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-3x fa-wallet zoom-in"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 form-div login">
                    <form method="POST" data-ajax="false" action="ExpensesDesign.php">
                        <h3 class="text-center font-weight-bold text-uppercase">Add Expense</h3><br>

                        <!-- display empty fields -->
                        <?php 
                        if(isset($_GET['valid'])){
                            $Message = $_GET['valid'];
                            $Message = "Transaction is Successfully Recorded";

                   ?>
                        <div class="alert alert-success text-center">
                            <?php echo $Message ?>
                        </div>
                        <?php  
                        }
                   ?>

                        <!-- Invalid characters -->
                        <?php 
                        if(isset($_GET['invalid'])){
                            $Message = $_GET['invalid'];
                            $Message = "Invalid Character";

                   ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $Message ?>
                        </div>
                        <?php  
                        }
                   ?>

                        <!-- valid delete -->
                        <?php 
                        if(isset($_GET['deleted'])){
                            $Message = $_GET['deleted'];
                            $Message = "The Record Was Deleted";

                   ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $Message ?>
                        </div>
                        <?php  
                        }
                   ?>

                        <!-- valid update -->
                        <?php 
                        if(isset($_GET['updated'])){
                            $Message = $_GET['updated'];
                            $Message = "The Record Was Updated";

                   ?>
                        <div class="alert alert-info text-center">
                            <?php echo $Message ?>
                        </div>
                        <?php  
                        }
                   ?>

                        <input type="hidden" name="id" value="<?php echo $id_trans; ?>">
                        <div class="form-group font-weight-bold">
                            <label>Amount</label>
                            <input name="expenseAmount" required placeholder="Enter Expense Amount. Ex, 96.12"
                                value="<?php echo $amount; ?>"
                                class=" text-center form-control form-control-lg rounded-pill">
                        </div>
                        <div class="form-group font-weight-bold">
                            <label>Comment</label>
                            <textarea name="comment" cols="55" placeholder="Write a Note"
                                class=" text-center form-control form-control-lg"><?php echo $com; ?></textarea>
                        </div>
                        <div class="form-group font-weight-bold">
                            <label>Date</label>
                            <input type="date" name="date" required placeholder="Enter Transaction Date"
                                value="<?php echo $date; ?>"
                                class="text-center form-control form-control-lg rounded-pill">
                        </div>
                        <div class="form-group font-weight-bold">
                            <label>Category</label>
                            <select required type="text" name="category"
                                class="text-center form-control form-control-lg rounded-pill">
                                <option disabled selected value><?php echo $type; ?></option>
                                <option value="BILLS" name="bills">BILLS/PAYMENTS</option>
                                <option value="FOOD" name="food">FOOD/DRINKS</option>
                                <option value="SHOPPING" name="shopping">SHOPPING</option>
                                <option value="GIFTS" name="gift">GIFTS</option>
                                <option value="TECHNOLOGY" name="technology">TECHNOLOGY</option>
                                <option value="OTHER" name="other">OTHER</option>
                            </select><br>
                        </div>
                        <div class="form-group">
                            <?php 
                            if ($update == true):
                        ?>
                            <button type="submit" class="btn btn-success rounded-pill" name="update"><i
                                    class='fas fa-edit'></i> Update</button><br><br>
                            <?php 
                            else:
                        ?>
                            <button type="submit" class="btn btn-success rounded-pill" name="add_expense">ADD <i
                                    class="fas fa-plus"></i></button><br><br>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>

        <div class="container">
            <div class="row justify-content-center">
                <div class="table-responsive">
                    <table class="table table-hover font-weight-bold">
                        <thead class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Type of Expense</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Type of Expense</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Comment</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </tfoot>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['expense_trans_id']; ?></td>
                            <td><?php echo number_format($row['expense'], 2,'.', ','); ?></td>
                            <td><?php echo $row['type_of_expense']; ?></td>
                            <td><?php echo $row['timestamp']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                            <td>
                                <a href="ExpensesDesign.php?edit= <?php echo $row['expense_trans_id']; ?>"
                                    class="btn btn-info round-btn"><i class='fas fa-edit'></i></a>
                                <a href="ExpensesDesign.php?delete= <?php echo $row['expense_trans_id']; ?>"
                                    class="btn btn-danger round-btn"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <footer class="page-footer font-small unique-color-dark  pt-4">
        <div class="container">
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <a class="nav-link h5" href="dashboard.php">DASHBOARD</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link h5" href="IncomeDesign.php">ADD INCOME</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link h5" href="brainstorming.php">TASKS</a>
                </li>
            </ul>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            <p>&copy; 2020 Copyright: CSI-3370 TEAM 2</p>
        </div>
    </footer>


    <!-- Bootstrap JS library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <div class="centerDiv">
    </div>
</body>

</html>