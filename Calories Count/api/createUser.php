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
	
	if ($loggedIn) {
		echo 'redirect';
	}
	
	//if the user isnt logged in then give them the register page if they cant login
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}
	//values on the register page that we take and input into the database
	function create_user() {
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
		$lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
        $birthday = empty($_POST['birthday']) ? '' : $_POST['birthday'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];

        //if any field is empty give them an error telling them to fill out all fields
        if($firstName == '' || $lastName == '' || $username == '' || $password == '' || $confirmPass == '' || $birthday == '' || $email == ''){
            echo 'All fields are required';
        }
        
        if(strcmp($password, $confirmPass) == 0){

//requrie database configuration
            require_once '../config/db.conf';

//make connection to database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            
//if it cant connect give error
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'redirect';
            }

            //not allowing foreign characters that could make our system
        //vulnerable to hacking methods. 
           
        $firstName = $mysqli->real_escape_string($firstName);
        $lastName = $mysqli->real_escape_string($lastName);
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        $confirmPass = $mysqli->real_escape_string($confirmPass);
        $birthday = $mysqli->real_escape_string($birthday);
        $email = $mysqli->real_escape_string($email);

            //not allowing the same username to be inputted
            
            $query = "select * from users where username='$username'";
       
            
            $result = $mysqli->query($query);
            //error result if username inputted is already in the database
            if($result->num_rows>0){
                echo 'Username is already taken.';
            }
            //encrypting password
            
            $password = sha1($password);
            //inserting data fields in database
            $query = "INSERT INTO users (firstName, lastName, username, password, email, birthday, addDate, changeDate) VALUES ('$firstName', '$lastName', '$username', '$password', '$email', STR_TO_DATE('$birthday', '%Y-%m-%d'), now(), now())";

            //if all field can be inserted then print success
            if ($mysqli->query($query) === TRUE) {
                $mysqli->close();

                    echo 'success';
                }
            } 
            //error checking that passwords match
        else {
          echo 'Passwords do not match!';
        }
    
	}
//redirect after submitting post to database
	function login_form() {
		$username = "";
		echo 'redirect';
	}
	
?>