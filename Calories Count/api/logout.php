<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
    //if session hasn't started and user tries to logout give error
    //print log out successfully
    if(!session_start()){
        header("Location: ./Components/Error/error.php");
        exit;
    }
    $_SESSION = array();
    session_destroy();
	
	echo 'Logged out successfully';
?>
