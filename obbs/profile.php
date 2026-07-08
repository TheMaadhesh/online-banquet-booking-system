<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $uid=$_SESSION['obbsuid'];
    $AName=$_POST['fname'];
    $mobno=$_POST['mobno']; 
 
  $sql="update tbluser set FullName=:name,MobileNumber=:mobno where ID=:uid";
     $query = $dbh->prepare($sql);
     $query->bindParam(':name',$AName,PDO::PARAM_STR);
     $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
     $query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();

        echo '<script>alert("Profile has been updated")</script>';
echo "<script>window.location.href ='profile.php'</script>";

     

  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | User Profile</title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Profile</h1>
                </div>
            </div>
        </div>

        <!-- profile -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0 shadow justify-content-center">
                <div class="col-md-8 bg-dark">
                    <div class="p-5 w-100">
                        <h1 class="text-white mb-4">User Profile</h1>
                        <form method="post">
                             <?php
$uid=$_SESSION['obbsuid'];
$sql="SELECT * from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white">Full Name:</label>
                                    <input type="text" value="<?php  echo $row->FullName;?>" name="fname" required="true" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Mobile Number</label>
                                    <input type="text" name="mobno" class="form-control" required="true" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MobileNumber;?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Email Address</label>
                                    <input type="email" class="form-control" value="<?php  echo $row->Email;?>" name="email" required="true" readonly title="Email can't be edit">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Registration Date</label>
                                    <input type="text" value="<?php  echo $row->RegDate;?>" class="form-control" name="password" readonly="true">
                                </div>
                            </div>
                            <?php $cnt=$cnt+1;}} ?>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary py-3 px-5" name="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //profile -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html><?php }  ?>
