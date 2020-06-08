<?php 
  session_start(); 

  //checks if there is not a session open, if true, it reedirects to homepage
  if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
  }

  include 'controllers/expensesController.php';
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

<body id="expense_page" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <a class="navbar-brand">Add an Expense</a>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item"><a href="dashboard.php">DASHBOARD</a></li>
                    <li class="nav-item"><a href="IncomeDesign.php">ADD CASH</a></li>
                    <li class="nav-item"><a href="ExpensesDesign.php">ADD EXPENSES</a></li>
                    <li class="nav-item"><a href="reports.php">REPORTS</a></li>
                    <li class="nav-item"><a href="brainstorming.php">BRAINSTORMING</a></li>
                    <li class="nav-item"><a href="logout.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container text-center text-dark">
        <h1> <?php  echo $_SESSION['FName'];?> <?php echo $_SESSION['LName'];  ?></h1>
    </div>
    <br>


    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <!-- We can have anything here -->
        </div>
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Expense
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
        <div class="col-xl-4 col-md-6 mb-4">
            <!-- We can have anything here -->
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Bills/payments
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $bills_expense; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Food/Drinks
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $food_expense; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Shopping
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $shopping_expense; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">   
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Gifts
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $gifts_expense; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Technology
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $tech_expense; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-4 col-sm-6 col-xs-12 mb-4">
            <div class="card border-left-success border-left-danger-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">Other
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $other_expense; ?></div>
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

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form method="POST" data-ajax="false" action="ExpensesDesign.php">
                    <h3 class="text-center text-uppercase">Add Expense</h3><br>

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
                    <div class="form-group">
                        <label>Amount</label>
                        <input name="expenseAmount" required placeholder="Enter Expense Amount. Ex, 96.12"
                            value="<?php echo $amount; ?>" class=" text-center form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" cols="55" placeholder="Write a Note"
                            class=" text-center form-control form-control-lg"><?php echo $com; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" required placeholder="Enter Transaction Date"
                            value="<?php echo $date; ?>" class="text-center form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select required type="text" name="category" class="text-center form-control form-control-lg">
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
                        <button type="submit" class="btn btn-success" name="update">Update</button><br><br>
                        <?php 
                            else:
                        ?>
                        <button type="submit" class="btn btn-success" name="add_expense">ADD</button><br><br>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>

    <?php  
        $query1 = "SELECT expense_trans_id, expense, type_of_expense, timestamp, comment FROM csi3370_expenses_trans where user_id = $user_id ORDER BY timestamp DESC";
        $result = mysqli_query($conn, $query1);

        //checks for any errors
        if (!$result) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        }
        // pre_r($result->fetch_assoc());
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table">
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
                        <td><?php echo $row['expense']; ?></td>
                        <td><?php echo $row['type_of_expense']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td>
                            <a href="ExpensesDesign.php?edit= <?php echo $row['expense_trans_id']; ?>"
                                class="btn btn-info">Edit</a>
                            <a href="ExpensesDesign.php?delete= <?php echo $row['expense_trans_id']; ?>"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>

        <?php 
        function pre_r ($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
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
    <div class="centerDiv">
    </div>
</body>

</html>