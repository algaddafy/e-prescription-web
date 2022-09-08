<?php
session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['user_id'])) {   ?>
	<!DOCTYPE html>
	<html>

	<head>
		<title>E-Doctor</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
		<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
			<form class="border shadow p-3 rounded" action="includes/check-login.php" method="post" style="width: 450px;">

				<h1 class="text-center p-3">LOGIN</h1>
				<?php if (isset($_GET['error'])) { ?>
					<div class="alert alert-danger" role="alert">
						<?= $_GET['error'] ?>
					</div>
				<?php } ?>
				<div class="mb-3">
					<label for="username" class="form-label">User Name</label>
					<input type="text" class="form-control" name="username" id="username">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control" id="password">
				</div>
				<div class="mb-1">
					<label class="form-label">Select User Type:</label>
				</div>
				<select class="form-select mb-3" name="role" aria-label="Default select example">
					<option selected value="patient">Patient</option>
					<option value="doctor">Doctor</option>
					<option value="admin">Admin</option>
				</select>
				<div class="text-center">
					<button type="submit" name="login" class="btn btn-primary">LOGIN</button>
				</div>
				<div class="p-3 text-center">
					<a href="index.php" class="btn btn-info mr-4">Back to home</a>
				</div>
			</form>


		</div>
	</body>

	</html>
<?php } else {
	header("Location: dashboard.php");
} ?>