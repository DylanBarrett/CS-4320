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
//if this is brand new session start setting id's
unset($_SESSION['edit-id']);
unset($_SESSION['postId']);

$_SESSION['edit-id'] = empty($_POST['id']) ? '' : $_POST['id'];
$_SESSION['postId'] = empty($_POST['id']) ? '' : $_POST['id'];

echo $_SESSION['edit-id'];
echo $_SESSION['postId'];
?>