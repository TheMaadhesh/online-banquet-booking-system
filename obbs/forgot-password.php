<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
$mobile=$_POST['mobile'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT Email FROM tbluser WHERE Email=:email and MobileNumber=:mobile";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tbluser set Password=:newpassword where Email=:email and MobileNumber=:mobile";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | Forgot Password</title>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Forgot Password</h1>
                </div>
            </div>
        </div>

        <!-- forgot password -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0 shadow">
                <div class="col-md-6 d-none d-md-block">
                    <img class="img-fluid w-100 h-100" style="object-fit:cover;" src="images/5.jpg" alt="">
                </div>
                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 w-100">
                        <h1 class="text-white mb-4">Reset Your Password</h1>
                        <form action="#" method="post" name="chngpwd" onSubmit="return valid();">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="fpEmail" name="email" placeholder="E-mail" required="true">
                                        <label for="fpEmail">E-mail</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="fpMobile" required="true" name="mobile" maxlength="10" pattern="[0-9]+" placeholder="Mobile Number">
                                        <label for="fpMobile">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="fpNewPassword" name="newpassword" placeholder="New Password" required="true"/>
                                        <label for="fpNewPassword">New Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="fpConfirmPassword" name="confirmpassword" placeholder="Confirm Password" required="true" />
                                        <label for="fpConfirmPassword">Confirm Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="login.php" class="text-primary">Already have an account</a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //forgot password -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
