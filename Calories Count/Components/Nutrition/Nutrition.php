<!--
    // written by: Dylan Barrett
// tested by: Dylan Barrett
// debugged by: Dylan Barrett
-->
<?php
//if the session cant be started then we give an error
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}

?>
<!-- buttons that take you to the upper and lower body sections of the website -->
<script>
	$("#upper-body").click(function () {
		history.pushState(null, null, "upper-body");
		evaluatePath("upper-body");
	});
	$("#lower-body").click(function () {
		history.pushState(null, null, "lower-body");
		evaluatePath("lower-body");
	});
</script>

<link href='./Components/Nutrition/Nutrition.css' rel='stylesheet' type='text/css
'>
<!-- start of nutrition page that lists top diets of 2018-->
<div class="container">
    <div id='nutrition-container'>
		<div class="header">
			<h1>Popular Diets of 2018</h1>
		</div>
		<div class="diets">
			<div class ="individual">
				<h2 class='title'>
					<a href="https://health.usnews.com/best-diet/dash-diet" target="_blank">DASH Diet</a>
				</h2>
				<p class='desc'>The DASH Diet, which stands for dietary approaches to stop hypertension, is promoted by the National Heart, Lung, and Blood Institute to do exactly that: stop (or prevent) hypertension, aka high blood pressure.</p>
			</div>
			
			<div class ="individual">
				<h2 class='title'>
					<a href="https://www.healthline.com/nutrition/mediterranean-diet-meal-plan" target="_blank">Mediterranean Diet</a>
				</h2>
				<p class='desc'>The Mediterranean diet is based on the traditional foods that people used to eat in countries like Italy and Greece back in 1960.
                Researchers noted that these people were exceptionally healthy compared to Americans and had a low risk of many lifestyle diseases.</p>
			</div>
			
			<div class ="individual">
				<h2 class='title'>
					<a href="https://www.healthline.com/nutrition/ketogenic-diet-101" target="_blank">Ketogenic Diet</a>
				</h2>
				<p class='desc'>The ketogenic diet (or keto diet, for short) is a low-carb, high-fat diet that offers many health benefits. In fact, over 20 studies show that this type of diet can help you lose weight and improve your health.
</p>
			</div>
			
			<div class ="individual">
				<h2 class='title'>
					<a href="https://www.healthline.com/nutrition/paleo-diet-meal-plan-and-menu" target="_blank">Paleo Diet</a>
				</h2>
				<p class='desc'>The paleo diet is designed to resemble what human hunter-gatherer ancestors ate thousands of years ago. Although it’s impossible to know exactly what human ancestors ate in different parts of the world, researchers believe their diets consisted of whole foods.</p>
			</div>
			
			<div class ="individual">
				<h2 class='title'>
					<a href="https://www.thekitchn.com/what-you-can-and-cant-eat-on-whole30-239838" target="_blank">Whole 30 Diet</a>
				</h2>
				<p class='desc'>When it comes to what you can and can't eat on this 30-day enterprise, the rules are pretty hard and fast, and there's a lot (including dairy, added sugar, and alcohol, whether for drinking or cooking) on the no-fly list.</p>
			</div>
			<div class ="individual">
				<h2 class='title'>
					<a href="https://www.webmd.com/diet/a-z/atkins-diet-what-it-is" target="_blank">Atkins Diet</a>
				</h2>
				<p class='desc'>Does bacon and eggs for breakfast, smoked salmon with cream cheese for lunch, and steak cooked in butter for dinner sound like a weight-loss menu too good to be true? If you love foods like these and aren’t a fan of carrot-filled diets, Atkins may be right for you.</p>
			</div>
			<div class ="individual">
				<h2 class='title'>
					<a href="https://health.usnews.com/best-diet/weight-watchers-diet" target="_blank">Weight Watchers Diet</a>
				</h2>
				<p class='desc'>Although still used to shed pounds, with a focus on living healthier, Weight Watchers is about far more than its name might indicate. Its WW Freestyle program, launched in late 2017, builds on its SmartPoints system, which assigns every food and beverage a point value, based on its nutrition. The newest program expands dietary options that are 0 points from only fruits and vegetables to more than 200 foods. </p>
			</div>
		</div>
    </div>
</div>
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