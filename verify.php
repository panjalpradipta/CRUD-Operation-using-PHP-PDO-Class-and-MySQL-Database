<?php 
session_start();
require 'conn.php';

if(isset($_POST['login']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	//$conn = new PDO ("mysql:host=localhost;dbname=test","root","");
	if($conn->errorCode()) die($conn->errorInfo());
	else
	{
		$sql = "select * from user_data where email='$email' and password = md5('$password')";
		$res = $conn->query($sql);

		if($rows = $res->fetch(PDO::FETCH_OBJ))
		{
			$_SESSION['id']		=	$rows->id;
			$_SESSION['name']	=	$rows->name;
			header("location:welcome.php");
		}
		else
		{
			header("location:login.php?error=true");
		}
	}
}






?>