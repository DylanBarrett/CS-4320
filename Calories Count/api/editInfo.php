<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error

 if(!session_start()){
        header("Location: error.php");
        exit;
    }

        //if there is an empty session then try to successfully make one if not fail it.
    $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	$action = empty($_POST['action']) ? '' : $_POST['action'];
    
        //if the user isnt logged in then tell the user they aren't with an error
	if (!$loggedin) {
		header("Location: ../error.php");
		exit;
	} 

if ($action == 'do_log') {
		handle_log(); 
	} else {
		login_form();
    }
    
function handle_log(){
    if(empty($_POST['date'])){
        $error = 'Error: Please select a date';
        echo $error;
    }

    //gathering the user's info for the fields below
    $date = empty($_POST['date']) ? '' : $_POST['date'];
    $breakfast = empty($_POST['breakfast']) ? '0' : $_POST['breakfast'];
    $lunch = empty($_POST['lunch']) ? '0' : $_POST['lunch'];
    $dinner = empty($_POST['dinner']) ? '0' : $_POST['dinner'];
    $other = empty($_POST['other']) ? '0' : $_POST['other'];
   
    
    //require database configuration
   require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //database error message if connection cant be made
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    $id = empty($_SESSION['edit-id']) ? '99' : $_SESSION['edit-id'];
    
    //escaping the character string to avoid hacking methods
    $date = $mysqli->real_escape_string($date);
    $breakfast = $mysqli->real_escape_string($breakfast);
    $lunch = $mysqli->real_escape_string($lunch);
    $dinner = $mysqli->real_escape_string($dinner);
    $other = $mysqli->real_escape_string($other);
 
     $query =  "update calorielog set date ='$date', breakfast = '$breakfast', lunch = '$lunch', dinner = '$dinner', other = '$other' where id = '$id';";
    
    //if the query can be updated print that it successfully was
    //otherwise tell them it was unsuccessful
    if($mysqli->query($query) === TRUE){
       
        echo "Calorie log updated successfully!";
        
    
    } else {
        echo "Updating the calorie log was unsuccessful";
    }
    
    //close database connection
    $mysqli->close();
}

//redirect to login form
function login_form() {
		$username = "";
		$error = "";
		echo "redirect";
	}

?>