        <?php $obbsCurrentPage = basename($_SERVER['PHP_SELF']); ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
            <a href="index.php" class="navbar-brand p-0">
                <h1 class="text-primary m-0"><i class="fa fa-birthday-cake me-3"></i>OBBS</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 pe-4">
                    <a href="index.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'index.php') ? 'active' : ''; ?>">Home</a>
                    <a href="about.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'about.php') ? 'active' : ''; ?>">About</a>
                    <a href="services.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'services.php') ? 'active' : ''; ?>">Services</a>
                    <?php if (strlen($_SESSION['obbsuid']!=0)) {?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">My Account</a>
                        <div class="dropdown-menu m-0">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="booking-history.php" class="dropdown-item">Booking History</a>
                            <a href="change-password.php" class="dropdown-item">Change Password</a>
                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                    <?php } ?>
                    <a href="mail.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'mail.php') ? 'active' : ''; ?>">Mail Us</a>
                    <?php if (strlen($_SESSION['obbsuid']==0)) {?>
                    <a href="login.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'login.php') ? 'active' : ''; ?>">Login</a>
                    <a href="signup.php" class="nav-item nav-link <?php echo ($obbsCurrentPage == 'signup.php') ? 'active' : ''; ?>">Register</a>
                    <a href="admin/login.php" class="nav-item nav-link">Admin</a>
                    <?php } ?>
                </div>
            </div>
        </nav>
