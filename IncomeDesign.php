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
        
          <!-- Content -->
       
        <div>
            <h4><b>Add Income</b></h4>
            <br>
            <br>
            <label>Amount</label><input type="text" id="first" size="10" autofocus style=" right: 220px; width: 300px; margin: 5px; padding:10px; top:50px;"><br><br>
            <label>Comment</label><input type="text" id="first" size="15" autofocus style="right: 220px; width: 300px; margin: 5px;padding:10px;top:110px;"><br><br>
            <label>date</label><input type="text" id="first" size="15" autofocus style="right: 220px; width: 300px; margin: 5px;padding:10px;top:175px;"><br><br>
            <label>Done</label><input type="text" id="first" size="15" autofocus style="right: 300px; width: 150px; margin: 5px;padding:10px;top:245px;"><br><br>
        </div>
        <div class="rightDiv2">
            <aside> <h4></h4> $ </aside>
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
        <div class="centerDiv">
        </div>

    </body>
</html>
