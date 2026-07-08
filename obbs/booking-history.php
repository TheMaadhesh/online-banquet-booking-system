<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System|| Booking History </title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Booking Histor</h1>
                </div>
            </div>
        </div>

        <!-- booking history -->
        <div class="container-xxl py-5">
            <div class="container">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">List of booking.</p>
                <div class="table-responsive wow fadeInUp animated" data-wow-delay=".5s">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center"></th>
                            <th>Booking ID</th>
                            <th class="d-none d-sm-table-cell">Cutomer Name</th>
                            <th class="d-none d-sm-table-cell">Mobile Number</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell">Booking Date</th>
                            <th class="d-none d-sm-table-cell">Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                           </tr>
                    </thead>
                    <tbody>
<?php
$uid=$_SESSION['obbsuid'];
$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.Status,tblbooking.ID from tblbooking join tbluser on tbluser.ID=tblbooking.UserID where tblbooking.UserID='$uid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <tr>
                            <td class="text-center"><?php echo htmlentities($cnt);?></td>
                            <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                            <td class="font-w600"><?php  echo htmlentities($row->FullName);?></td>
                            <td class="font-w600"><?php  echo htmlentities($row->MobileNumber);?></td>
                            <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                            <td class="font-w600">
                                <span class="badge bg-primary"><?php  echo htmlentities($row->BookingDate);?></span>
                            </td>
                            <?php if($row->Status==""){ ?>

             <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-primary"><?php  echo htmlentities($row->Status);?></span>
                            </td>
<?php } ?> 
                             <td class="d-none d-sm-table-cell"><a href="view-booking-detail.php?editid=<?php echo htmlentities ($row->ID);?>&&bookingid=<?php echo htmlentities ($row->BookingID);?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                        <?php $cnt=$cnt+1;}} ?> 
                    
                    
                      
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- //booking history -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html><?php }  ?>
