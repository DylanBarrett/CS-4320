<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error

if(!session_start()){
    header("Location: ./Error/error.php");
    exit;
}
	//if there is an empty session then try to successfully make one if not fail it.

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

?>

<div> welcome </div>