<form method="post">
  <h1>Take quiz</h1>
  <br/><br/>
  <h1>please enter your answer
  <br/><br/>

  <label>answer:<input type="text" name="answer"></label>
  <br/><br/>
  <button type="submit" name="submit">Submit</button>
  <button type="back" name="back">Back</button>
</form>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);;

$link = mysqli_connect('localhost', 'root', 'password', 'cwk2');
session_start();
if (!$link) {
    die('Connect failed ' . mysql_error());
}
else {
  //Use isset (judging that the variable has been configured) function to determine whether the submit has completed the submission
   if (isset($_POST['submit'])){
   }
   if (isset($_POST['back'])){
     header("Location: student.php");
   }
 }
