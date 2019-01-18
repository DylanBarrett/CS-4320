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
$id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
?>

<link href='./Components/Profile/Profile.css' rel='stylesheet' type='text/css
'>

<script>
//button that takes user back to profile dashboard
      $("#profile-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
      //button that takes users goals and updates them
      $("#update-goals-button").click(function() {
            history.pushState(null, null, "update-goals");
            evaluatePath("update-goals");
      });
      //button that lets users edit their account information
      $("#edit-account-button").click(function() {
            history.pushState(null, null, "edit-account");
            evaluatePath("edit-account");
      });
</script>
<!-- profile page-->
<div id="profile-container" class='container'>
        <h1 id='name'><?php echo $loggedin; ?></h1>
        <i id='avatar' class="fa fa-user fa-5x" aria-hidden="true"></i>
        <div id="columns">
            <div id="column-a">
            <h3 id='name'>Profile</h3>
            <?php

            //gathering database configs
                require_once "../../config/db.conf";
        
                //connecting to database
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
            
                //error message if connection isn't made
                if($mysqli->connect_error){
                    die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
                }
                $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
                $query = "select * from users where id='$id'";
                    
                //pulling all user info (name, email, birthday, etc....)
                if($result = $mysqli->query($query)){ 
                    while($row = $result->fetch_assoc()){
                        $date = substr($row['addDate'], 0, 10);
                        $m = substr($date, 5, 2);
                        $d = substr($date, 8, 2);
                        $y = substr($date, 0, 4);
                        $joinDate = $m."/".$d."/".$y;
                        $date = substr($row['birthday'], 0, 10);
                        $m = substr($date, 5, 2);
                        $d = substr($date, 8, 2);
                        $y = substr($date, 0, 4);
                        $birthday = $m."/".$d."/".$y;


            ?>
            <!-- printing out the users information into the profile page -->
                <div id='user-info'>
                    <ul id='user-info-list' class='container'>
                        <li class='list-item'><h5>First name </h5> <?php echo $row['firstName'];?></li>
                        
                        <li class='list-item'><h5>Last name </h5><?php echo $row['lastName'];?></li>
                        
                        <li class='list-item'><h5>Email </h5><?php echo $row['email'];?></li>
                        
                        <li class='list-item'><h5>Birthday </h5><?php echo $birthday;?></li>
                        
                        <li class='list-item'><h5>Date joined </h5><?php echo $joinDate;?></li>

                        <li class="list-item"><button type="button" id='edit-account-button' class="btn btn-warning">Edit account</button></li>
                        
                    </ul>
                </div>
            </div>    
            <!-- Goals part of profile page -->
                
            
        <div id="column-b">
            <h3 id='name'>Goals</h3>
            <div id='user-info'>
            <ul id='user-info-list' class='container' >
            <?php }}
                
                $query = "select * from goals where userId='$id' limit 1";
                    
                //selecting the users goals from database and printing them 
                //so the user can see them
                if($result = $mysqli->query($query)){
                    while($row = $result->fetch_assoc()){
                ?>
                    
                        <li class='list-item'><h5>Current weight </h5> <?php echo empty($row['currentWeight']) ? 'N/A' : $row['currentWeight'];?></li>
                        
                        <li class='list-item'><h5>Goal weight </h5><?php echo  empty($row['goalWeight']) ? 'N/A' :$row['goalWeight'];?></li>
                        
                        <li class='list-item'><h5>Calorie goal </h5><?php echo empty($row['calorieGoal']) ? 'N/A' : $row['calorieGoal'];?></li>
                        
                        <li class='list-item'><h5>Activity level </h5><?php echo empty($row['activityLevel']) ? 'N/A' : $row['activityLevel'];?></li>
                        
                        <li class='list-item'><h5>Workouts per week </h5><?php echo empty($row['workouts']) ? 'N/A' : $row['workouts'];?></li>

                <?php }} $mysqli->close(); ?>
                
                        <li class="list-item"><button type="button" class="btn btn-warning" id='update-goals-button'>Update goals</button></li>
                    </ul>
            </div>
        </div> 

                    
                    <!--  -->
    </div>
    <button type="button" class="btn btn-danger" id='profile-back-button'>Back</button>
</div>
 
         