<!--
    // written by: Alec Richardson
// tested by: Alec Richardson
// debugged by: Alec Richardson
-->
<?php 
//if the session cant be started then we give an error
    if(!session_start())
    { 
      header("Location: error.php");
      exit; 
      } 
      	//if there is an empty session then try to successfully make one if not fail it.
      $loggedIn = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>
<script>
//post button to create a new post
  $("#post-button").click(function() {
    history.pushState(null, null, "create-post");
    evaluatePath("create-post");
  });
//view other post button
  $(".view-post-button").click(function() {
    var postId = {id:$(this).attr('id')};
    console.log(postId);
        $.post("./api/setSession.php", postId, function(data){
            history.pushState(null, null, postId.id);
            evaluatePath("post");
        })
      });
</script>
<!-- forum template -->
<link href="./Components/Forum/Forum.css" rel="stylesheet" type="text/css" />
<div class="container">
  <div id="forum-header">
    <h1 id="forum-title">Community Forum</h1>
    <h3 class="text-center">
      Get involved with the community by sharing tips, progress, or asking
      questions here.
    </h3>
    <div class='text-center'>
    <?php
                if(!empty($loggedIn)){
                    echo '<button type="button" id="post-button" class="btn btn-warning">
                    Create Post 
                  </button>';
                } 
       ?> 
      
    </div>
  </div>
  <div id="forum-container">
    
    <?php
        if($_SESSION['error']){echo '<div>'.$_SESSION['error'].'</div>';}
        
        //require database configuration
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
        //error message if you cant connect to database
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        
        //selecting the posts from the database
        $query = "select posts.*, count(likes.id) as likes from posts left join likes on likes.postId = posts.id group by posts.id order by date, posts.id desc";
            
        //if it exists pull the data
        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 

          ?>
          <!-- forum template -->
      <div class="post">
        <h4><?php echo $row['title']; ?></h4>
          
        <div style='margin: 10px 0 ;'>Posted by: <?php echo $row['user']; ?></div>

          <button type="button" id='post-<?php echo $row['id']; ?>' class="btn btn-warning view-post-button"
          >
            View post
          </button>
          
          <span class='date'>Posted on: <?php echo $row['date']; ?>
          <br/>
          <span><i class="fa fa-thumbs-up"></i> <?php echo $row['likes']; ?></span></span>
      </div>
          <?php }} ?>
  </div>
</div>

<?php include("../Footer/Footer.php") ?>