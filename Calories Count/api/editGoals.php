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

    //gathering the user's information to handle the user's goals
    
    $currentWeight = empty($_POST['currentWeight']) ? '' : $_POST['currentWeight'];
    $goalWeight = empty($_POST['goalWeight']) ? '' : $_POST['goalWeight'];
    $calorieGoal = empty($_POST['calorieGoal']) ? '' : $_POST['calorieGoal'];
    $activityLevel = empty($_POST['activityLevel']) ? 'Not Very Active' : $_POST['activityLevel'];
    $workouts = empty($_POST['workouts']) ? '0' : $_POST['workouts'];
   
    //if user forgets any of the above fields then tell them they need all fields
    if(!$currentWeight || !$goalWeight || !$calorieGoal || !$activityLevel || !$workouts){
        echo 'All fields are required.';
        exit;
    }
    
//requiring database configurations
   require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //database error message if connnection cant be made
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
    //escaping the character string to avoid hacking methods
    $currentWeight = $mysqli->real_escape_string($currentWeight);
    $goalWeight = $mysqli->real_escape_string($goalWeight);
    $calorieGoal = $mysqli->real_escape_string($calorieGoal);
    $activityLevel = $mysqli->real_escape_string($activityLevel);
    $workouts = $mysqli->real_escape_string($workouts);

    $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
    
    $query = "select * from goals where userId='$id' limit 1";
    
    if($result = $mysqli->query($query)){


        //updating the user's goals in the database
        if(mysqli_num_rows($result) < 1){
            $query =  "insert into goals (userId, currentWeight, goalWeight, calorieGoal, ActivityLevel, workouts) values('$id', '$currentWeight', '$goalWeight', '$calorieGoal', '$activityLevel', '$workouts')";
        } else{
            $query =  "update goals set currentWeight ='$currentWeight', goalWeight = '$goalWeight', calorieGoal = '$calorieGoal', activityLevel = '$activityLevel', workouts = '$workouts' where userId = '$id';"; 
        }

        //success message if able and error if updating goals cant be acheieved
        if($result = $mysqli->query($query)){
            echo 'success';
        } else {
            echo 'Error updating goals, please try again later';
        }
    }

    //closing connection to database
    $mysqli->close();

}

function login_form() {
		echo "redirect";
	}

?>