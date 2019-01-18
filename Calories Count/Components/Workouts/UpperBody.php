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
<!-- calling all styles we used -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<link href='./Components/Workouts/Workouts.css' rel='stylesheet' type='text/css'>
<!-- start of upperbody page-->
<div class="container background">
<div class="header">
		<h1>Upper Body Exercises</h1>
	</div>
	<!-- container to hold all muscle groups-->
<div class="workouts-container">
<!--start of chest content -->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Chest</button>
			<img class='workout-image' src="./images/workouts/Chest.jpg" alt="Chest">
		</div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content text-center">
					<div class="modal-header text-center">
						<h4 class="modal-title">Chest Exercises</h4>
					</div>
				<div class="modal-body">
				<div id="accordion">
					<div class="card">
					  <div class="card-header">
						<h4 class="card-title">
							<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Bench Press</button>
						</h4>
					  </div>

						<div id="collapseOne" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<div>
									<img class ='workout-image' src="./images/workouts/Bench%20Press.png">
								</div>
									<p>Slowly lower the bar to your chest then press upwards till arms are fully extended.</p>
							</div>
						</div>
					</div>
				   <!-- second accordion element -->
				  <div class="card">
					  <div class="card-header">
						<h4 class="card-title">
							<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Cable Fly</button>
						</h4>
					  </div>

						<div id="collapseTwo" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<div>
									<img class ='workout-image' src="./images/workouts/CableFly.jpg">
								</div>
									<p>With arms extended, pull cables in front of your chest till your hands touch.</p>
							</div>
						</div>
					</div>
				  <!-- third accordion element -->
				  <div class="card">
					  <div class="card-header">
						<h4 class="card-title">
							<button class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Seated Chest Press</button>
						</h4>
					  </div>

						<div id="collapseThree" class="collapse" data-parent="#accordion">
							<div class="card-body">
								<div>
									<img class ='workout-image' src="./images/workouts/SeatedChestPress.jpg">
								</div>
									<p>Sit firmly against the seat with feet flat on floor and keep head and neck still as you do the movement.</p>
							</div>
						</div>
					</div>
				</div><!-- end of the accordion -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<!-- back modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Back</button>
		</div>
		<img class='workout-image' src="./images/workouts/Back.jpg" alt="Back">

	</div>

	<!-- Biceps modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Biceps</button>
		</div>
		<img class='workout-image' src="./images/workouts/Biceps.jpg" alt="Biceps">
	</div>

	<!-- Triceps modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Triceps</button>
		</div>
		<img class='workout-image' src="./images/workouts/Triceps.jpg" alt="Triceps">
	</div>

	<!-- Shoulders modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Shoulders</button>
		</div>
		<img class='workout-image' src="./images/workouts/Shoulders.jpg" alt="Shoulders">

	</div>
	<!-- Abs modal content-->
	<div class="column-sm">
		<div>
			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">Abs</button>
		</div>
		<img class='workout-image' src="./images/workouts/Abs.jpg" alt="Abs">

	</div>
</div>