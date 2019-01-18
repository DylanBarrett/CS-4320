<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error
	if(!session_start()) {
		header("Location: ../error.php");
		exit;
	}
		//if there is an empty session then try to successfully make one if not fail it.

	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    
    //if the user isnt logged in then tell the user they aren't
	if (!$loggedIn) {
        echo 'Not logged in.';
        exit;
	}
	
        
       //require database configuration
            require_once '../config/db.conf';

            //connecting to database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            //if system can't connect to database print error message
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

        $postId = empty($_POST['id']) ? '' : $_POST['id'];  

        //get post with id equal to the one we are looking to delete
        $query =  "delete from posts where id='$postId'";
          
            //close connection to database with success message
            //if it cant close give error message
        if ($mysqli->query($query)) {
                    $mysqli->close();
                    echo 'success';
            }else{
                echo 'Delete failed.';
            }
            
        
?>