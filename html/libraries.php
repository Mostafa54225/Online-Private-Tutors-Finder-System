<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Libraries</title>
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="../JS/libraryJquery.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
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
	<link rel="stylesheet" href="theme.css">
	<link rel="stylesheet" href="../CSS/styleLibraries.css">
</head>
<body>

	<?php 
		require_once 'addBook.php';
		$counter = 0;
		if(isset($_SESSION['message'])): ?>
	
		<div class="alert alert-<?=$_SESSION['msg_type']?>" style="margin:0;">
			<?php
			 	echo $_SESSION['message'];
			 	unset($_SESSION['message']);
			?>
		</div>	

	<?php endif ?>

	<section id="libraryPage">
		<div class="container-fluid">
			<div class="row">

				<div class="col-md-3 bg-primary settingStyle">
					<div class="text-center mt-3"><h2 class="display-5">Manage E-books</h2></div>
					<div class="title-underline"></div>

					<section id="manageBooks">
						<form action="addBook.php" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="container">
								<div class="form-row">
									<div class="col">
										<input type="text" name="bookName" id="searchText" class="form-control" placeholder="Search for book" style="margin-top:15px">
									</div>
									<div class="col-auto">
										<button name="search" class="btn btn-info" style="margin-top:15px">Search</button>
									</div>
								</div>	

								<div class="form-row">
									<input type="text" name="addBook" value="<?php echo $nameBook; ?>" class="form-control" placeholder="Name of Book"style="margin-top: 20px">
									
								</div>

								<div class="form-row">
									<input type="text" name="link" value="<?php echo $link; ?>" class="form-control" placeholder="Link" style="margin-top: 25px">
								</div>

								<div class="form-row">
									<input type="file" name="imageName" class="my-3" style="margin-top:10px;">	
								</div>
								<div class="form-row">
									<select class="form-control" id="select_1" name="subjectID">
										<option>
											<?php 
												if($update == true)
													echo $sID;
												else
													echo "Subject ID";
											?>
										</option>
									    
										<?php
											try {
												$result = $conn->query("SELECT * FROM subjects");
											} catch (PDOException $e) {
												$e->getMessage();
											}
									
									  	while($row = $result->fetch()): ?>
										    <option><?php echo $row['id'] . ' - ' . $row['subject']; ?></option>
										<?php endwhile; ?>
									</select>
								</div>
								
								<div class="form-row justify-content-center">
									<?php 
										if($update == true):
									?>
										<button type="submit" name="update" class="btn btn-secondary" style="margin-top: 15px; width: 78px">Update</button>
									<?php else:?>
										<button type="submit" name="add" class="btn btn-success" style="margin-top: 15px; width: 73px">Add</button>
									<?php endif; ?>
								</div>
							</div>
						</form>
					</section>
				</div>
				<div class="col-md-9">
					<div class="container">
						<h2 class="d-flex justify-content-center">Books</h2>
						<?php 
							try {
								$result = $conn->query("SELECT * FROM books");
							} catch (PDOException $e) {
								$e->getMessage();
							}
						?>                   
						<div class="row">
							<?php 
							while($row = $result->fetch()): ?>
							
							<div class="col-md-6 col-lg-4 my-4 showBooks">
								<div class="card" style="width: 18rem;">
								  <img style="height: 360px;" class="card-img-top" src="<?php echo "../Images/".$row['photo_path'] ?>" alt="Book Image">
								  <div class="card-body" style="background-color:#D0F9FF;">
								    <h5 class="card-title"> <?php echo $row['name'] ?> </h5>
								    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet accusantium maiores odio consectetur tempora..</p>
								    <div class="d-flex justify-content-around">
								    	<a href="<?php echo $row['path'] ?>" target="_blank" class="btn btn-primary"> Link </a>
								    	<a href="libraries.php?edit=<?php echo $row['id']; ?> " class="btn btn-secondary"> Edit </a>
								    	<a onClick="checkDeletion(<?php echo $row['id']; ?>)"  class="btn btn-danger "> Delete </a>	
								    </div>
								    
								  </div>
								</div>
							</div>
							<?php $counter++; ?>
							<?php endwhile; ?>
						</div>
					</div>
					<p class="d-flex justify-content-center ssA" ><?php echo $counter; ?></p>
				</div>
			</div>	
		</div>
		</div>
	</section>

	<script>
		function checkDeletion(bookId){
			if(confirm("Are You Sure!")) window.location.href='addBook.php?delete=' + bookId+'';
		}
	</script>
 
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
</html>