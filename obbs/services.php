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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Services</h1>
                </div>
            </div>
        </div>

        <!-- services -->
        <div class="container-xxl py-5">
            <div class="container">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">List of services which is prvided by us.</p>
                <div class="table-responsive wow fadeInUp animated" data-wow-delay=".5s">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Package Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
$sql="SELECT * from tblservice";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

                        <tr>
                            <td><?php echo htmlentities($cnt);?></td>
                            <td><?php  echo htmlentities($row->ServiceName);?></td>
                            <td><?php  echo htmlentities($row->SerDes);?></td>
                            <td>₹<?php  echo htmlentities($row->ServicePrice);?></td>
                            <?php if($_SESSION['obbsuid']==""){?>
                            <td><a href="login.php" class="btn btn-primary btn-sm">Book Services</a></td>
                            <?php } else {?>
                            <td><a href="book-services.php?bookid=<?php echo $row->ID;?>" class="btn btn-primary btn-sm">Book Services</a></td><?php }?>
                        </tr> <?php $cnt=$cnt+1;}} ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- //services -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
