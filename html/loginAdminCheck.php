<?php

	session_start();
	include 'Connection.php';
		
	if(isset($_POST['login'])){
		try{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(empty($username) && empty($password)){
				$_SESSION['messages'] = "You should fill username and password";
				$_SESSION['msg_types'] = "danger";
				header("location: loginAdmin.php");
			}
			else{
				if(empty($username) || empty($password)){
					if(empty($username)){
						$_SESSION['messages'] = "you should write your username";
						$_SESSION['msg_types'] = "danger";
						header("location: loginAdmin.php");
					}else{
						$_SESSION['messages'] = "you should write your password";
						$_SESSION['msg_types'] = "danger";
						header("location: loginAdmin.php");
					}
				}else{
					$result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'"); 
					$row = $result->fetch();
					if($row['username'] == $username && $row['password'] == $password)
						header("location: homePage.html");
					else{
						$_SESSION['messages'] = "Wrong inputs, try again";
						$_SESSION['msg_types'] = "danger";
						header("location: loginAdmin.php");
					}
				}
			}
			
		} catch(PDOException $e){

		}
		
	}

	
?>






