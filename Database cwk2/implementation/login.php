<form method="post">
  <h1>Log In</h1>
  <select name="users" id="users">
    <option value="">--Please choose an option--</option>
    <option value = "student">student</option>
    <option value = "staff">staff</option>
  </select>
  <br/><br/>
  <label>username:<input type="text" name="name"></label>
  <br/><br/>
  <label>password:<input type="password" name="pw"></label>
  <br/><br/>
  <button type="submit" name="submit">Log In</button>
</form>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);;

$link = mysqli_connect('localhost', 'root', 'password', 'cwk2');
session_start();
if (!$link) {
    die('Connect failed ' . mysql_error());
}else {
   //Use isset (judging that the variable has been configured) function to determine whether the submit has completed the submission
    if (isset($_POST['submit'])){

      if (empty($_POST['name']) or empty($_POST['pw'])) {
        exit("Please make sure you fill everything!");
      }

      else {
        $q1 = "SELECT * from Student WHERE student_username = '{$_POST['name']}'";
        $q2 = "SELECT * from Staff WHERE staff_username = '{$_POST['name']}'";
        $res1 = mysqli_query($link, $q1);
        $res2 = mysqli_query($link, $q2);

        if($_POST['users'] == "student"){
          if(mysqli_num_rows($res1) == 1){
            $query1 = "SELECT * from Student WHERE student_password = '{$_POST['pw']}'";
            $result1 = mysqli_query($link, $query1);
            if(mysqli_num_rows($result1) == 1){
                echo "Log in successfully.";
                $_SESSION['name'] = $_POST['name'];
                header("Location: student.php");
            }
            else{
              echo "Username/password is incorrect.";
            }
          }
          else{
            echo "<div class='form'>
            <h3>This student account does not exist, Please Register first.</h3>
            <br/>Click here to <a href='registration.php'>register</a></div>";
          }
        }
        elseif($_POST['users'] == "staff"){
          if(mysqli_num_rows($res2) == 1){
            $query2 = "SELECT * from Staff WHERE staff_password = '{$_POST['pw']}'";
            $result2 = mysqli_query($link, $query2);
            if(mysqli_num_rows($result2) == 1){
              echo "Log in successfully.";
              $_SESSION['name'] = $_POST['name'];
              header("Location: staff.php");
            }
            else{
              echo "Username/password is incorrect..";
            }
          }
          else{
            echo "<div class='form'>
            <h3>This staff account does not exist, Please Register first.</h3>
            <br/>Click here to <a href='registration.php'>register</a></div>";
          }
        }

        else{
          exit("Please choose an option");
        }
      }
    }
  }
  mysqli_close($link);
  ?>
