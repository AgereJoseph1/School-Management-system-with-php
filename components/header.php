<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="blue">
        
        <a href="index.html" class="logo">
            <img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
        
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                <li class="nav-item toggle-nav-search hidden-caret">
                    <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                        <i class="fa fa-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i>
                    </a>
                    <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">Quick Actions</span>
                            <span class="subtitle op-8">Shortcuts</span>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                                <div class="row m-0">
                                    <?php if(($_SESSION['type'] == 'webmaster') || ($_SESSION['type'] == 'director')): ?>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <i class="flaticon-database"></i>
                                                <span class="text">Create New Student</span>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                    <?php if($_SESSION['type'] == 'director') : ?>
                                        <a class="col-6 col-md-4 p-0" href="#">
                                            <div class="quick-actions-item">
                                                <i class="flaticon-pen"></i>
                                                <span class="text">Create New webmaster</span>
                                            </div>
                                        </a>
                                    <?php endif ?>
                                    <a class="col-6 col-md-4 p-0" href="#">
                                        <div class="quick-actions-item">
                                            <i class="flaticon-interface-1"></i>
                                            <span class="text">Logout from account</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle border border-white text-white"><?php echo substr($user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'], 0,2) ?></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <span class="avatar-title rounded-circle border border-white text-white"><?php echo substr($user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'], 0,2) ?></span>

                                    </div>
                                    <div class="u-text">
                                        <h4><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?></h4>
                                        <p class="text-muted"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['department'] ?></p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <?php if(($_SESSION['type'] == 'student')): ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="profile.php">My Profile</a>
                                <?php endif ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>