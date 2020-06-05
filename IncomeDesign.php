<?php 
  session_start(); 

  //checks if there is not a session open, if true, it reedirects to homepage
  if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
  }
  include 'controllers/dashController.php';
  include 'controllers/incomeController.php';


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

<body id="income_page" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <a class="navbar-brand">Add some Income</a>
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


    <div class="container mt-md-5 text-center text-dark">
        <h1> <?php  echo $_SESSION['FName'];?> <?php echo $_SESSION['LName'];  ?></h1>
    </div>

    <br>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <!-- We can have anything here -->
        </div>
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-success border-left-success-balance shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1">INCOME
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php  echo $incomeIC; ?></div>
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

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div login">
                <form method="POST" data-ajax="false" action="IncomeDesign.php">
                    <h3 class="text-center text-uppercase">Add Income</h3><br>

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
                        <input name="incomeAmount" required placeholder="Enter Income Amount. Ex, 25.75"
                            value="<?php echo $amount; ?>" class=" text-center form-control form-control-lg">
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea name="comment" placeholder="Write a Note"
                            class=" text-center form-control form-control-lg"><?php echo $com; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" value="<?php echo $date; ?>" required
                            placeholder="Enter Transaction Date" class="text-center form-control form-control-lg">
                    </div>
                    <div class="form-group">

                        <?php 
                            if ($update == true):
                        ?>
                        <button type="submit" class="btn btn-success" name="update">Update</button><br><br>
                        <?php 
                            else:
                        ?>
                        <button type="submit" class="btn btn-success" name="add_income">ADD</button><br><br>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>

    <?php  
        $query1 = "SELECT income_trans_id, income, timestamp, comment FROM csi3370_income_trans where user_id = $user_id ORDER BY timestamp DESC";
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
                            <th class="text-center">Date</th>
                            <th class="text-center">Comment</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-light table-bordered">
                        <tr class="text-center">
                            <th class="text-center">Transaction ID</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Comment</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                    </tfoot>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['income_trans_id']; ?></td>
                        <td><?php echo $row['income']; ?></td>
                        <td><?php echo $row['timestamp']; ?></td>
                        <td><?php echo $row['comment']; ?></td>
                        <td>
                            <a href="IncomeDesign.php?edit= <?php echo $row['income_trans_id']; ?>"
                                class="btn btn-info">Edit</a>
                            <a href="IncomeDesign.php?delete= <?php echo $row['income_trans_id']; ?>"
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

</body>

</html>