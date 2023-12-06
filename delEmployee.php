<?php
include("config.php");
include("session.php");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['submit_button'])){ //check if form was submitted
    $sql = "DELETE FROM employee WHERE EMPid=" . $_POST["id"];

  if ($db->query($sql) === TRUE) {
    echo '<script>alert("Employee deleted");</script>';
    header("Location: administration.php"); // Replace "home
  }
}

?>

<html>
   <head>
      <title>myLexus | Delete Employee</title>
      
      <style type="text/css">
          img {
              display: block;
              margin: 0 auto;
          }
    
          h1, h2 {
              text-align: center;
          }
      </style>
      
      <img src="logo.png" alt="Lexus Logo" width="500" height="150">
   </head>

    <h1>myLexus Management</h1>
    <h2>Delete Employee</h2>
    
    <body>
        <form action="delEmployee.php" method="post">
            Enter employee ID to delete:<br>
            <input type="text" name="id" placeholder="Employee ID">
            <input type="submit" name="submit_button" value="Delete Employee">
        </form>
    </body>
</html>
