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

            $script = ' cd /backup/ &&  sudo /usr/local/vesta/bin/v-restore-user admin  $(ls admin.* | tail -n '. "$hour | head -n 1)";
//execute in background. 
// TAIL is to get newest files then HEAD to get the oldest files from those newest files
        $output = shell_exec($script);

        if ($output)
        {
            echo $script;
            echo $output;
           // header('LOCATION: done.php'); die();
        }
        else {
            echo $script;
            echo $output;
            echo "Error!! Try Again or Contact Sanjit please at https://growonlinetoday.com/calendar ";
        }

    }

    if (isset($_POST['Logout'])) {
        unset($_SESSION['login']);    header('LOCATION: index.php'); die();
    
       
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