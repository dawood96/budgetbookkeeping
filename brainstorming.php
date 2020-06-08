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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- custom CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="js/chart.js"></script>

</head>

<body id="brainstorming_page">
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
                    <li class="nav-item"><a href="reports.php">REPORTS</a></li>
                    <li class="nav-item"><a href="brainstorming.php">BRAINSTORMING</a></li>
                    <li class="nav-item"><a href="logout.php">SIGN OUT</a></li>
                </ul>
            </div>
        </div>
    </nav>


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
            <button class ="custBtn" type="submit" name="submit_task" id="add_btn" >Add Task</button>
        </form>
    </div>
    <br>
    <hr style="width: 70%;">

    <div class="container">
        <h3>Tasks that need to be Accomplished</h2>
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
                                class="btn btn-danger">&#10004;</a>
                                <a href="brainstorming.php?delete= <?php echo $row['task_id']; ?>"
                                class="btn btn-danger">X</a>
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
        <h3>Your Accomplished Tasks</h2>
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
                                class="btn btn-danger">X</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>

                </table>
            </div>
        </div>
    </div>




</body>

</html>