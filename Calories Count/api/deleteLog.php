<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error
	if(!session_start()){
        header("Location: ../error.php");
        exit;
    }
	//if there is an empty session then try to successfully make one if not fail it.

	$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	//if user isnt logged in then redirect them to the login form page
	if (!$loggedin) {
		header("Location: ../Login/loginForm.php");
		exit;
	} 
        
  $id = empty($_POST['id']) ? '' : $_POST['id'];
   
    

      //require database conf to connect to it
   require_once "../config/db.conf";
    
   //connecting to database
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //if system cant connect to database
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
   //not allowing foreign characters that could make our system
  //vulnerable to hacking methods. 
    $id = $mysqli->real_escape_string($id);
 
    //finding the log where id equals the one we are looking for
    $query =  "delete from calorielog where id='$id'";
    
    //process of deleting log, if successful print success message
    //else print message that we cant delete log.
    
    if($mysqli->query($query)){
        echo 'Entry deleted succesfully';
    } else{
        $error = "Error, unable to delete log.";
        echo $error;
    }
//close connection to database after done with process
    $mysqli->close();
    
?>