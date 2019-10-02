<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
			<div class="nav-menu">
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					</ul>
				</nav>
			</div>
	
	<header>
    <div class="main">

  	<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
		  <div class="error success" >
			<h3>
			  <?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
			  ?>
			</h3>
		  </div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
		
			<div class="page-header">
				<h1>Total Profile</h1>
			</div>
			  <div class="row">
				<div class="col-md-6">
				  <table class="table">
					<thead>
					  <tr>
					  
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
				
					  </tr>
					</thead>
					<tbody>
						<?php 
							include "server.php";
							
							$sqal="SELECT * FROM users";
							$query=mysqli_query($db,$sqal);
							
							while($row=mysqli_fetch_assoc($query)){
						?>
					  <tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
					  </tr>
						<?php };?>
					  
					</tbody>
				  </table>
				</div>
			  </div>
			</div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>