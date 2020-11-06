<?php
session_start();

require_once('classes/user.php');
require_once('classes/message.php');
if (!$_SESSION['user_id']) {
	header("Location: login.php?error=You have to login first");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to dashboard - <?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?></title>
	<?php require_once('includes/links.html') ?>
</head>
<body>
	<div class="wrapper">
		<?php require_once('components/header.php') ?>

		<?php require_once('components/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="dashboard.php">Dashboard</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<?php echo $Message->errorMessage($_GET['error'] ) ?>
                        <?php echo $Message->successMessage($_GET['success'] ) ?>
						<div class="row mt-5">
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-primary card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-users"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Students</p>
													<h4 class="card-title">1,294</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-md-3">
								<div class="card card-stats card-secondary card-round">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="flaticon-success"></i>
												</div>
											</div>
											<div class="col-7 col-stats">
												<div class="numbers">
													<p class="card-category">Web Master</p>
													<h4 class="card-title">576</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php require_once('components/footer.php') ?>
		</div>
		
	</div>
	<?php require_once('includes/js.html') ?>
</body>
</html>