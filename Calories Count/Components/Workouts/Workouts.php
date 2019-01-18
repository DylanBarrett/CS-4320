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
<script>
//button that takes you to upper body page
	$("#upper-body").click(function () {
		history.pushState(null, null, "upper-body");
		evaluatePath("upper-body");
	});
	//button that takes you to lower body page
	$("#lower-body").click(function () {
		history.pushState(null, null, "lower-body");
		evaluatePath("lower-body");
	});
</script>

<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css
'>
<!-- start of workouts page that displays lower and upper body-->
<div class='container background'>
	<div class="header text-center">
		<h1>Choose the type of workout you want</h1>
	</div>

	<div class="workouts-container">

		<div class="column">
			<h1 class="header">Upper Body</h1>

			<img id='upper-body' style='cursor:pointer;' src="./images/workouts/images%20(1).jpg" alt="UpperBody">

		</div>

		<div class="column">
			<h1 class="header">Lower Body</h1>

			<img id='lower-body' style='cursor:pointer;' src="./images/workouts/download.jpg" alt="LowerBody">

		</div>
	</div>
</div>