<form method="post">
  <h1>Check your score</h1>
  <br/><br/>
  <label>quiz_id:<input type="number" name="id"></label>
  <br/><br/>
  <label>student_id:<input type="number" name="sid"></label>
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
     if(empty($_POST['id']) or empty($_POST['sid'])){
       echo "Please fill both quiz id and studnet id.";
     }
     else {
       $q3 = "SELECT * from Quiz_stu WHERE quiz_id = '{$_POST['id']}' and student_id = '{$_POST['sid']}'";
       $res3 = mysqli_query($link, $q3);

       if(mysqli_num_rows($res3) == 1){
         $row1 = mysqli_fetch_array($res3);
         echo "Your score is: " . $row1['score'];
       }
       else {
         echo "Your quiz id/student id is wrong, please enter again.";
       }
     }
   }
   if (isset($_POST['back'])){
     header("Location: student.php");
   }
 }
