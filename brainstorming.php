<?php 

//start the session
//This is a test
session_start();

//checks if there is not a session open, if true, it reedirects to homepage
if(!isset($_SESSION['U_D'])) {
    header('Location: index.php');
}

include 'controllers/brainstormingController.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Bookkeeping</title>
    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Font-awesome -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>

<body id="brainstorming_page">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top top-nav">
        <a class="navbar-brand" href="#">Welcome, <?php  echo $_SESSION['FName'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav  ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">DASHBOARD <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="IncomeDesign.php">INCOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ExpensesDesign.php">EXPENSES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reports.php">REPORTS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="brainstorming.php">BRAINSTORMING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">SIGN OUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-div">
        <div class="container">
            <div class="heading header_brainstorming">
                <h2>ADD TASKS TO ACCOMPLISH</h2>
            </div>

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

            <?php 
            if(isset($_GET['finished_task'])){
                $Message = $_GET['finished_task'];
                $Message = "Task is Successfully Accomplished";

        ?>
            <div class="alert alert-primary text-center">
                <?php echo $Message ?>
            </div>
            <?php  
            }
        ?>



            <form method="POST" action="brainstorming.php" class="input_form">
                <input class="inputArea" type="text" required placeholder="Enter a task" name="task" class="task_input">
                <button class="custBtn font-weight-bold" type="submit" name="submit_task" id="add_btn">Add Task</button>
            </form>
        </div>
        <br>
        <hr style="width: 70%;">

        <div class="container">
            <h3>Tasks that need to be Accomplished</h3>
            <h5>Click on the <i class="fas fa-check"></i> to mark your task as completed.</h5>
        </div>
        <br>

        <?php  
        $result_task = "SELECT task_id, task, timestamp FROM csi3370_task where user_id = $user_id AND is_done = 0 ORDER BY timestamp DESC LIMIT 20";
        $result_task = mysqli_query($conn, $result_task);

        $result_task_done = "SELECT task_id, task FROM csi3370_task where user_id = $user_id AND is_done = 1 ORDER BY is_done DESC";
        $result_task_done = mysqli_query($conn, $result_task_done);

    ?>


        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light table-bordered">
                            <tr class="text-center table-success">
                                <th class="text-center">Task ID</th>
                                <th class="text-center">Task</th>
                                <th class="text-center">Date</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Task ID</th>
                                <th class="text-center">Task</th>
                                <th class="text-center">Date</th>
                                <th class="text-center" colspan="2">Action</th>
                            </tr>
                        </tfoot>

                        <?php while ($row = $result_task->fetch_assoc() ): ?>
                        <tr class="table-info">
                            <td><?php echo $row['task_id']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['task']; ?></td>
                            <td class="font-weight-bold"><?php echo $row['timestamp']; ?></td>
                            <td>
                                <a href="brainstorming.php?done= <?php echo $row['task_id']; ?>"
                                    class="btn btn-danger rounded-pill"><i class="fas fa-check"></i></a>
                                <a href="brainstorming.php?delete= <?php echo $row['task_id']; ?>"
                                    class="btn btn-danger rounded-pill"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
        </div>
        <br>
        <hr style="width: 70%;">
        <div class="container">
            <h3>Your Accomplished Tasks</h3>
            <h5>Click on the <i class="fas fa-trash-alt"></i> to delete any task.</h5>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-light table-bordered ">
                            <tr class="text-center table-success">
                                <th class="text-center">Task</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot class="thead-light table-bordered">
                            <tr class="text-center">
                                <th class="text-center">Task</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </tfoot>

                        <?php while ($row = $result_task_done->fetch_assoc() ): ?>
                        <tr class="table-primary">
                            <td class="font-weight-bold"><?php echo $row['task']; ?></td>
                            <td>
                                <a href="brainstorming.php?delete= <?php echo $row['task_id']; ?>"
                                    class="btn btn-danger rounded-pill"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>

    <footer class="page-footer font-small bg-info  pt-4">
        <div class="container">
            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <a class="nav-link h5 text-dark" href="dashboard.php">DASHBOARD</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link h5 text-dark" href="IncomeDesign.php">ADD INCOME</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link h5 text-dark" href="ExpensesDesign.php">ADD EXPENSES</a>
                </li>
            </ul>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center text-dark py-3">
            <p>&copy; 2020 Copyright: CSI-3370 TEAM 2</p>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>


</body>

</html>