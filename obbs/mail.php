<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
     $message=$_POST['message'];
    $sql="insert into tblcontact(Name,Email,Message)values(:name,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='mail.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | Mail</title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Contact</h1>
                </div>
            </div>
        </div>

        <!-- contact -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Get in touch</h5>
                        <p>Pellentesque eget mi nec est tincidunt accumsan. Proin fermentum dignissim justo, vel euismod justo sodales vel. In non condimentum mauris. Maecenas condimentum interdum lacus, ac varius nisl dignissim ac. Vestibulum euismod est risus, quis convallis nisi tincidunt eget. Sed ultricies congue lacus at fringilla.</p>
                        <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                        <p class="mb-2"><i class="fa fa-phone me-3" aria-hidden="true"></i> <span>+<?php  echo htmlentities($row->MobileNumber);?></span></p>
                        <p class="mb-2"><i class="fa fa-envelope me-3" aria-hidden="true"></i> <span><?php  echo htmlentities($row->Email);?></span></p>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3" aria-hidden="true"></i> <span><?php  echo htmlentities($row->PageDescription);?>.</span></p><?php $cnt=$cnt+1;}} ?>
                    </div>
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Send us a message</h5>
                        <form action="#" method="post">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="contactName" placeholder="Full Name " name="name" required="true">
                                        <label for="contactName">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="contactEmail" placeholder="Email" name="email" required="true">
                                        <label for="contactEmail">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Message" id="contactMessage" style="height:150px" required=""></textarea>
                                        <label for="contactMessage">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //contact -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
</body>
</html>
