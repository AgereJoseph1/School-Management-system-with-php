<?php
session_start();

require_once('classes/user.php');
require_once('classes/function.php');
require_once('classes/message.php');
if (!$_SESSION['user_id']) {
	header("Location: login.php?error=You have to login first");
}
if ($_SESSION['type'] == 'student') {
	header("Location: dashboard.php?error=You do not have the permission to perform that action");
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
						<h4 class="page-title">Students</h4>
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
								<a href="students.php">Sudents</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php echo $Message->errorMessage($_GET['error'] ) ?>
                        <?php echo $Message->successMessage($_GET['success'] ) ?>
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Sudents</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                        <i class="fa fa-plus"></i>
                                        Add Students
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Matric No</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Year Enter</th>
                                                        <th scope="col">Year Graduating</th>
                                                        <th scope="col">Date Joined</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="load_info">

                                                </tbody>
                                            </table>
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
    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        New</span> 
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                    <div class="alert alert-danger" style="display: none;" id="errormes2">Please fill the form correctly</div>
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="addName" type="text" class="form-control" placeholder="fill name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Department</label>
                                    <input id="addDepartment" type="text" class="form-control" placeholder="fill Department">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Entery Year</label>
                                    <select name="yearEnter" id="yearEnter" class="form-control">
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
                                    <input id="addPassword" type="password" class="form-control" placeholder="fill Password">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('includes/js.html') ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#load-webmaster").addClass('is-loading');
            $.ajaxSetup({cache:false});
            $('#load_info').load('load_student.php');
            $("#load-webmaster").removeClass('is-loading');
            // setInterval(function() {
            //     $('#load_info').load('load_webmaster.php');
            // }, 1500);
        });


        $(function() {
            $("#addRowButton").click(function() {
                var name = $("#addName").val();
                var yEnter = $("#yearEnter").val();
                var yLeave = $("#yearLeave").val();
                var department = $("#addDepartment").val();
                var password =$("#addPassword").val();

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
                        function2call: 'addStudent', 
                        name: name,
                        department: department,
                        password: password,
                        yLeave: yLeave,
                        yEnter: yEnter,
                    },
                    beforeSend: function(){
                        $("#addRowButton").addClass('is-loading');
                    },
                    success: function(){
                        $("#errormes2").fadeOut( 500 );
                        $("#addRowButton").removeClass('is-loading');
                        swal("Created!", "Student has been added!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-success'
                                }
                            },
                        });
                        $('#addName').val("");
                        $('#addDepartment').val("");
                        $('#yearLeave').val("");
                        $('#yearEnter').val("");
                        $('#addPassword').val("");
                        $('#addRowModal').modal('hide');
                        $("#load-webmaster").addClass('is-loading');
                        $.ajaxSetup({cache:false});
                        $('#load_info').load('load_student.php');
                        $("#load-webmaster").removeClass('is-loading');
                            
                    },
                    error: function(){
                        swal("Sorry!", "Student info cannot be created now, try again!", {
                            buttons: {
                                confirm: {
                                    className : 'btn btn-danger'
                                }
                            },
                        });
                        $('#addRowModal').modal('hide');
                        $("#errormes2").fadeOut( 500 );
                        $('#addName').val("");
                        $('#addDepartment').val("");
                        $('#yearLeave').val("");
                        $('#yearEnter').val("");
                        $('#addPassword').val("");
                        $("#addRowButton").removeClass('is-loading');
                    }
                    });
                }
                return false;
            });

            

            
        });

    </script>
</body>
</html>