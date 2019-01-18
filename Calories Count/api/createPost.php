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
	//take the title and post the user has entered
	function create_post() {
		$title = empty($_POST['title']) ? '' : $_POST['title'];
		$post = empty($_POST['post']) ? '' : $_POST['post'];
        //if any forum fields are empty then echo an error
        if($title == '' || $post == ''){
            echo 'All fields are required';
            exit;
        }
        
        
//requiring the database configurations
            require_once '../config/db.conf';
//make new connection to database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

        //not allowing foreign characters that could make our system
        //vulnerable to hacking methods.
        $title = $mysqli->real_escape_string($title);
        $post = $mysqli->real_escape_string($post);
        
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];    
        
            
            $query = "INSERT INTO posts (date, userId, user, title, post) VALUES (now(),'$id','$loggedIn', '$title', '$post')";
           
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