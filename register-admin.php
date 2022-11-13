<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//database connection
	$conn = new mysqli('localhost','root','','super_cafe_project');
	if($conn->connect_error){
		die('Connection Failed : '.$conn->connect_error);
	}else{
		$stmt = $conn->prepare("insert into register(username, email, password)value(?, ?, ?)");
		$stmt->bind_param("sss",$username,$email,$password);
		$stmt->execute();{
		echo "Registration Successfully...";
        header('Location: login.html');
        }
		$stmt->close();
		$conn->close();
	}
?>