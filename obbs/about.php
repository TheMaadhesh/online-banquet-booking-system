<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System|| About </title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">About Us</h1>
                </div>
            </div>
        </div>

        <!-- about -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="images/about-us.jpg" alt="About Us">
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        <?php
$sql="SELECT * from tblpage where PageType='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal"><?php  echo htmlentities($row->PageTitle);?></h5>
                        <p><?php  echo $row->PageDescription;?></p><?php $cnt=$cnt+1;}} ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- //about -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
