<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['signup']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $ret="select Email from tbluser where Email=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Scuccessfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('Email-id already exist. Please try again');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | Mail</title>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.signup.confirmpassword.focus();
return false;
}
return true;
}   

</script>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Register</h1>
                </div>
            </div>
        </div>

        <!-- register -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0 shadow">
                <div class="col-md-6 d-none d-md-block">
                    <img class="img-fluid w-100 h-100" style="object-fit:cover;" src="images/register-bg.jpg" alt="">
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 w-100">
                        <h1 class="text-white mb-4">Register Yourself</h1>
                        <form method="post" name="signup" onsubmit="return checkpass();">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="signupName" name="fname" placeholder="Full Name" required="true">
                                        <label for="signupName">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="signupEmail" name="email" placeholder="E-mail" required="true">
                                        <label for="signupEmail">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="signupMobile" name="mobno" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                                        <label for="signupMobile">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required="true" id="password1">
                                        <label for="password1">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="true" id="password2">
                                        <label for="password2">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="signup">Register NOW</button>
                                </div>
                                <div class="col-12 text-center">
                                    <a href="login.php" class="text-primary">Already have an account!!!</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //register -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
