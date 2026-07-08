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
<title>Online Banquet Booking System|| View Booking </title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">View Booking</h1>
                </div>
            </div>
        </div>

        <!-- view booking -->
        <div class="container-xxl py-5">
            <div class="container">
                <p class="wow fadeInUp animated" data-wow-delay=".5s">View Your Booking Details.</p>
                <div class="wow fadeInUp animated" data-wow-delay=".5s">
                     <?php
                  $uid=$_SESSION['obbsuid'];

$sql="SELECT tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.BookingID,tblbooking.BookingDate,tblbooking.BookingFrom,tblbooking.BookingTo,tblbooking.EventType,tblbooking.Numberofguest,tblbooking.Message, tblbooking.Remark,tblbooking.Status,tblbooking.UpdationDate,tblservice.ServiceName,tblservice.SerDes,tblservice.ServicePrice,Remark from tblbooking join tblservice on tblbooking.ServiceID=tblservice.ID join tbluser on tbluser.ID=tblbooking.UserID  where tblbooking.UserID=:uid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <div class="table-responsive mb-4">
                    <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                        <tr>
                            <th colspan="5" class="text-center fs-5 text-primary">Booking Number: <?php  echo $row->BookingID;?>
                                
                            </th>
                        </tr>
                                    <tr>
    <th>Client Name</th>
    <td><?php  echo $row->FullName;?></td>
     <th>Mobile Number</th>
    <td><?php  echo $row->MobileNumber;?></td>
  </tr>
  

  <tr>
    
   <th>Email</th>
    <td><?php  echo $row->Email;?></td>
     <th>Booking From</th>
    <td><?php  echo $row->BookingFrom;?></td>
  </tr>

   <tr>
   <th>Booking To</th>
    <td><?php  echo $row->BookingTo;?></td>
    <th>Number of Guest</th>
    <td><?php  echo $row->Numberofguest;?></td>
  </tr>
 
  <tr>
    
    <th>Event Type</th>
    <td><?php  echo $row->EventType;?></td>
    <th>Message</th>
    <td><?php  echo $row->Message;?></td>
  </tr>
  <tr>
    
    <th>Service Name</th>
    <td><?php  echo $row->ServiceName;?></td>
    <th>Service Description</th>
    <td><?php  echo $row->SerDes;?></td>
  </tr>
   <tr>
    <th>Service Price</th>
    <td>₹<?php  echo $row->ServicePrice;?></td>
    <th>Apply Date</th>
    <td><?php  echo $row->BookingDate;?></td>
  </tr>

  <tr>
    
     <th>Order Final Status</th>

    <td> <?php  $status=$row->Status;
    
if($row->Status=="Approved")
{
  echo "Approved";
}

if($row->Status=="Cancelled")
{
 echo "Cancelled";
}


if($row->Status=="")
{
  echo "Not Response Yet";
}


     ;?></td>
     <th >Admin Remark</th>
    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?>                  <td><?php  echo htmlentities($row->Remark);?>
                  </td>
                  <?php } ?>
  </tr>
  
 
<?php $cnt=$cnt+1;}} ?>

</table>
</div> 
                </div>
            </div>
        </div>
        <!-- //view booking -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html><?php }  ?>
