
<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
--><?php
//if the session cant be started then we give an error
if(!session_start()){
    header("Location: error.php");
    exit;
}

	//if there is an empty session then try to successfully make one if not fail it.
$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>

<link href='./Components/CalorieLog/calorieLog.css' rel='stylesheet' type='text/css
'>

<script>
//enter meal button 
$("#enter-meal-button").click(function() {
            history.pushState(null, null, "enter-meal");
            evaluatePath("enter-meal");
      });
      //delete meal button
$(".delete-meal-button").click(function() {
    var id = {id:$(this).attr('id')};
        $.post("./api/deleteLog.php", id, function(data) {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
        
      });
      //edit meal button
$(".edit-meal-button").click(function() {
    var id = {id:$(this).attr('id')};
        $.post("./api/setSession.php", id, function(data){
            history.pushState(null, null, "edit-meal");
            evaluatePath("edit-meal");
        })
      });
//profile button and function
      $("#profile-button").click(function() {
            history.pushState(null, null, "profile");
            evaluatePath("profile");
      });
      //getting the total calories, goal calories, and remaining calories
      $(function(){
          var total = $('#total').html();
          var goal = $('#goal').html();
          var remaining = goal - total;
          $('#remaining').html(remaining); 
      })

</script>

<div class='calorie-log container text-center' style="width: 70%; margin-top: 100px;">
        
    
    <?php
        if($_SESSION['error']){echo '<div>'.$_SESSION['error'].'</div>';}
        
        //getting database config
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
        //error message if connection cant be made
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
        $query = "select * from calorielog where userId='$id' order by date desc";
            
        //if successful then enter the info into the table and echo out
        //each fields data
        if($result = $mysqli->query($query)){ ?>
            <div>
                 <table class="table table-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Breakfast</th>
                        <th scope="col">Lunch</th>
                        <th scope="col">Dinner</th>
                        <th scope="col">Other</th>
                        <th scope="col">Total</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    <?php 
                        while($row = $result->fetch_assoc()){
                            $total = $row['breakfast'] + $row['lunch'] + $row['dinner'] +
                                $row['other'];
                            $date = date("m-d-Y", strtotime($row['date']));
                        ?> 
                        <tr>
                            <td scope="row"><?php echo $date; ?></td>
                            <td scope="row"><?php echo $row['breakfast']; ?> cals</td>
                            <td scope="row"><?php echo $row['lunch']; ?> cals</td>
                            <td scope="row"><?php echo $row['dinner']; ?> cals</td>
                            <td scope="row"><?php echo $row['other']; ?> cals</td>
                            <td scope="row"><?php echo $total; ?> cals</td>
                            <td scope="row">
                                <form class='edit-meal-form'>
                                    <input type='hidden' name='id' 
                                    value=<?php echo $row['id']; ?>>
                                    <input type='hidden' name='date' value=<?php echo $row['date']; ?>>
                                    <input type='hidden' name='breakfast' value=<?php echo $row['breakfast']; ?>>
                                    <input type='hidden' name='lunch' value=<?php echo $row['lunch']; ?>>
                                    <input type='hidden' name='dinner' value=<?php echo $row['dinner']; ?>>
                                    <input type='hidden' name='other' value=<?php echo $row['other']; ?>>
                                    <button type="button" 
                                    class="btn btn-primary edit-meal-button" id='<?php echo $row['id']; ?>'>Edit</button>
                                </form>
                            </td>
                            <td scope="row">
                                <form id='delete-meal-form'>
                                    <input type='hidden' name='id' value=<?php echo $row['id']; ?>>
                                    
                                    <button type="button" class="btn btn-danger delete-meal-button" id='<?php echo $row['id']; ?>'>Delete</button>
                                </form>
                            </td>
                        </tr>
                <?php } ?>
                </div>
                <!-- goals container -->
                <div id="goals-container" class='container'>
                    <h1 id="page-title">
                        <?php echo $loggedin; ?>'s diary
                    </h1>
                    
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                   
                <?php
                $goal = 0;
                $query = "select * from goals where userId='$id' limit 1";

                //if result is there pull it and all of its information
                if($result = $mysqli->query($query)){
                    while($row = $result->fetch_assoc()){ 
                        $goal = $row['calorieGoal'];
                    }}
                $query = "select users.firstName, users.lastName, calorielog.date, calorielog.breakfast, calorielog.lunch, calorielog.dinner, calorielog.other from users inner join calorielog on users.id = calorielog.userId where calorielog.date = date(now()) AND users.id='$id'";
                }
                if($result = $mysqli->query($query)){
                    $total=0;
                    while($row = $result->fetch_assoc()){
                    $total += $row['breakfast'] + $row['lunch'] + $row['dinner'] + $row['other'];
                    }
                ?>
                
                <div id='counter' class='container'>
                    <h3 class='column'>Goal</h3><h3 class='column'>Total</h3><h3 class='column' style='text-align: right;'>Remaining</h3>
                        <span id="goal" class='column'><?php echo $goal;?></span>-
                        <span id='total'  class='column'> <?php echo $total; ?></span>=
                        <span id='remaining' class='column'></span>
                </div>
                  <?php 
                }

                //closing connections
                $mysqli->close();
                $result->close();
            
              //my profile button
            ?>
            <button type="button" class="btn btn-warning" id='profile-button'>My profile</button>
                </div>   

                <div style='margin: 20px;'>
                     <button type="button" class="btn btn-success" id='enter-meal-button'>Enter a meal</button>
                </div>
                </div>
               