<?php
require_once('classes/message.php');
require_once('classes/user.php');
    if (isset($_POST['login'])) {
        $user->login($_POST['type'], $_POST['s_id'], $_POST['password']  );
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
    <?php require_once('includes/links.html') ?>
    <link rel="stylesheet" href="assets/css/atlong.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn" style="display: block;">
            <h3 class="text-center">Sign In To Admin</h3>
            <form action="login.php" method="post">
                <div class="login-form">
                <?php echo $Message->errorMessage($_GET['error'] ) ?>
                    <div class="form-group form-floating-label">
                        <input id="username" name="s_id" type="text" class="form-control input-border-bottom" required="">
                        <label for="username" class="placeholder">Staff ID</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom" required="">
                        <label for="password" class="placeholder">Password</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <div class="form-group form-floating-label  mt-3">
                        <select name="type" class="form-control input-border-bottom">
                            <option value="director">Director</option>    
                            <option value="student">Student</option>    
                            <option value="webmaster">Webmaster</option>    
                        <select>
                        <label for="password" class="placeholder">Account type</label>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Remember Me</label>
                        </div>
                        
                        <a href="#" class="link float-right">Forget Password ?</a>
                    </div>
                    <div class="form-action mb-3">
                        <button type="submit" name="login" class="btn btn-primary btn-rounded btn-login">Sign In</button>
                    </div>
                </div>
            </form>
		</div>
	</div>
	<?php require_once('includes/js.html') ?>

</body>
</html>