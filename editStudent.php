<?php
session_start();

require_once('classes/user.php');
require_once('classes/function.php');
require_once('classes/message.php');
require_once('classes/connect.php');
if (!$_SESSION['user_id']) {
	header("Location: login.php?error=You have to login first");
}
if ($_SESSION['type'] == 'student') {
	header("Location: dashboard.php?error=You do not have the permission to perform that action");
}
$id = $_GET['id'];

$query ="SELECT * FROM students where id='$id' ";
$result = $sonawap->query($query) or die($sonawap->error.__LINE__);
$getUser2 = $result->num_rows;
if ($getUser2 < 1) {
    header("Location: students.php?error=Student not found");
}else{
    if($row=mysqli_fetch_array($result)){
        $id=$row["id"];
        $name=$row["name"];
        $department=$row["department"];
        $yearEnter=$row["year_enter"];
        $yearLeave=$row["year_leave"];
        $password=$row["password"];
    }		
    else{
        header("Location: students.php?error=Student not found");
    }  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Webmasters - <?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?></title>
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
						<h4 class="page-title">Edit Student</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard.php">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="students.php">Students</a>
                            </li>
                            <li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#"><?php echo $name ?></a>
                            </li>
                            <li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Edit</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php echo $Message->errorMessage($_GET['error'] ) ?>
                        <?php echo $Message->successMessage($_GET['success'] ) ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Edit <?php echo $name ?>'s Account</h4>
                                    <a class="btn btn-warning text-white btn-round ml-auto" href="students.php"> 
                                        <i class="fas fa-eye"></i>
                                        Students
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="small">You editing student profile, make sure you fill them all</p>
                                <div class="alert alert-danger" style="display: none;" id="errormes2">Please fill the form correctly</div>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    <input id="addName" value="<?php echo $name ?>" type="text" class="form-control" placeholder="fill name">
                                                </div>
                                            </div>
                                            <input id="addId" value="<?php echo $id ?>" type="hidden">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Department</label>
                                                    <input id="addDepartment" value="<?php echo $department ?>" type="text" class="form-control" placeholder="fill Department">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Entery Year</label>
                                                    <select name="yearEnter" id="yearEnter" class="form-control">
                                                        <option value="<?php echo $yearEnter ?>"><?php echo $yearEnter ?></option>
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
                                                        <option value="<?php echo $yearLeave ?>"><?php echo $yearLeave ?></option>
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
                                                    <input id="addPassword" type="password" value="<?php echo $password ?>" class="form-control" placeholder="fill Password">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="editRowButton" class="btn btn-primary">Update account</button>
                                </div>

                        </div>
                    </div>
				</div>
			</div>
			<?php require_once('components/footer.php') ?>
		</div>
		
    </div>

    <?php require_once('includes/js.html') ?>

    <script type="text/javascript">
        $(function() {
            $("#editRowButton").click(function() {
                var name = $("#addName").val();
                var department = $("#addDepartment").val();
                var password =$("#addPassword").val();
                var yEnter = $("#yearEnter").val();
                var yLeave = $("#yearLeave").val();
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
                        function2call: 'editStudent', 
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
                        $("#editRowButton").html('Update account');
                        swal("Created!", "Student info successfully updated!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            },
                        });
                        $("#editRowButton").removeClass('is-loading');
                        window.location = "students.php";                      
                    },
                    error: function(){
                        swal("Sorry!", "Student cannot be update now, try again!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        });
                        $("#editRowButton").removeClass('is-loading');
                        $("#errormes2").fadeOut( 500 );
                    }
                    });
                }
                return false;
            });

            

            
        });

    </script>
</body>
</html>