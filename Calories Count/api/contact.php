
<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//take in the username, email and comment from user and if those fields are filled out
//send that info in an email to the system.
$username = empty($_POST['username']) ? '' : $_POST['username'];
$email = empty($_POST['email']) ? '' : $_POST['email'];
$comment = empty($_POST['comment']) ? '' : $_POST['comment'];

$comment = wordwrap($comment,70);

if(mail('alecwrichardson@gmail.com',$username,$comment,$email)){
    echo 'success';
    exit;
} else {
    echo 'Error. Please contact administration.';
    exit;
}

?>