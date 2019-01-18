
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
$action = empty($_POST['action']) ? '' : $_POST['action'];

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	//if the user isnt logged in then give them an error telling them to login
	if (!$loggedin) {
		header("Location: ../error.php");
		exit;
	} 

//handleling login function
if ($action == 'do_log') {
		handle_log(); 
	} else {
		login_form();
    }
    
function handle_log(){
    //telling user to select date to log thier info under
    if(empty($_POST['date'])){
        echo 'Please select a date.';
        exit;
    }

    //gathering data from fields below to insert into database
    $date = empty($_POST['date']) ? '' : $_POST['date'];
    $breakfast = empty($_POST['breakfast']) ? '0' : $_POST['breakfast'];
    $lunch = empty($_POST['lunch']) ? '0' : $_POST['lunch'];
    $dinner = empty($_POST['dinner']) ? '0' : $_POST['dinner'];
    $other = empty($_POST['other']) ? '0' : $_POST['other'];
   
    
    //requiring database configurations
   require_once "../config/db.conf";
   
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
            //database error message if connnection cant be made

    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
  
            //escaping characters for the below fields to avoid hacking methods
    $date = $mysqli->real_escape_string($date);
    $breakfast = $mysqli->real_escape_string($breakfast);
    $lunch = $mysqli->real_escape_string($lunch);
    $dinner = $mysqli->real_escape_string($dinner);
    $other = $mysqli->real_escape_string($other);
  
    //inserting data into users log
     $query =  "insert into calorielog (userId, date, breakfast, lunch, dinner, other) values ('$id', '$date', '$breakfast', '$lunch', '$dinner', '$other')";
    
    //success if successful and fail error message if it fails
    if($mysqli->query($query)){
       
        echo "success";    
    } else {
        echo "Error submitting entry, please contact the system administrator.";
    }
    //close connection
    $mysqli->close();
}

function login_form() {
		$username = "";
		$error = "";
		echo 'redirect';
	}

?>