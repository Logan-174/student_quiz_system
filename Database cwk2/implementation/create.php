<form method="post">
  <h1>Create a new quiz</h1>
  <br/><br/>
  <label>quiz_id:<input type="number" name="id"></label>
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
    //Use isset (judging that the variable has been configured) function to determine whether the submit has completed the submission
     if (isset($_POST['submit'])){

       if (empty($_POST['id']) or empty($_POST['qname']) or empty($_POST['qauthor']) or empty($_POST['qduration']) or empty($_POST['qa'])) {
         exit("Please make sure you fill everything!");
       }

       else{
         $q1 = "SELECT * from Quiz where quiz_id = '{$_POST['id']}'";
         $res1 = mysqli_query($link, $q1);

         if(mysqli_num_rows($res1) == 0){
           if($_POST['id'] >= 0){
             $query = "INSERT INTO Quiz(quiz_id, quiz_name, quiz_author, quiz_duration, quiz_available, date_of_attempt) VALUES('{$_POST['id']}', '{$_POST['qname']}', '{$_POST['qauthor']}', '{$_POST['qduration']}', '{$_POST['qa']}', '2020/12/1')";
             $result = mysqli_query($link, $query);
             if($result){
               echo "Successfully create a new quiz.";
             }
             else{
               echo "Failed to create";
             }
           }
           else {
             echo "The id cannot be negative, please change another id number.";
           }
         }
         else{
           echo "There is a quiz with same quiz id, please change another id.";
         }
       }
     }
     mysqli_close($link);

     if(isset($_POST['back'])){
       header("Location: staff.php");
     }
   }
  ?>
