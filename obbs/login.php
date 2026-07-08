<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['obbsuid']=$result->ID;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | Login</title>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-xxl position-relative p-0">
            <?php include_once('includes/header.php');?>
            <div class="container-xxl py-5 obbs-page-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Login</h1>
                </div>
            </div>
        </div>

        <!-- login -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0 shadow">
                <div class="col-md-6 d-none d-md-block">
                    <img class="img-fluid w-100 h-100" style="object-fit:cover;" src="images/login-bg.jpg" alt="">
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 w-100">
                        <h1 class="text-white mb-4">Login to User Panel</h1>
                        <form action="#" method="post" name="login">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="loginEmail" name="email" placeholder="E-mail" required="true">
                                        <label for="loginEmail">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required="true">
                                        <label for="loginPassword">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="forgot-password.php" class="text-primary">Forgot Password?</a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="login">LOGIN NOW</button>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="signup.php" class="text-primary">Register Yourself</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //login -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
