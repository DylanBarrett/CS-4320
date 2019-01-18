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
 
if ($loggedin) {
    echo 'already logged in';
    exit;
    }

  
$action = empty($_POST['action']) ? '' : $_POST['action'];
// logging in the user
if ($action == 'do_login') {
        handle_login(); 
       
	} else {
        login_form();
	}

    //gathering the user's info for username and password
function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];

        //requiring database configurations
        require_once "../config/db.conf";
        
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
        //database error message if connnection cant be made
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
        //escaping characters for the below fields to avoid hacking methods
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        

        if($password != 'pass'){
        $password = sha1($password); 
        }
        $query = "select id from users WHERE username = '$username' AND password = '$password'";
    
        $result = $mysqli->query($query);
        //checking the users entered info vs the stored encrypted data
        
        if($result){
            $match = $result->num_rows;
            
            if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                $row = $result->fetch_assoc();
                                
                $_SESSION['id'] = $row['id'];
               //if the usernames match echo success 
                echo 'success';
               //if credentials dont match then print error message
            }
            else {
                echo "Incorrect username or password";

                //close connections
            }
            $result->close();
            $mysqli->close();
        }
	
	}

function login_form() {
		$username = "";
        echo 'redirect';
       
	}
?>