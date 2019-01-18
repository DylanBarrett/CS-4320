
<!--
    // written by: Dylan Barrett
// tested by: Dylan Barrett
// debugged by: Dylan Barrett
-->
<?php
//if the session cant be started then we give an error
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}
	//if there is an empty session then try to successfully make one if not fail it.

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>
<script>
   $("#login-button").click(function() {
    $('#error').html('');
        $.post("./api/login.php", $("#login-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
            changeActive('dashboard');
            } else{
                $('#error').html(data);
            }
        });
      });
//register and logout buttons with thier values and functions
       $("#logout-button").click(function() {
        $.get("./api/logout.php",function(data) {
            history.pushState(null, null, "login");
            evaluatePath("login");
        });
      });

      $("#register-button").click(function() {
            history.pushState(null, null, "register");
            evaluatePath("register");
        
      });
</script>
<!-- start of form data -->
<div class='login-form container text-center' style="width: 50%; margin-top: 100px;">

            <?php if(!$loggedin){ ?>
                <h1>Log in</h1>
                <form id='login-form'>
                    <input type='hidden' name='action' value='do_login'>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                        <input type="text" class="form-control" name='username' placeholder="Username">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name='password'>
                    </div>
                    <div id='error' style='margin: 25px; color: red;'></div>
                    <button type="button" class="btn btn-success" id='login-button'>Log in</button>
                </form>
                <h1 style='margin: 25px;'>Not registered?</h1>
                <button type="button" class="btn btn-primary" id='register-button'>Register</button>

            <?php } else { ?> 
                    <h1>Log Out</h1>
                    <button type="button" class="btn btn-danger" id='logout-button'>Log out</button>
            <?php } ?>

        </div>
 
        