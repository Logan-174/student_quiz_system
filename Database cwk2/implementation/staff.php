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
<p>You can choose to  create, update or delete a quiz or associated questions
for that quiz.</p>
<p><a href="create.php">Create a quiz</a></p>
<p><a href="update.php">Update a quiz</a></p>
<p><a href="delete.php">Delete a quiz</a></p>
<p><a href="login.php">Log Out</a></p>
</div>
</body>
</html>