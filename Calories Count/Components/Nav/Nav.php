<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
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
<link href='./Components/Nav/Nav.css' rel='stylesheet' type='text/css
'>

<!-- start of nav bar and items in it. -->
<div class="navbar navbar-dark bg-dark navbar-expand-lg">
  
        <a class="navbar-brand" href="./">
            <h1>Calories Count</h1>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav-container"> 
        <div class="collapse navbar-collapse" id="navbarToggler">
          
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a
                id='home'
                class='nav-link active async-link'
                href='./'
              >
                Home
              </a>
            </li>
            <li class="nav-item">
              <a
                id='workouts'
                class='nav-link  async-link'
                href='./workouts'
              >
                Workouts
              </a>
            </li>
            <li class="nav-item">
              <a
                id='forum-nav'
                class='nav-link  async-link'
                href='./forum'
              >
                Forum
              </a>
            </li>
            <li class="nav-item">
              <a
                id='nutrition'
                class='nav-link  async-link'
                href='./nutrition'
              >
                Nutrition
              </a>
            </li>
            <li class="nav-item">
              <a
              id='dashboard'
              class='nav-link async-link'
              href='./dashboard'
              >
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a
              id='login'
                class='nav-link async-link' href='./login'
              >
                Login
              </a>
            </li>
          </ul>
          </div> 
        </div>
</div>
