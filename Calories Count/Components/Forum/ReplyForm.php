<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php
//if the session cant be started then we give an error
	if(!session_start()) {
		header("Location: ../error.php");
		exit;
    }
    $postId = empty($_SESSION['postId']) ? '99' : $_SESSION['postId'];
    $postId = explode("-", $postId);
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
?>
<script>
    var path = '<?php echo $_SESSION['postId']; ?>';
    //reply button for post
    $("#reply-button").click(function() {

    $('#error').html('');
    //create a reply to a post
        $.post("./api/createReply.php", $("#reply-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, path);
            evaluatePath("post");
            } else{
                $('#error').html(data);

            }
        });
      });
    //posting the reply on the forum post
      $("#reply-back-button").click(function() {
          
            history.pushState(null, null, path);
            evaluatePath("post");
      });

</script>
<!-- reply template -->
<div class='reply-form container text-center' style="width: 50%; margin-top: 100px;">
          
                <h1>Reply</h1>

                <form id='reply-form'>
                <input type='hidden' name='action' value='do_create'>
                    
                    <div class="input-group mb-3">
                        <textarea  class="form-control" maxlength="1000" rows='15' cols='15' placeholder="Reply" name='reply'></textarea>
                    </div>

                    
                    <div id='error' style='margin:15px; color: red;'></div>
                    
                    <button type="button" class="btn btn-success" id='reply-button' style='width: 100px;'>Reply</button>

                    <button type="button" class="btn btn-danger" id='reply-back-button' style='width: 100px;'>Back</button>
                </form>
        </div>
 
         