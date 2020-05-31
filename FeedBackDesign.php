<?php
session_start();

if(isset($_SESSION['U_D'])) {
  echo "</br>";
  echo "</br>";
  echo "</br>";
  echo "Welcome, " . $_SESSION['FName'];
}
else {
    header('Location: index.php');
}

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
     <!-- Font-awesome -->
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
     <!-- custom CSS file -->
     <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
<p> Budgetbooking Contact form </p>
<form class="Feedback" action="Contactform.php" method="post">
<input type="text" name="Name" placeholder="Full name">
<input type="text" name="Email" placeholder="email">
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
