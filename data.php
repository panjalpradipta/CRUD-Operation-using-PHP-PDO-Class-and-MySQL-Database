<?php 

require 'conn.php';

if(isset($_POST['register']))
{
	$stmt = $conn->prepare('insert into user_data(name,email,phone,password) values(:name,:email,:phone,:password)');
	$stmt->bindValue('name', $_POST['name']);
	$stmt->bindValue('email', $_POST['email']);
	$stmt->bindValue('phone', $_POST['phone']);
	$stmt->bindValue('password',md5($_POST['password']));

	$stmt->execute();
	header("location:index.php?noError=true");
}


















?>