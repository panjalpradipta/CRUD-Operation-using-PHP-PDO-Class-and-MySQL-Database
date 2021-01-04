<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>All Records</title>
	<!--Bootstrap Integration-->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<?php 
if(isset($_SESSION['name']))
{ ?>
	<div align="right">
		<a href="logout.php" class="btn btn-info">Logout</a>
	</div>
	<div class="container">
		<h2>All records</h2>
		<table class="table table-hover table-bordered">
			
                    <tr>
	                    <th>Name</th>
	                    <th>Email</th>
	                    <th>Phone</th>
	                    <th>Update</th>
	                    <th>Delete</th>
                    </tr>
            <?php 
            	require 'conn.php';
            	if($conn->errorCode()) die ($conn->errorInfo());
            	else
            	{
            		$sql = "select id,name,email,phone from user_data";
            		$res = $conn->query($sql);

            		while($rows = $res->fetch(PDO::FETCH_OBJ))
            		{
            ?>
            		<tr>
            			<td><?php echo $rows->name;?></td>
            			<td><?php echo $rows->email;?></td>
            			<td><?php echo $rows->phone;?></td>
            			<td> <a href="delete.php?id=<?php echo $rows->id;?>" class="btn btn-sm btn-danger">Delete</a> </td>
            			<td> <a href="update.php?id=<?php echo $rows->id; ?>" class="btn btn-sm btn-warning">Update</a> </td>
            		</tr>	
            <?php		
            		}

            	}
            ?>
		</table>
		<?php 

		$conn = NULL;
		?>
	</div>
<?php
	} 
	else
	{
		header("location:login.php");
	}
?>
</body>
</html>

