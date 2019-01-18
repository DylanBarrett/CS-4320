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
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css'>
<!-- start of lower body page -->
<div class='container background'>
	<div class="header">
		<h1>Lower Body Workouts</h1>
	</div>

	<div class="workouts-container">
	<!--container to hold all workouts for the lower body -->
		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Quads</button>
			<img class='workout-image' src="./images/workouts/Quads.jpg" alt="Chest">
			<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content text-center">
			<div class="modal-header text-center">
				<h4 class="modal-title">Quad Exercises</h4>
			</div>
			<div class="modal-body">
			<div id="accordion">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Squats</button>
					</h4>
				</div>

				<div id="collapseOne" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div>
							<img class='workout-image' src="./images/workouts/squat-exercise.jpg">
						</div>
						<p>Make sure your legs are parallel to the ground at the bottom of your squat.</p>
					</div>
				</div>
			</div>
			<!-- second accordion element -->
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Leg
							Press</button>
					</h4>
				</div>

				<div id="collapseTwo" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div>
							<img class='workout-image' src="./images/workouts/leg%20press.jpg">
						</div>
						<p>Make sure your legs are parallel to the ground at the bottom of your squat.</p>
					</div>
				</div>
			</div>
				 <!-- third accordion element -->
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">
						<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Lunges</button>
					</h4>
				</div>

				<div id="collapseThree" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div>
							<img class='workout-image' src="./images/workouts/lunges.jpg">
						</div>
						<p>Make sure you forward foot leg makes a 90 degree, and your back knee touches the ground.</p>
					</div>
				</div>
			</div>
		</div><!-- end of the accordion -->
				<!-- modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
		</div><!-- end of modal-body-->
	</div><!-- end of modal content-->
</div>
			
		</div>
		</div><!-- end of chest column -->
	<!-- start of hamstrings column -->
		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Hamstrings</button>
			<img class='workout-image' src="./images/workouts/Hamstrings.jpg" alt="Chest">
		</div>
<!-- start of calves column -->
		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Calves</button>
			<img class='workout-image' src="./images/workouts/Calves.jpg" alt="Chest">
		</div>
<!-- start of glutes column -->
		<div class="column-sm">
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Glutes</button>
			<img class='workout-image' src="./images/workouts/Glutes.jpg" alt="Chest">
		</div>
	</div><!-- end of workouts container -->
</div><!-- end of background container -->