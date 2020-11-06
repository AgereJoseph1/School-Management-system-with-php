<?php
session_start();

require_once('classes/user.php');
require_once('classes/message.php');
if (!$_SESSION['user_id']) {
	header("Location: login.php?error=You have to login first");
}
if ($_SESSION['type'] !== 'student') {
	header("Location: dashboard.php?error=You do not have the permission to perform that action");
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
						<h4 class="page-title">Profile</h4>
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
								<a href="dashboard.php">Profile</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
						<?php echo $Message->errorMessage($_GET['error'] ) ?>
                        <?php echo $Message->successMessage($_GET['success'] ) ?>
						<div class="row">
                            <div class="col-md-8">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Profile</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Name</label>
                                                        <input id="addName" value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?>" type="text" class="form-control" placeholder="fill name">
                                                    </div>
                                                </div>
                                                <input id="addId" value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['id'] ?>" type="hidden">
                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Department</label>
                                                        <input id="addDepartment" value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['department'] ?>" type="text" class="form-control" placeholder="fill Department">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Entery Year</label>
                                                        <select name="yearEnter" id="yearEnter" class="form-control">
                                                            <option value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_enter'] ?>"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_enter'] ?></option>
                                                            <?php 
                                                                for ($i=1993; $i < 2030; $i++) { 
                                                                    echo "<option value=".$i.">".$i."</option>";
                                                                }
                                                            ?>    
                                                        <select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Graduating Year</label>
                                                        <select name="yearLeave" id="yearLeave" class="form-control">
                                                            <option value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_leave'] ?>"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_leave'] ?></option>
                                                            <?php 
                                                                for ($i=1993; $i < 2030; $i++) { 
                                                                    echo "<option value=".$i.">".$i."</option>";
                                                                }
                                                            ?>    
                                                        <select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Password</label>
                                                        <input id="addPassword" type="password" value="<?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['password'] ?>" class="form-control" placeholder="fill Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="text-right mt-3 mb-3">
                                            <button type="button" id="editRowButton" class="btn btn-primary">Update account</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-profile">
                                    <div class="card-header" style="background-image: url('assets/img/blogpost.jpg')">
                                        <div class="profile-picture">
                                            <div class="avatar avatar-xl">
                                                <span class="avatar-title rounded-circle border border-white text-white"><?php echo substr($user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'], 0,2) ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="user-profile text-center">
                                            <div class="name"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?></div>
                                            <div class="job"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['department'] ?></div>
                                            <div class="desc"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['type'] ?></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row user-stats text-center">
                                            <?php if($_SESSION['type'] == 'director') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['role'] ?></div>
                                                    <div class="title">Role</div>
                                                </div>
                                            <?php } ?>
                                            <?php if($_SESSION['type'] == 'webmaster') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['role'] ?></div>
                                                    <div class="title">Role</div>
                                                </div>
                                            <?php } ?>

                                            <?php if($_SESSION['type'] == 'webmaster' || $_SESSION['type'] == 'director') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['staff_id'] ?></div>
                                                    <div class="title">Staff ID</div>
                                                </div>
                                            <?php } ?>
                                            
                                            <?php if($_SESSION['type'] == 'student') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_enter'] ?></div>
                                                    <div class="title">Year Entery</div>
                                                </div>
                                            <?php } ?>
                                            <?php if($_SESSION['type'] == 'student') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['year_leave'] ?></div>
                                                    <div class="title">Graduating</div>
                                                </div>
                                            <?php } ?>
                                            <?php if($_SESSION['type'] == 'student') {?>
                                                <div class="col">
                                                    <div class="number"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['matric'] ?></div>
                                                    <div class="title">Matric</div>
                                                </div>
                                            <?php } ?>
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
    <script>
        $(function() {
            $("#editRowButton").click(function() {
                var name = $("#addName").val();
                var yEnter = $("#yearEnter").val();
                var yLeave = $("#yearLeave").val();
                var department = $("#addDepartment").val();
                var password =$("#addPassword").val();
                var id =$("#addId").val();

                if(name == "" || department == "" || password == "" || yEnter == "" || yLeave == "" )
                {
                    $("#errormes2").fadeIn( 500 );
                    return false;
                    
                }
                else{
                    $.ajax({
                    type: "POST",
                    url: "classes/function.php",
                    dataType: 'json',
                    data: {
                        function2call: 'editProfile', 
                        name: name,
                        department: department,
                        password: password,
                        yLeave: yLeave,
                        yEnter: yEnter,
                        id: id,
                    },
                    beforeSend: function(){
                        $("#editRowButton").addClass('is-loading');
                    },
                    success: function(){
                        $("#errormes2").fadeOut( 500 );
                        $("#editRowButton").removeClass('is-loading');
                        swal("Created!", "Student has been added!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            },
                        });
                        $("#load-webmaster").removeClass('is-loading');
                        window.location = 'profile.php';    
                    },
                    error: function(){
                        swal("Sorry!", "Student info cannot be created now, try again!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        });
                        $("#errormes2").fadeOut( 500 );
                        $("#editRowButton").removeClass('is-loading');
                    }
                    });
                }
                return false;
            });

            

            
        });
    </script>
</body>
</html>