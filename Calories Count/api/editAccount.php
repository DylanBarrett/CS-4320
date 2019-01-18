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
    
    //gathering user's information to handle the login function
    $email = empty($_POST['email']) ? '' : $_POST['email'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
    $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
   
    //if user forgets email field tell them it is required
    if(!$email){
        echo 'Email field is required.';
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
    $email = $mysqli->real_escape_string($email);
    $password = $mysqli->real_escape_string($password);
    

    $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];

    //if the passwords aren't empty compare them to make sure they match
    //and update the user's password
    if(!empty($password) || !empty($confirmPass)){
        if(strcmp($password, $confirmPass) == 0){
            $password = sha1($password);
            $query = "update users set email = '$email', password = '$password' where id='$id';";
    
            //success message if able
            if($mysqli->query($query)){
                    echo 'success';
                    exit;
            
                    //error message if updating password cant be achieved
                } else {
                    echo 'Error updating account, please try again later.';
                    exit;
                }

                //close connection to database
                $mysqli->close();
        } else {

            //error message if passwords dont match
            echo 'Passwords do not match.';
            exit;
        }
    } else if(empty($password) && empty($password)){
        $query = "update users set email = '$email' where id='$id';";
    
        if($mysqli->query($query)){
                echo 'success';
                exit;
        
                
            } else {
                echo 'Error updating account, please try again later.';
                exit;
            }
            $mysqli->close();
    }
    
    }
    

    



function login_form() {
		echo "redirect";
	}

?>