<!--
    // written by: Dylan Barrett
// tested by: Dylan Barrett
// debugged by: Dylan Barrett
-->
<link href='./Components/Landing/Landing.css' rel='stylesheet' type='text/css
'>

<script>
//button to take you to forum page
    $("#forum-desc").click(function() {
            history.pushState(null, null, "forum");
            evaluatePath("forum");
            changeActive('forum');
      });
      //button to take user to calorie log page
      $("#diary").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
            changeActive('dashboard');
      });
      //button to take user to workouts part of page
      $("#workout").click(function() {
            history.pushState(null, null, "workouts");
            evaluatePath("workouts");
            changeActive('workouts');
      });
      //button to take user to nutrition part of page
      $("#nutrition").click(function() {
            history.pushState(null, null, "nutrition");
            evaluatePath("nutrition");
            changeActive('nutrition');
      });
      //button to take user to contact section of page
      $("#contact").click(function() {
            history.pushState(null, null, "contact");
            evaluatePath("contact");
            changeActive('contact');
      });
</script>
<!-- start of landing page -->
<div id='background-image'>
    <div class='container' id='intro'> 
        Your one stop shop for everything fitness.
    </div>
</div>

<div id='description'>
    <div class='desc' class='col'>
        <h2>Log Calories</h2>
        <p class='landing-desc' >Keep track of the amount of calories you consume to meet your fitness goals using our simple calorie diary.</p>
        <button type="button" id='diary' class="btn btn-warning landing-button">Diary</button>
        <hr style=' width: 75%;'/>
    </div>
    <div class='desc' class='col'>
        <h2>Track Workouts</h2>
        <p class='landing-desc'>Find different workouts and exercises to accelerate your progress to gain muscle, burn fat, or stay healthy.</p>
        <button type="button" id='workout' class="btn btn-warning landing-button">Workouts</button>
        <hr style=' width: 75%;'/>
    </div>
    <div class='desc' class='col'>
        <h2>Explore Nutrition</h2>
        <p class='landing-desc'>Different goals require different diets. Search for the perfect diet plan that fits your needs.</p>
        <button type="button" id='nutrition' class="btn btn-warning landing-button">Diets</button>
        <hr style=' width: 75%;'/>
    </div>
</div>
    
<div id='forum'>
    <div id="forum-desc">
        <h1>Forum</h1>
        <p class='landing-desc'>Ask questions, share advice, or update your friends on your progress in our forum.</p>
    </div>
</div>

<div id="contact" class='container text-center'>
    <h1>Contact us</h1>
    <p class='landing-desc'>Have any reccomendations or need to report a bug? Send us a message to voice your concerns and opinions.</p>
    <button type="button" class="btn btn-warning landing-button">Contact</button>
    <hr/>
</div>

<div id='footer-container'> 
    <div id="column-1">
    <a href="#" class="fa fa-facebook social"></a>
    <a href="#" class="fa fa-twitter social"></a>
    <a href="#" class="fa fa-instagram social"></a>
    </div>
    <div id="column-2"><h4>&copy Calories Count</h4><hr/></div>
    <div id="column-3">
        <ul id='menu'>
            <li><h5>Menu</h5></li>
            <li><a href='#' class='menu-link'>Home</a></li>
            <li><a href='#' class='menu-link'>Dashboard</a></li>
            <li><a href='#' class='menu-link'>Workouts</a></li>
            <li><a href='#' class='menu-link'>Diets</a></li>
            <li><a href='#' class='menu-link'>Contact</a></li>
        </ul>
    </div>
    </div>

</div>

