<?php 
 
 $id = $_GET['id'];
 try
 {
 	require 'conn.php';
 	if($conn->errorCode()) die ($conn->errorInfo());
 	else
 	{
 		$del = $conn->prepare("delete from user_data where id=:id");
 		$del->bindParam(':id',$id);
 		$del->execute();

 		$conn = NULL;
 		header("location:display.php");
 	}
 }
 catch(PDOException $error){
    echo $error->getMessage();
}
?>