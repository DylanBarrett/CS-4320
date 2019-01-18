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
	
        
       //requiring database configurations
            require_once '../config/db.conf';

            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

             //database error message if connnection cant be made
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

            //gathering post id and user id
        $postId = empty($_SESSION['postId']) ? '99' : $_SESSION['postId'];
        $postId = explode("-", $postId);
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];    

        $query = "select * from likes where postId='$postId[1]' and userId='$id'";

        //inserting like into database on that post that the user posted

        if ($result = $mysqli->query($query)) {
            $numRows = mysqli_num_rows($result);
            if($numRows <  1){
                $query = "INSERT INTO likes (postId, userId) VALUES ('$postId[1]', '$id')";
                
//closing connection
                if ($mysqli->query($query)) {
                    $mysqli->close();
                        echo 'success';
                        exit;
                    }
            }else {
                echo 'Already liked;';
                exit;
            }
            }
?>