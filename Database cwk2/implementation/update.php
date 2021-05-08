<form method="post">
  <h1>Enter the quiz id and quiz name that you want to update</h1>
  <br/><br/>
  <label>quiz_ID:<input type="number" name="ID"></label>
  <br/><br/>
  <label>quiz_Name:<input type="text" name="Name"></label>
  <br/><br/>
  <h1>Update the quiz</h1>
  <br/><br/>
  <label>quiz_name:<input type="text" name="qname"></label>
  <br/><br/>
  <label>quiz_author:<input type="text" name="qauthor"></label>
  <br/><br/>
  <label>quiz_duration:<input type="text" name="qduration"></label>
  <br/><br/>
  <label>quiz_available:<input type="text" name="qa"></label>
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
    if (empty($_POST['ID']) or empty($_POST['Name'])){
      exit("You can't not enter the top two quiz id and name when updating a quiz");
    }

    else{
      $q1 = "SELECT * from Quiz where quiz_id = '{$_POST['ID']}'";
      $res1 = mysqli_query($link, $q1);

      $q2 = "SELECT * from Quiz where quiz_name = '{$_POST['Name']}'";
      $res2 = mysqli_query($link, $q2);


      if(mysqli_num_rows($res1) == 1 and mysqli_num_rows($res2) == 1){
        if (empty($_POST['id']) and empty($_POST['qname']) and empty($_POST['qauthor']) and empty($_POST['qduration']) and empty($_POST['qa'])){
          echo "there is no change.";
        }
        else{
          if(!empty($_POST['qname'])){
            $query1 = "UPDATE Quiz SET quiz_name='{$_POST['qname']}' WHERE quiz_id='{$_POST['ID']}'";
            $result1 = mysqli_query($link, $query1);
            if($result1){
              echo "<br/><br/>Change quiz name successfully.";
            }
            else{
              echo "<br/><br/>Failed to change quiz name";
            }
          }
          if(!empty($_POST['qauthor'])){
            $query2 = "UPDATE Quiz SET quiz_author='{$_POST['qauthor']}' WHERE quiz_id='{$_POST['ID']}'";
            $result2 = mysqli_query($link, $query2);
            if($result2){
              echo "<br/><br/>Change quiz author successfully.";
            }
            else{
              echo "<br/><br/>Failed to change quiz author";
            }
          }
          if(!empty($_POST['qduration'])){
            $query3 = "UPDATE Quiz SET quiz_duration='{$_POST['qduration']}' WHERE quiz_id='{$_POST['ID']}'";
            $result3 = mysqli_query($link, $query3);
            if($result3){
              echo "<br/><br/>Change quiz author successfully.";
            }
            else{
              echo "<br/><br/>Failed to change quiz author";
            }
          }
          if(!empty($_POST['qa'])){
            $query4 = "UPDATE Quiz SET quiz_available='{$_POST['qa']}' WHERE quiz_id='{$_POST['ID']}'";
            $result4 = mysqli_query($link, $query4);
            if($result4){
              echo "<br/><br/>Change quiz duration successfully.";
            }
            else{
              echo "<br/><br/>Failed to change quiz duration";
            }
          }
        }
      }
      else{
        echo "The ID/name of quiz is incorrect, please enter an existing quiz id/name.";
      }
    }
  }
  mysqli_close($link);

  if(isset($_POST['back'])){
    header("Location: staff.php");
  }
}
?>
