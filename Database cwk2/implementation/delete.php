<form method="post">
  <h1>Enter the quiz id and quiz name that you want to delete</h1>
  <br/><br/>
  <label>quiz_ID:<input type="number" name="id"></label>
  <br/><br/>
  <label>quiz_Name:<input type="text" name="name"></label>
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

  if(isset($_POST['submit'])){
    if (empty($_POST['id']) or empty($_POST['name'])){
      exit("You can't not enter the quiz id and name when deleting a quiz");
    }

    else{
      $q1 = "SELECT * from Quiz where quiz_id = '{$_POST['id']}'";
      $res1 = mysqli_query($link, $q1);

      $q2 = "SELECT * from Quiz where quiz_name = '{$_POST['name']}'";
      $res2 = mysqli_query($link, $q2);

      if(mysqli_num_rows($res1) == 1 and mysqli_num_rows($res2) == 1){
        $query = "DELETE FROM Quiz WHERE quiz_id = '{$_POST['id']}'";
        $result = mysqli_query($link, $query);
        if($result){
          echo "<br/><br/>delete quiz successfully.";
        }
        else{
          echo "<br/><br/>Failed to delete quiz" . mysqli_error($link);
        }
      }
    }
  }
  mysqli_close($link);

  if(isset($_POST['back'])){
    header("Location: staff.php");
  }
}
?>
