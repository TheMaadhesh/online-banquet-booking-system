<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obbsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
  	$bid=$_GET['bookid'];
  	$uid=$_SESSION['obbsuid'];
 $bookingfrom=$_POST['bookingfrom'];
  $bookingto=$_POST['bookingto'];
 $eventtype=$_POST['eventtype'];
 $nop=$_POST['nop'];
 $message=$_POST['message'];

 // ---- Strict server-side date validation (never trust the client alone) ----
 $today = date('Y-m-d');
 $fromDT = DateTime::createFromFormat('Y-m-d', $bookingfrom);
 $toDT   = DateTime::createFromFormat('Y-m-d', $bookingto);
 $dateError = '';

 if(!$bookingfrom || !$bookingto || !$fromDT || !$toDT){
     $dateError = 'Please enter valid Booking From and Booking To dates.';
 } elseif($bookingfrom < $today){
     $dateError = 'Booking From date cannot be in the past.';
 } elseif($bookingto < $bookingfrom){
     $dateError = 'Booking To date cannot be earlier than Booking From date.';
 }

 if($dateError !== ''){
     echo '<script>alert("'.addslashes($dateError).'")</script>';
 } else {
 $bookingid=mt_rand(100000000, 999999999);
$sql="insert into tblbooking(BookingID,ServiceID,UserID,BookingFrom,BookingTo,EventType,Numberofguest,Message)values(:bookingid,:bid,:uid,:bookingfrom,:bookingto,:eventtype,:nop,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
$query->bindParam(':bid',$bid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->bindParam(':bookingfrom',$bookingfrom,PDO::PARAM_STR);
$query->bindParam(':bookingto',$bookingto,PDO::PARAM_STR);
$query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
$query->bindParam(':nop',$nop,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);

 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Your Booking Request Has Been Send. We Will Contact You Soon")</script>';
echo "<script>window.location.href ='services.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
 }

}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System | Book Services</title>
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
                    <h1 class="display-3 text-white mb-0 animated slideInDown">Book Services</h1>
                </div>
            </div>
        </div>

        <!-- book services -->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0 shadow justify-content-center">
                <div class="col-md-8 bg-dark">
                    <div class="p-5 w-100">
                        <h1 class="text-white mb-4">Book Services</h1>
                        <form method="post" id="obbsBookingForm" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label text-white">Booking From:</label>
                                    <input type="date" id="bookingfrom" class="form-control" required name="bookingfrom">
                                    <span class="field-error-msg" id="bookingfrom-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Booking To:</label>
                                    <input type="date" id="bookingto" class="form-control" required name="bookingto">
                                    <span class="field-error-msg" id="bookingto-error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Type of Event:</label>
                                    <select class="form-select" name="eventtype" required="true">
                                        <option value="">Choose Event Type</option>
                                        <?php

$sql2 = "SELECT * from   tbleventtype ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->EventType);?>"><?php echo htmlentities($row->EventType);?></option>
 <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-white">Number of Guest:</label>
                                    <input type="text" class="form-control" required="true" name="nop">
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-white">Message(if any)</label>
                                    <textarea class="form-control" required="true" name="message" style="height:100px"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary py-3 px-5" name="submit">Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- //book services -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
    <!-- strict date handling for the booking form -->
    <script type="text/javascript">
    (function(){
        function pad(n){ return n < 10 ? '0'+n : ''+n; }
        function todayStr(){
            var d = new Date();
            return d.getFullYear()+'-'+pad(d.getMonth()+1)+'-'+pad(d.getDate());
        }

        var from = document.getElementById('bookingfrom');
        var to   = document.getElementById('bookingto');
        var fromErr = document.getElementById('bookingfrom-error');
        var toErr   = document.getElementById('bookingto-error');
        var form  = document.getElementById('obbsBookingForm');
        var today = todayStr();

        // Never allow picking a date before today.
        from.setAttribute('min', today);
        to.setAttribute('min', today);

        function syncToMin(){
            // "Booking To" can never be earlier than "Booking From".
            if(from.value){
                to.setAttribute('min', from.value);
                if(to.value && to.value < from.value){
                    to.value = from.value;
                }
            } else {
                to.setAttribute('min', today);
            }
        }

        function clearError(input, errEl){
            input.classList.remove('field-error');
            errEl.textContent = '';
        }
        function setError(input, errEl, msg){
            input.classList.add('field-error');
            errEl.textContent = msg;
        }

        function validateFrom(){
            if(from.value && from.value < today){
                setError(from, fromErr, 'Booking From date cannot be in the past.');
                return false;
            }
            clearError(from, fromErr);
            return true;
        }
        function validateTo(){
            if(to.value && from.value && to.value < from.value){
                setError(to, toErr, 'Booking To date cannot be before Booking From date.');
                return false;
            }
            if(to.value && to.value < today){
                setError(to, toErr, 'Booking To date cannot be in the past.');
                return false;
            }
            clearError(to, toErr);
            return true;
        }

        from.addEventListener('change', function(){ syncToMin(); validateFrom(); validateTo(); });
        to.addEventListener('change', validateTo);

        form.addEventListener('submit', function(e){
            var okFrom = validateFrom();
            var okTo = validateTo();
            if(!from.value){ setError(from, fromErr, 'Please choose a Booking From date.'); okFrom = false; }
            if(!to.value){ setError(to, toErr, 'Please choose a Booking To date.'); okTo = false; }
            if(!okFrom || !okTo){
                e.preventDefault();
            }
        });
    })();
    </script>
    <!-- //strict date handling -->
</body>
</html><?php }  ?>
