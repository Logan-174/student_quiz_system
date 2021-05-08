<form method="post">
  <h1>Registration</h1>
  <select name="users" id="user_select">
    <option value="">--Please choose an option--</option>
    <option value = "student">student</option>
    <option value = "staff">staff</option>
  </select>
  <br/><br/>
  <label>name:<input type="text" name="real_name"></label>
  <br/><br/>
  <label>username:<input type="text" name="name"></label>
  <br/><br/>
  <label>password:<input type="password" name="pw"></label>
  <br/><br/>
  <label>confirm:<input type="password" name="repw"></label>
  <br/><br/>
  <button type="submit" name="submit">Register</button>
</form>


<?php
 // connect to the database
$link = mysqli_connect('localhost', 'root', 'password', 'cwk2');

if (!$link) {
    die('Connect failed ' . mysql_error());
}else {
   //Use isset (judging that the variable has been configured) function to determine whether the submit has completed the submission
    if (isset($_POST['submit'])){

      if (empty($_POST['real_name']) or empty($_POST['name']) or empty($_POST['pw'])) {
        exit("Please make sure you fill everything!");
      }

      else {
      // If the submission is completed, start to judge whether the submitted password is consistent with the confirmed password
        if ($_POST['pw'] == $_POST['repw']){

          $query1 = "SELECT * from Student where student_username = '{$_POST['name']}'";
          $query2 = "SELECT * from Staff where staff_username = '{$_POST['name']}'";
          $result1 = mysqli_query($link, $query1);
          $result2 = mysqli_query($link, $query2);
          //mysqli_num_row return the number of result
          //Since the username and password of each user should be different, if this user exists, the return value should be 1
          if (mysqli_num_rows($result1) == 1 or mysqli_num_rows($result2) == 1){
            echo "<div class='form'>
            <h3>Have registered? Please Log in.</h3>
            <br/>Click here to <a href='login.php'>log in</a></div>";
            exit("This account already exists, please try a new one.");
            // echo "<div class='form'>
            // <h3>Or have registered? Please Log in.</h3>
            // <br/>Click here to <a href='login.php'>log in</a></div>";
          }

          // judge the choice and insert into the database
          if ($_POST['users'] == "student"){
            $query = "INSERT INTO Student (student_id, student_name, student_grade, student_username, student_password) VALUES('45', '{$_POST['real_name']}', '3', '{$_POST['name']}','{$_POST['pw']}')";
            echo "inserted\n";
          }
          else if($_POST['users'] == "staff"){
            $query = "INSERT INTO Staff (staff_name, staff_username, staff_password) VALUES('{$_POST['real_name']}','{$_POST['name']}','{$_POST['pw']}')";
            echo "inserted\n";
          }
          else{
            exit("Please choose an option");
          }

          $result = mysqli_query($link, $query);
         // if insert successfully, it will return true
          if($result){
             // Jump to the login page
             echo "success";
             header("Location: login.php");
          }else{
              echo "Fail";
          }
          }else {
           //js reminder
            echo "<script>alert('The two passwords are inconsistent！')</script>";
        }
      }
    }
}
   //close database
   mysqli_close($link);
?>
