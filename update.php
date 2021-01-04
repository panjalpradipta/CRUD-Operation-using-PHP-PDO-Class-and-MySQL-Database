<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<!--Bootstrap Integration-->
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="registration.css">
	<!--Google Font-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300&display=swap" rel="stylesheet">

	<!--JavaScript Validation-->
        <script type="text/javascript">
        	function emailValid(){
                var em = document.getElementById('email').value; //Fetching value from EMAIL input field.
                var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(regex.test(em)){
                    document.getElementById('errorEmail').innerHTML='';
                    document.getElementById('update').disabled= false;
                }
                else{
                    document.getElementById('errorEmail').innerHTML='Invalid Email Address';
                    document.getElementById('update').disabled= true;
                }
            }

            function phoneCheck()
		    {
		        var phone = document.getElementById('phone').value;
		        if (phone.substr(0,1)=='9' || phone.substr(0,1)=='8' || phone.substr(0,1)=='7' || phone.substr(0,1)=='6')
		            {
		                if(phone.length == 10)
		                    {
		                        document.getElementById('errorContact').innerHTML = '';
		                        document.getElementById('update').disabled=false;
		                    }
		                else
		                    {
		                        document.getElementById('errorContact').innerHTML = 'Phone Number must contain 10 digits';
		                        document.getElementById('update').disabled=true;
		                    }
		            }
		        else
		            {
		                document.getElementById('errorContact').innerHTML = 'Phone Number should starts with 9/8/7/6/5';
		                document.getElementById('update').disabled=true; 
		            }
		    }
        </script>
     
</head>
<body>
	<?php 
		require 'conn.php';
		if(isset($_POST['update']))
		{
			$name 	=		$_POST['name'];
			$email 	=		$_POST['email'];
			$phone 	=		$_POST['phone'];

			$id = $_GET['id'];

			try
			{
				$update = $conn->prepare("update user_data set name=:n, email=:em, phone=:phn where id=$id");
                $update->bindParam(':n',$name);
                $update->bindParam(':em',$email);
                $update->bindParam(':phn',$phone);

                $update->execute();
                $conn = NULL;

                header("location:display.php");
			}

			
			catch(PDOException $error){
        		echo $error->getMessage();
			
		}
	}
?>
	<div class="header">
		<h3>Update Yourself</h3>
	</div>
	<?php 
	$data = [];
	require 'conn.php';
	$sql = "SELECT id,name,email,phone FROM user_data";
	$res = $conn->query($sql);
	if($rows = $res->fetch(PDO::FETCH_OBJ))
	{
		$data=[
                        'id'        =>  $rows->id,
                        'name'      =>  $rows->name,
                        'email'     =>  $rows->email,
                        'phone'		=>	$rows->phone
                    ];
	?>
	<div class="container">
		<form action="" method="POST">
			<div class="form-group">
			    <label for="pwd">Name:</label>
			    <input type="text" class="form-control" value="<?php echo $data['name']; ?>" id="name" name="name">
		  	</div>

		  	<div class="form-group">
			    <label for="email">Email address:</label>
				<input type="email" class="form-control" value="<?php echo $data['email']; ?>"  id="email" name="email" required onkeyup="emailValid()">
			     <span id="errorEmail" style="color:white;"><!--Error Show--></span>
		  	</div>
		  
		  	<div class="form-group">
			    <label for="pwd">Phone</label>
			    <input type="number" class="form-control" value="<?php echo $data['phone']; ?>" id="phone" name="phone" required onkeyup="phoneCheck()">
			    <span id="errorContact" style="color:white;"></span>
		  	</div>
		 	<button type="submit" class="btn btn-primary btn-block" name="update" id="update">Update</button>
		 	<input type="hidden" name="hid" value="">
		</form>
		<?php } 
		else
		{
			echo "no such records";
		}?>
		<!--If there are no error-->
		<?php 
		if(isset($_GET['noError']))
		{?>
			<div class="alert alert-success">
				<?php echo "Update Successfull !"; ?>
			</div>
		<?php
		}
		?>
		<!--End-->
	</div>
</body>
</html>