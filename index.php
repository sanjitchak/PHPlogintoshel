<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

    session_start();
   
    if(isset($_SESSION['login'])) {
      header('LOCATION: admin.php'); die();
    }
 
      if(isset($_POST['submit'])){
        $username = $_POST['username']; $password = $_POST['password'];
        if($username === 'dm' && $password === 'PASSWORD'){
           
          
          unset($_SESSION['login']); 
          $_SESSION['login'] = true; header('LOCATION: admin.php'); die();
        } {
          echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
        }

      }
      if ($_SERVER['SERVER_ADDR'] == "107.161.76.74") {
        echo '<p style="text-align:center;" > Old Server. </p>';
      }
      else if($_SERVER['SERVER_ADDR'] == "107.161.78.196") {
        echo '<p style="text-align:center;" > Backup Server. </p>';
      }
      else {
        echo '<p style="text-align:center;" > I am not sure about the server. </p>';
      }
?>
<!DOCTYPE html>
<html>
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>Login</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
<body>
  <div class="container">
    <h3 class="text-center">Login</h3>
   
    <form action="" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password" required>
      </div>
      <button type="submit" name="submit" class="btn btn-default">Login</button>
    </form>
  </div>
</body>
</html>