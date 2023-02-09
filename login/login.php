<!doctype html>
<html lang="en">

<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-4">Log In</h3>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
							</div>
							<?php
							session_start();
							include '../sql/connect_db.php';
							$error = false;
							if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
								$result = mysqli_query($con, "Select `id`,`username` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = ('" . $_POST['password'] . "'))");
								if (!$result) {
									$error = mysqli_error($con);
								} else {
									$user = mysqli_fetch_assoc($result);
									$_SESSION['current_user'] = $user;
								}
								mysqli_close($con);
								if ($error !== false || $result->num_rows == 0) {
							?>
									<div id="login-notify" class="box-content">
										<h1>Thông báo</h1>
										<h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
										<a href="./login.php">Quay lại</a>
									</div>
								<?php
									exit;
								}
								?>
							<?php } ?>
							<?php if (empty($_SESSION['current_user'])) { ?>
								<div id="user_login" class="box-content">
									<form action="./login.php" method="post" class="signin-form">
										<div class="form-group mt-3">
											<input type="text" name="username" class="form-control" value="" required>
											<label class="form-control-placeholder" for="username">Username</label>
										</div>
										<div class="form-group">
											<input id="password-field" name="password" type="password" class="form-control" value="" required>
											<label class="form-control-placeholder" for="password">Password</label>
											<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
										</div>
										<div class="form-group">
											<button type="submit" class="form-control btn btn-primary rounded submit px-3">Log
												In</button>
										</div>
										<div class="form-group d-md-flex">
											<div class="w-50 text-left">
												<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
													<input type="checkbox" checked>
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="w-50 text-md-right">
												<a href="#">Forgot Password</a>
											</div>
										</div>
									</form>
								</div>
							<?php
							} else {
								$currentUser = $_SESSION['current_user'];
							?>
								<div id="login-notify" class="box-content">
									Xin chào <?= $currentUser['username'] ?><br />
									<a href="../administrator/admin/product_listing.php">Quản lý sản phẩm</a><br />
									<a href="../administrator/admin/logout.php">Đăng xuất</a>
								</div>
							<?php } ?>

							<p class="text-center">Not a member? <a href="../register/register.html">Sign Up</a></p>
							<p class="text-center"><a href="../index.html">Return to homepage</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>