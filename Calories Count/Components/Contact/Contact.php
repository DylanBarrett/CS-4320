<!--
    // written by: Dylan Barrett
// tested by: Dylan Barrett
// debugged by: Dylan Barrett
-->
<script>
//submit contact feedback form to send email to sys admin
$("#submit-contact").click(function() {
    $('#error').html('');
    $('#success').html('');
        $.post("./api/contact.php", $("#contact-form").serialize(), function(data) {
            if(data === 'success'){
                $('#success').html(data);
            } else{
                $('#error').html(data);
            }
        });
      });
</script>

<link href='./Components/Contact/Contact.css' rel='stylesheet' type='text/css
'>
<!-- contact/feedback form container -->
<div class="container">
    <div id="header">
        <h1 >Contact Us</h1>
    </div>
<div class="contact-container">
        
		<form id='contact-form'>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" placeholder="Username">

			<label for="email">Email</label>
			<input type="text" id="email" name="email" placeholder="Your Email">

			<label for="comment">Comments</label>
			<textarea id="subject" name="comment" placeholder="We appreciate your feedback" style="height:200px"></textarea>
            
            <div id='success' style='margin: 25px; color: green; text-align: center;'></div>
            <div id='error' style='margin: 25px; color: red; text-align: center;'></div>

			<div class="submitButton">
                <button type="button" id='submit-contact' class="btn btn-success view-post-button">Submit</button>
			</div>
		</form>
        
    </div>
</div>
<!-- contact footer container -->
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