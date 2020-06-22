<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>

	<script type="text/javascript" src="../JS/animation.js"></script>


	<meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />

	<!-- Style CSS -->
	<link rel="stylesheet" href="../CSS/styleLoginAdmin.css" type="text/css">
	<link rel="stylesheet" href="theme.css">
</head>

<body>

<?php 
	require_once 'loginAdminCheck.php';
	if(isset($_SESSION['messages'])): ?>
	
		<div class="alert alert-<?=$_SESSION['msg_types']?>" style="margin:0;">
			<?php
			 	echo $_SESSION['messages'];
			 	unset($_SESSION['messages']);
			?>
		</div>
	<?php endif; ?>



	<section id="title" class="py-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col text-center mx-auto">
					<h1 class="diaply-5 text-uppercase adminHeader" style="display: none; color: #E3FFFB"><strong>admin</strong></h1>
					<div class="title-underline"></div>
				</div>
			</div>
		</div>



	<!-- Form -->

	<section id="formSection">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="hideTitle" style="display: none">
						<h2 id="header_title" class="text-left text-white display-4">Tutora.com</h2>
						<p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum esse, eius assumenda dignissimos commodi doloremque ducimus molestias vero a dolorum.</p>	
					</div>
					
				</div>

				<div id="form_box" class="col-md-8" style="display: none">
					<div class="col">
						<h4 id="login_header" class="display-4 text-center text-white">Login</h4>
					</div>

					<form action="loginAdminCheck.php" method="POST">
						<div class="form-group">
							<!-- Username Field -->
							<!-- <label for="username" class="label col-md-2 control-label">Username</label> -->
							<div class="col-md-10">
								<input type="username" name="username" class="form-control" style="color: white">
								<span data-placeholder="Username"></span>
							</div>
						</div>

						<div class="form-group">
							<!-- Password Field -->
							<!-- <label for="username" class="label col-md-2 control-label">Password</label> -->
							<div class="col-md-10">
								<input type="password" name="password" class="form-control" style="color: white">
								<span data-placeholder="Password"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col my-4">
									<button type="submit" name="login" style="width:100%;" class="btn btn-outline-light d-flex justify-content-center loginButton">Login</button>

									<!-- Button for Registration for new amdins -->
									<!-- The code for modal is below -->
									<a href="#" 
									type="button" 
									class="btn btn-outline-light d-flex justify-content-center my-3"
									data-toggle="modal"
									data-target="#exampleModal">
									Join our group</a>

								</div>
							</div>
						</div>
					</form>
					

					
					
					
					
				</div>
			</div>
		</div>
	</section>






<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document">

		<!-- Modal Content -->
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<div class="modal-title"><h4 class="display-5 text-dark">Sign Up</h4></div> <hr>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- End Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form action="POST">
					<div class="row p-2">
						<div class="col-md-6">
							<div class="form-group">
								<input type="username" name="username" class="form-control" placeholder="">
								<span data-placeholder="Username"> </span>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="">
								<span data-placeholder="Password"></span>
							</div>
						</div>
					</div>

					<div class="row p-2">
						<div class="col">
							<div class="form-group">
								<input type="email" name="email" placeholder="" class="form-control">
								<span data-placeholder="E-mail"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<div class="btn btn-outline-light w-100 " id="cvButton" > 
									<input id="cvInput" type="file" name="cvFile">
								</div>
							</div>			
						</div>
					</div>
				</form>
			</div>
			<!-- End Modal Body -->
			
			<!-- //////////// -->

			<!-- Modal Footer -->

			
				<div class="modal-footer d-flex justify-content-center">
					<div class="row">
						<div class="col">
							<button name="close" type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
						</div>
						<div class="col">
							<button name="createAccount" type="button" class="btn btn-outline-light">Create Account</button>
						</div>
					</div>
				</div>			
				
			<!-- End Modal Footer -->
			

		</div>
	</div>
</div>
<!-- Modal -->





<!-- Optional JavaScript -->
    <!-- then Popper.js, then Bootstrap JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
</body>
