<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:index.php'); die();
    }
    if (isset($_POST['restore'])) {

    
            // Sanitizing name value of type string
            $_POST['hour'] = filter_var($_POST['hour'], FILTER_SANITIZE_NUMBER_INT	);
           
            $hour = $_POST['hour'];
//execute in background
        $output = shell_exec("sudo /usr/local/vesta/bin/v-restore-user admin `ls /backup | tail -n $hour` & ");

        if ($output)
        {
            header('LOCATION: done.php'); die();
        }
        else {
            echo "Error!! Contact Sanjit please at https://growonlinetoday.com/calendar ";
        }

    }

    if (isset($_POST['Logout'])) {
        unset($_SESSION['login']);    header('LOCATION: index.php'); die();
    
       
}
?>
<html>
    <head>
        <title>Restore Page</title>
    </head>
    <body>
    <form action = "admin.php" method = "post"> 
          
    <select  name="hour">
    <option value="1">1 Hour</option>
    <option value="2">2 Hours</option>
    <option value="3">3 Hours</option>
    <option value="4">4 Hours</option>
  </select>
              <br><br> 
                
              <input type = "submit" name = "restore" value = "Restore"> 
          </form> 

          <form action = "admin.php" method = "post"> 
         
                      
                    <input type = "submit" name = "Logout" value = "Logout"> 
                </form> 

    </body> 
</html>