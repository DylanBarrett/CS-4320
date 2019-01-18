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
<link href="./Components/Forum/Post.css" rel="stylesheet" type="text/css" />
<script>
//reply button on post page
    $("#reply-button").click(function() {
            history.pushState(null, null, "reply");
            evaluatePath("reply");
      });
//button to go back to previous page
      $("#post-back-button").click(function() {
            history.pushState(null, null, 'forum');
            evaluatePath("forum");
      });
//like button to like others post on forum page
      $("#like-button").click(function() {
        $.post("./api/likePost.php", function(data) {
            if(data === 'success'){
                var path = '<?php echo $_SESSION['postId']; ?>';
                history.pushState(null, null, path);
                evaluatePath("post");
            }
        });
  });
  //button to delete the post
  $(".delete-button").click(function() {
    var id = {id:$(this).attr('id')};
    console.log('id', id);
        $.post("./api/deletePost.php", id, function(data) {
            console.log(data);
            if(data === 'success'){
                history.pushState(null, null, "forum");
                evaluatePath("forum");
            }
        });
  });
</script>
<!-- post template -->
<div class="container">
    <div id='post-container'>
    <?php
        
        //gathering database config
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
        //error message if you cant connect to database
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        //pulling posts from database
        $query = "select posts.*, count(likes.id) as likes from posts left join 
        likes on likes.postId = posts.id where posts.id='$postId[1]' group by posts.id order by date, posts.id";
        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
          <!-- post template for every post that gets submitted-->
      <div id="post">
            <i class="fa fa-flag date" aria-hidden="true"></i>
            <h3 class='text-center'><?php echo $row['title']; ?></h3>
            <h5>Posted by: <?php echo $row['user']; ?></h5>
            <div id="post-content">
                <div><?php echo $row['post']; ?></div>
            </div>
            <button type="button" id='like-button' class="btn btn-success">
                <span><i class="fa fa-thumbs-up"></i></span> Like
            </button>
            <span id='likes' style='margin-left: 10px;'><?php echo $row['likes']; ?></span>
            <?php
                if($loggedIn == $row['user']){
                    echo '<div><button type="button" id='.$row['id'].' class="btn btn-danger delete-button">
                    <span><i class="fa fa-trash"></i></span> Delete
                </button></div>';
                } 
            ?> 
            <h5 class='date'>Posted on: <?php echo $row['date']; ?></h5>
        
      </div>
      <div id='post-buttons'> 
      <?php
                if(!empty($loggedIn)){
                    echo '<button type="button" class="btn btn-warning" id="reply-button" style="width: 100px;">Reply</button>';
                } 
       ?>    
            
            <button type="button" class="btn btn-danger" id='post-back-button' style='width: 100px;'>Back</button>     
        </div>
        
          <?php 
          }
        } 

        //pulling all replies to that post from database
        $query = "select * from replies where postId='$postId[1]' order by date desc";

        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
          <!-- reply field on post page -->
      <div class="reply">
        <h6>Reply from: <?php echo $row['user']; ?></h6>
        <div id="post-content">
            <div><?php echo $row['reply']; ?></div>
        </div>
        <h6 class='date'>Posted on: <?php echo $row['date']; ?></h6>
      </div>
      <?php
          }}
    ?>
    </div>
</div>