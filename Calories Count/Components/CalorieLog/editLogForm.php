<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error
if(!session_start()){
    header("Location: ../../error.php");
    exit;
}

//requiring database credentials
    require_once "../../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    //if it cant connect give error
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }

    $id = empty($_SESSION['edit-id']) ? '99' : $_SESSION['edit-id'];

    $query = "select * from calorielog where id='$id'";

    //selecting the calorie log where the information is to be edited
    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $date = $row['date'];
            $breakfast = $row['breakfast'];
            $lunch = $row['lunch'];
            $dinner = $row['dinner'];
            $other = $row['other'];
        }
    }

?>
<!-- script for editing meal form -->
    <script>
        $("#edit-meal-button-2").click(function() {
            console.log('edit submit');
        $.post("./api/editInfo.php", $("#edit-meal-form-2").serialize(), function(data) {
            console.log('============editformdata========', data);
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
      });

      $("#edit-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
        </script>
        
        <div class='edit-log-form container text-center'  style="width: 50%; margin-top: 100px;">
        <h1>Edit entry</h1>

        <?php if($error){ ?>
            <div><?php $error ?></div> <?php } ?>

            <form id='edit-meal-form-2'>
            <input type='hidden' name='action' value='do_log'>  
<!-- date field -->
            <div class="input-group mb-3"> 
                <div class="input-group-prepend">
                    <span class="input-group-text">Date</span>
                </div>
                <input type="date" class="form-control" placeholder="Date" name='date' value='<?php echo $date; ?>'>
            </div>
<!-- breakfast field -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Breakfast</span>
                </div>
                 <input type="text" class="form-control" placeholder="Breakfast" name='breakfast' value='<?php echo $breakfast; ?>'>
            </div>
            <!-- lunch field -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Lunch</span>
                </div>
                 <input type="text" class="form-control" placeholder="Lunch" name='lunch' value='<?php echo $lunch; ?>'>
            </div>
            <!-- dinner field -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Dinner</span>
                </div>
                 <input type="text" class="form-control" placeholder="Dinner" name='dinner' value='<?php echo $dinner; ?>'>
            </div>
            <!-- other field -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Other</span>
                </div>
                 <input type="text" class="form-control" placeholder="Other" name='other' value='<?php echo $other; ?>'>
            </div>
<!-- submit and back buttons -->
             <button type="button" class="btn btn-success"
             id='edit-meal-button-2'>Submit</button>
             <button type="button" class="btn btn-danger" id='edit-back-button'>Back</button>
         </form>

</div>