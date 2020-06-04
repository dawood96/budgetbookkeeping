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
	<div class="main">
		<div class="info">Give Your Feedback!</div>
		<form action="Contact_form.php" method="post" name="form" class="form-box">
			<label for="name">Name</label><br>
			<input type="text" name="name" class="inp" placeholder="Enter Your Name" required><br>
			<label for="email">Email ID</label><br>
			<input type="email" name="email" class="inp" placeholder="Enter Your Email" required><br>
			<label for="phone">Phone</label><br>
			<input type="tel" name="phone" class="inp" placeholder="Enter Your Phone" required><br>
			<label for="message">Message</label><br>
			<textarea name="msg" class="msg-box" placeholder="Enter Your Message Here..." required></textarea><br>
			<input type="submit" name="submit" value="Send" class="sub-btn">
		</form>
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
