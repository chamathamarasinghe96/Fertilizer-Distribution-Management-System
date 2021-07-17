<?php require_once('includes/connection.php'); ?>

<?php
    if (isset($_POST['btnLogin'])) {
        
        $userID = $_POST['txtUName'];
        $password = $_POST['txtPsw'];

        $hashed_password = sha1($password);

        $query = "SELECT Password FROM AGRICULTURAL_OFFICER WHERE OfficerID = '{$userID}' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) && mysqli_fetch_assoc($result)['Password'] == $password) {
            $msg = "Login Successfully";

            session_start();
            $_SESSION['userID'] = $userID;

            header( "Location:http://localhost/Fertilizer_Subsidy/Farmers.php" ); die;
        } else {
            $msg = "Invalid Username or Password";
        }
    }   

?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link href="https://fonts.googleapis.com/css?family=Baloo+Da+2|Cabin|Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-success fixed-top">
		<a href="#" class="navbar-brand"><img src="img/IMG_2085.png" alt="" style="width: 200px;"></a>
		<button class="navbar-toggler" data-toggle="collapse" data-target="#navbar_id"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse justify-content-center" id="navbar_id">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="index.html" class="nav-link">HOME</a></li>
				<li class="nav-item"><a href="Login.php" class="nav-link active">LOGIN</a></li>
				<li class="nav-item"><a href="about.html" class="nav-link">PHOTO GALLERY</a></li>
		</ul>
		</collapse>	
	</nav><!-- class="navbar" -->

	<div class="wrapper">
	<div class="head clearfix">
		<h1>Log In</h1>
	</div><!-- head -->
	
	<div class="contain clearfix">
		<div class="column">
			<img class="sidepic" src="wave/ka.svg">
		</div><!-- column -->

		<dic class="column">
			<img class="contactpic" src="wave/profilepic.svg">
			<form action="Login.php" class="signup"  method="post">
				<br>
				<label for="lblMsg"><b><?php echo (isset($msg)) ? $msg : ''; ?></b></label>
				<br>
				<input type="text" name="txtUName" placeholder="Username" required>
				<br>
				<input type="password" name="txtPsw" placeholder="Password" required>
				<br>
				<br>
				<button type="submit" name="btnLogin" value="HTML" class="btn btn-success btn-lg">Log In</button>
			</form>
		</dic><!-- column -->
	</div><!-- contain -->

		<div class="copyrights">
			<div class="left">
				Department of Agriculture | Copyrights &copy; All Rights Reserved | Tel : 011 587 4256
			</div><!-- left -->
		</div><!-- copyrights -->
	</div><!-- wrapper -->
</body>
</html>