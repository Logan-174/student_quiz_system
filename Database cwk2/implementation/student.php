<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome Page</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<p>Welcome
  <?php
  session_start();
  echo $_SESSION['name']; ?>!</p>
<p>You can take a quiz if it's available.</p>
<p><a href="takequiz.php">Take a quiz</a></p>
<p>You can check your score with your student id.</p>
<p><a href="checkscore.php">Check Score</a></p>
<p><a href="login.php">Log Out</a></p>
</div>
</body>
</html>