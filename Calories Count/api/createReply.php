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
	
	if (!$loggedIn) {
        echo 'Not logged in.';
        exit;
	}
	
	//if the user is logged in then give them the blank forum post to fill out
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_post();
	} else {
		login_form();
	}
	//take the reply the user has entered
	function create_post() {
		$reply = empty($_POST['reply']) ? '' : $_POST['reply'];
        //if the reply field isnt filled out give an error
        if($reply == ''){
            echo 'All fields are required';
            exit;
        }
        
        
//requring the database configurations
            require_once '../config/db.conf';
//make new connection to database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
//if it cant connect give error
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

        //not allowing foreign characters that could make our system
        //vulnerable to hacking methods.   
        $reply = $mysqli->real_escape_string($reply);
        
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
        $postId = empty($_SESSION['postId']) ? '' : $_SESSION['postId'];
        $postId = explode("-", $postId);
        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];    
        
            
            $query = "INSERT INTO replies (date, postId, userId, user, reply) VALUES (now(),'$postId[1]', '$id','$loggedIn', '$reply')";
           
            //inserting post into database
            if ($mysqli->query($query)) {
                $mysqli->close();
               
                    echo 'success';
                    exit;
                }
                //error case if post cant be inserted
                echo 'Error, please contact administration.';
                exit;
            } 
     
//redirect after submitting post to database
	function login_form() {
        echo 'redirect';
        exit;
	}
	
?>