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

$id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];

//gathering database config
require_once "../../config/db.conf";
    
    //making connection to database
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //error message if connection cant be made
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }

    //selecting goals from the user that they set for themselves
    $query = "select * from goals where userId='$id' limit 1";

    //pulling all the data that is in the goals page
    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $currentWeight = $row['currentWeight'];
            $goalWeight = $row['goalWeight'];
            $calorieGoal = $row['calorieGoal'];
            $activityLevel = $row['activityLevel'];
            $workouts = $row['workouts'];
        }
    }
?>

<script>
//button that pull goals information about the user
    $("#goals-button").click(function() {
    $('#error').html('');
        $.post("./api/editGoals.php", $("#goals-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, "profile");
            evaluatePath("profile");
            } else{
                $('#error').html(data);
            }
        });
      });

      $("#goals-back-button").click(function() {
            history.pushState(null, null, "profile");
            evaluatePath("profile");
      });
</script>
<!-- goals page where user can edit thier information -->
<div class='container text-center' style="width: 50%; margin-top: 100px;">
          
                <h1 style='margin-bottom: 50px;'>Update goals</h1>

                <form id='goals-form'>
                    <input type='hidden' name='action' value='do_log'>  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Current weight</span>
                        </div>
                        <input type="text" class="form-control" name='currentWeight' placeholder="Current weight" value='<?php echo $currentWeight; ?>'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Goal weight</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Goal weight" name='goalWeight' value='<?php echo $goalWeight; ?>'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Calorie goal</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Calorie goal" name='calorieGoal' value='<?php echo $calorieGoal; ?>'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Activity level</span>
                        </div>
                        <select class="form-control" name='activityLevel'>
                            <option value='<?php echo $activityLevel; ?>' selected data-default><?php echo $activityLevel; ?></option>
                            <option value='Not very active'>Not very active</option>
                            <option value='Lightly active'>Lightly active</option>
                            <option value='Active'>Active</option>
                            <option value='Very Active'>Very Active</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Workouts per week</span>
                        </div>
                        <select class="form-control" name='workouts'>
                        <option value='<?php echo $workouts; ?>' selected data-default><?php echo $workouts; ?></option>
                            <option value='0'>0</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                            <option value='7'>7</option>
                        </select>
                    </div>

                    <div id='error' style='margin:15px; color: red;'></div>
                    
                    <button type="button" class="btn btn-success" id='goals-button'>Submit</button>
                    <button type="button" class="btn btn-danger" id='goals-back-button'>Back</button>
                </form>
        </div>
   
 
         