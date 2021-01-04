<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!--Bootstrap Integration-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<style type="text/css">
		.container{
			width:30%;margin-top: 10vh;
		}
	</style>
	</head>
<body>
	<div class="container">
    <h3>Login</h3>
    <form action="verify.php" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Your password" required>
        </div>
        <div>
            <button class="btn btn-sm btn-block btn-primary" name="login">Login</button>
        </div>
    </form>
</div>
<?php 
    if(isset($_GET['error'])){?>
        <div style="margin-top:2vh;text-align:center;" class="alert alert-danger"><?php echo "Invalid Credentials";?></div>
        <?php
    }
    ?>
</body>
</html>