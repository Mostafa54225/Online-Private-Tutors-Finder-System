<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>
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
	
</body>
</html>



<?php

	
	session_start();

		include_once 'Connection.php';
		$nameBook = '';
		$link = '';
		//$id = 0;
		$update = false;


		/*require_once 'Connection.php';
		$conn = new Connection($dsn, $username, $password);*/
		
		
	

	function addBook($conn){
		$addBook = $_POST['addBook'];
		$link = $_POST['link'];
		$subjectID = $_POST['subjectID'];

		$image = $_FILES['imageName']['name'];
		$tname = $_FILES['imageName']['tmp_name'];
		$uploadDir = "../Images";
		move_uploaded_file($tname, $uploadDir.'/'.$image);
		$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'jfif');
		
		if(is_numeric($addBook) || empty($addBook) || empty($link)){
			$_SESSION['message'] = "Wrong Inputs (check your inputs)!";
			$_SESSION['msg_type'] = "danger";
		}
		else if(empty($image)){
			$_SESSION['message'] = "put an image for better view :)";
			$_SESSION['msg_type'] = "danger";	
		} 
		else {
			$insertSql = "INSERT INTO books (name, subject_id, path, photo_path) VALUES('$addBook', '$subjectID', '$link', '$image')";
			$conn->exec($insertSql);
			$_SESSION['message'] = "Book has been added!";
			$_SESSION['msg_type'] = "success";
		}
		header("location: libraries.php");
	}

	function deleteBook($conn){
		$id = $_GET['delete'];
		$conn->query("DELETE FROM books WHERE id=$id");
		$_SESSION['message'] = "Book has been deleted!";
		$_SESSION['msg_type'] = "danger";
		header("location: libraries.php");
	}

	function searchForBook($conn){
		$search = $_POST['bookName'];
		
		if(empty($search)){
			echo '<script type="text/javascript"> alert("You Must type something, Go Back"); </script>';
		}
		else{
			$search = preg_replace("#[^0-9a-z]#i", "", $search);
			$output = "";
			
			$result = $conn->query("SELECT * FROM books WHERE name LIKE '%$search%'");

			?>
			<h3 class="d-flex display-5 justify-content-center">Searching</h3>
			<div class="row">
			<?php 
			while ($row = $result->fetch()) : ?>
				
				<div class="col-md-4 col-lg-3 col-sm-6 my-4">
					<div class="card" style="width: 18rem;">
					  <img style="height: 360px;" class="card-img-top img-thumbnail" src="<?php echo "../Images/".$row['photo_path'] ?>" alt="Book Image">
					  <div class="card-body">
					    <h5 class="card-title"> <?php echo $row['name'] ?> </h5>
					    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet accusantium maiores odio consectetur tempora..</p>
					    <div class="d-flex justify-content-around"> 
					    	<a href="<?php echo $row['path'] ?>" target="_blank" class="btn btn-primary"> Link </a>
					    	<a href="addBook.php?delete=<?php echo $row['id']; ?> " class="btn btn-danger"> Delete </a>	
					    </div>
					    
					  </div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php
		}
	}

	function editBook($conn, $id){
		$result = $conn->query("SELECT * FROM books WHERE id=$id");	
		return $result;
	}

	function updateBook($conn){
		$id = $_POST['id'];
		$name = $_POST['addBook'];
		$link = $_POST['link'];
		$subjectId = $_POST['subjectID'];
		
		$conn->query("UPDATE books SET name='$name', path='$link', subject_id='$subjectId' WHERE id=$id");

		$_SESSION['message'] = "Record has been updated";
		$_SESSION['msg_type'] = "warning";
		header("location: libraries.php");	
		
	}

	if(isset($_POST['add'])){
		addBook($conn);
	}

	if(isset($_GET['delete'])){
		deleteBook($conn);
	}

	if(isset($_POST['search'])){
		searchForBook($conn);
	}

	if(isset($_GET['edit'])){
		$id = $_GET['edit'];
		$update = true;
		$result = editBook($conn, $id);
		$row = $result->fetch();
		$nameBook = $row['name'];
		$link = $row['path'];
		$sID = $row['subject_id'];
		
	}	

	if(isset($_POST['update'])){
		updateBook($conn);
	}
