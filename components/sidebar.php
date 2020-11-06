<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                <span class="avatar-title rounded-circle border border-white text-white"><?php echo substr($user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'], 0,2) ?></span>

                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['name'] ?>
                            <span class="user-level"><?php echo $user->getInfo($_SESSION['type'],$_SESSION['user_id'])['type'] ?></span>
                            <?php if(($_SESSION['type'] == 'student')): ?>
                                <span class="caret"></span>
                            <?php endif ?>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <?php if(($_SESSION['type'] == 'student')): ?>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="profile.php">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard.php" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Links</h4>
                </li>
                <?php if($_SESSION['type'] == 'director' || !$_SESSION['type'] == 'student') :?>
                    <li class="nav-item">
                        <a href="webmaster.php">
                            <i class="fas fa-layer-group"></i>
                            <p>Webmasters</p>
                        </a>
                    </li>
                <?php endif ?>
                <?php if(($_SESSION['type'] == 'webmaster' || $_SESSION['type'] == 'director' ) || !$_SESSION['type'] == 'student') :?>
                    <li class="nav-item">
                        <a href="students.php">
                            <i class="fas fa-layer-group"></i>
                            <p>Students</p>
                        </a>
                    </li>
                <?php endif ?>
                
                <?php if(($_SESSION['type'] == 'student')): ?>
                <li class="nav-item">
                    <a href="profile.php">
                        <i class="fas fa-user"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <?php endif ?>
                
                <li class="nav-item">
                    <a href="logout.php">
                        <i class="fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->