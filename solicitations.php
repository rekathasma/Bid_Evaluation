<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Solicitations</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
	<script src="js/custom.js"></script>
</head>
<body>
	<?php //require_once('submit.php'); ?>
	<div id="wrapper" class="container">

		<div class="container-fluid" id="header">
			<img src="download.png" height="45">
		</div>
		<div class="container-fluid" id="heading">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#"><h4>Bid Opportunities Admin</h4></a>
						</li>

						<li class="nav-item active">
							<a class="nav-link" href="solicitations.php"><i class="fa fa-money" aria-hidden="true"></i>	Solicitations</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> Emails</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i> Bidders</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> Users</a>
						</li>

					</ul>
					<ul style="float: right;">
						<li class="nav-item dropdown" >
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php //echo $_SESSION["username"]; ?> <i class="fa fa-caret-down" aria-hidden="true"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="home.php">Logout</a>
								
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="container-fluid" id="solicitation">
			<div class="container-fluid" id="solicitation-header">
				<h2><i class="fa fa-money" aria-hidden="true"></i>	Solicitations</h2>
				<button type="button" class="btn btn-success" style="float: right;border-radius: 0;" onclick="openPage('createsolicitation.php')">+ Add Solicitation</button>

			</div>
			<div class="container-fluid" id="solicitation-content">

				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#current">Current</a></li>
					<li><a data-toggle="tab" href="#awarded">Awarded</a></li>
					<li><a data-toggle="tab" href="#canceled">Canceled</a></li>
					<li><a data-toggle="tab" href="#archive">Archive</a></li>
					<li><a data-toggle="tab" href="#byme">Created by Me</a></li>
				</ul>

				<div class="tab-content">
					<div id="current" class="tab-pane fade in active">
						<?php //currentSolicitation();?>

					</div>
					<div id="awarded" class="tab-pane fade">
						<h3>Menu 1</h3>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea hcommodo consequat.</p>
					</div>
					<div id="canceled" class="tab-pane fade">
						<h3>Menu 2</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					</div>
					<div id="archive" class="tab-pane fade">
						<h3>Menu 3</h3>
						<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					</div>
					<div id="byme" class="tab-pane fade">

						<?php //byme();?>		
						
					</div>
				</div>
			</div>




		</div>
	</div>



</body>
</html>
