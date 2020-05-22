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
        <!-- Font-awesome -->
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <!-- custom CSS file -->
        <link rel="stylesheet" href="css/style.css">
         <!-- Font-awesome -->
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <!-- custom CSS file -->
        <link rel="stylesheet" href="css/style.css">
        <style>
            .centerDiv {
                position: absolute;
                top:130px;
                left: 150px;
                width:900px;
            }
            .rightDiv {
                position: absolute;
                top:100px;
                right: 80px;
                width:300px;
                text-align: center;
            }
            aside > h4 {
                margin: 0;
            }
            aside
            { border: 1px outset black;
              background-color: white; float: right;
              width: 300px; margin: 5px;
              padding: 20px; }
            label{
                position: relative;
                left: 50px;
                border: 1px outset black;
                padding: 10px;
                width:100px;
            }
        </style>            
</head>
<body> 
<main>
<p> Send Feedback </p>
<form class="Feedback-Form" action="Feedbackform.php" method="post">
<input type="text" name="name" placeholder="Full name">
<input type="text" name="e-mail" placeholder="e-mail">
<input type="text" name="Subject" placeholder="Subject">
<textarea name="message" placeholder="Message"></textarea>
<button type="submit" name="submit"> SEND MAIL </button>
        </form>
</main>


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
