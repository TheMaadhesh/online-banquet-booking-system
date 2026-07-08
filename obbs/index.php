<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// Featured services (top 3) for the home page preview
$sqlSvc = "SELECT * from tblservice ORDER BY ID DESC LIMIT 3";
$querySvc = $dbh->prepare($sqlSvc);
$querySvc->execute();
$svcResults = $querySvc->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head-assets.php'); ?>
<title>Online Banquet Booking System|| Home Page
</title>
</head>
<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <?php include_once('includes/header.php');?>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container my-5 py-5">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-8 text-center text-lg-start mx-auto">
                            <h5 class="section-title ff-secondary text-center text-lg-start text-primary fw-normal">Weddings &bull; Receptions &bull; Celebrations</h5>
                            <h1 class="display-3 text-white animated slideInLeft">Online Banquet Booking System</h1>
                            <p class="text-white animated slideInLeft mb-4 pb-2">The perfect venue for your every celebration &mdash; browse our halls, packages and services, then book online in minutes.</p>
                            <a href="services.php" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Explore Services</a>
                            <?php if(isset($_SESSION['obbsuid']) && strlen($_SESSION['obbsuid'])!=0){ ?>
                            <a href="services.php" class="btn btn-outline-light py-sm-3 px-sm-5 animated slideInLeft">Book Now</a>
                            <?php } else { ?>
                            <a href="signup.php" class="btn btn-outline-light py-sm-3 px-sm-5 animated slideInLeft">Book Now</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- floating quick-info bar -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4 text-center">
                    <?php
$sql="SELECT * from tblpage where PageType='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-map-marker-alt text-primary mb-4" aria-hidden="true"></i>
                                <p><?php  echo htmlentities($row->PageDescription);?>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-envelope text-primary mb-4" aria-hidden="true"></i>
                                <p><?php  echo htmlentities($row->Email);?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-phone-alt text-primary mb-4" aria-hidden="true"></i>
                                <p>+<?php  echo htmlentities($row->MobileNumber);?></p>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
                </div>
            </div>
        </div>
        <!-- //quick-info bar -->

        <!-- why choose us -->
        <div class="container-xxl py-5" id="obbs-why">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Why Choose Us</h5>
                    <h1 class="mb-3">Planning Made Effortless</h1>
                    <p class="mb-5">From the first enquiry to the final toast, our team handles every detail so you can simply enjoy the celebration.</p>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-birthday-cake text-primary mb-4" aria-hidden="true"></i>
                                <h5>Planning Start to Finish</h5>
                                <p>From decor and seating to catering and music, our team takes care of every detail of your banquet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-users text-primary mb-4" aria-hidden="true"></i>
                                <h5>Expert Event Hosts</h5>
                                <p>Spacious air-conditioned halls, flexible seating and an experienced events team make every function effortless.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-utensils text-primary mb-4" aria-hidden="true"></i>
                                <h5>Premium Catering</h5>
                                <p>Multi-cuisine menus crafted by experienced chefs, tailored to your guests and your celebration.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="service-item rounded pt-3">
                            <div class="p-4">
                                <i class="fa fa-3x fa-music text-primary mb-4" aria-hidden="true"></i>
                                <h5>Decor &amp; Entertainment</h5>
                                <p>Elegant decor themes, lighting and entertainment options to match the mood of your event.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //why choose us -->

        <!-- featured services -->
        <div class="container-xxl py-5" style="background:var(--light);">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Packages</h5>
                    <h1 class="mb-3">Popular Services</h1>
                    <p class="mb-5">A quick look at some of our most requested banquet packages.</p>
                </div>
                <?php if(count($svcResults) > 0){ ?>
                <div class="row g-4 justify-content-center">
                    <?php foreach($svcResults as $row){ ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item rounded pt-3 h-100">
                            <div class="p-4">
                                <h5><?php echo htmlentities($row->ServiceName);?></h5>
                                <p><?php echo htmlentities($row->SerDes);?></p>
                                <h4 class="text-primary mb-3">&#8377;<?php echo htmlentities($row->ServicePrice);?></h4>
                                <?php if(isset($_SESSION['obbsuid']) && strlen($_SESSION['obbsuid'])!=0){ ?>
                                <a href="book-services.php?bookid=<?php echo $row->ID;?>" class="btn btn-primary">Book Now</a>
                                <?php } else { ?>
                                <a href="login.php" class="btn btn-primary">Book Now</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } else { ?>
                <p class="text-center">Services will appear here soon. Please check back shortly.</p>
                <?php } ?>
                <div class="text-center mt-5">
                    <a href="services.php" class="btn btn-primary py-3 px-5">View All Services</a>
                </div>
            </div>
        </div>
        <!-- //featured services -->

        <!-- gallery preview -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Gallery</h5>
                    <h1 class="mb-3">A Glimpse of Our Celebrations</h1>
                    <p class="mb-5">Real moments from banquets, weddings and receptions we've helped bring to life.</p>
                </div>
                <div class="coverflow-gallery wow fadeInUp" data-wow-delay="0.2s" id="obbsCoverflow">
                    <button type="button" class="coverflow-nav coverflow-prev" aria-label="Previous photo"><i class="fa fa-chevron-left"></i></button>
                    <div class="coverflow-track" id="coverflowTrack">
                        <div class="coverflow-slide" data-index="0"><a href="images/g1.jpg" data-lightbox="obbs-gallery" data-title="Reception table with wine glasses and a floral centerpiece"><img src="images/g1.jpg" alt="Reception table with wine glasses and a floral centerpiece"></a></div>
                        <div class="coverflow-slide" data-index="1"><a href="images/g2.jpg" data-lightbox="obbs-gallery" data-title="Outdoor gazebo wedding ceremony setup"><img src="images/g2.jpg" alt="Outdoor gazebo wedding ceremony setup"></a></div>
                        <div class="coverflow-slide" data-index="2"><a href="images/g3.jpg" data-lightbox="obbs-gallery" data-title="Outdoor tented garden reception"><img src="images/g3.jpg" alt="Outdoor tented garden reception"></a></div>
                        <div class="coverflow-slide" data-index="3"><a href="images/g4.jpg" data-lightbox="obbs-gallery" data-title="Grand ballroom set for a banquet"><img src="images/g4.jpg" alt="Grand ballroom set for a banquet"></a></div>
                        <div class="coverflow-slide" data-index="4"><a href="images/g5.jpg" data-lightbox="obbs-gallery" data-title="Elegant banquet hall setup"><img src="images/g5.jpg" alt="Elegant banquet hall setup"></a></div>
                        <div class="coverflow-slide" data-index="5"><a href="images/g6.jpg" data-lightbox="obbs-gallery" data-title="Reception hall with pastel floral centerpieces"><img src="images/g6.jpg" alt="Reception hall with pastel floral centerpieces"></a></div>
                    </div>
                    <button type="button" class="coverflow-nav coverflow-next" aria-label="Next photo"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="coverflow-dots" id="coverflowDots"></div>
            </div>
        </div>
        <!-- //gallery preview -->

        <!-- testimonials -->
        <div class="container-xxl py-5" style="background:var(--light);">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonials</h5>
                    <h1 class="mb-5">What Our Guests Say</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-white rounded p-4 h-100 text-center">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3" aria-hidden="true"></i>
                            <p>Everything from the decor to the catering was handled beautifully. Our wedding day felt completely stress-free.</p>
                            <img src="images/t1.jpg" alt="Guest" class="rounded-circle mb-2" style="width:60px;height:60px;object-fit:cover;">
                            <div class="text-primary mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            <h6 class="mb-0">Ananya R.</h6>
                            <small class="text-muted">Wedding Reception</small>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="bg-white rounded p-4 h-100 text-center">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3" aria-hidden="true"></i>
                            <p>The hall was spacious, the staff attentive, and booking online was quick and simple. Highly recommended.</p>
                            <img src="images/t2.jpg" alt="Guest" class="rounded-circle mb-2" style="width:60px;height:60px;object-fit:cover;">
                            <div class="text-primary mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            <h6 class="mb-0">Vikram S.</h6>
                            <small class="text-muted">Corporate Event</small>
                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="bg-white rounded p-4 h-100 text-center">
                            <i class="fa fa-quote-left fa-2x text-primary mb-3" aria-hidden="true"></i>
                            <p>Our anniversary party turned out better than we imagined. The team took care of every last detail.</p>
                            <img src="images/t3.jpg" alt="Guest" class="rounded-circle mb-2" style="width:60px;height:60px;object-fit:cover;">
                            <div class="text-primary mb-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                            <h6 class="mb-0">Meera K.</h6>
                            <small class="text-muted">Anniversary Celebration</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //testimonials -->

        <!-- CTA -->
        <div class="container-xxl py-5 bg-dark hero-header">
            <div class="container text-center py-5">
                <h1 class="text-white mb-3">Ready to Plan Your Perfect Event?</h1>
                <p class="text-white mb-4">Tell us your date and guest count, and we'll take care of the rest.</p>
                <?php if(isset($_SESSION['obbsuid']) && strlen($_SESSION['obbsuid'])!=0){ ?>
                <a href="services.php" class="btn btn-outline-light py-3 px-5">Book Your Banquet</a>
                <?php } else { ?>
                <a href="signup.php" class="btn btn-outline-light py-3 px-5">Get Started</a>
                <?php } ?>
            </div>
        </div>
        <!-- //CTA -->

        <?php include_once('includes/footer.php');?>
    </div>

    <?php include('includes/foot-scripts.php'); ?>
    <!-- lightbox for gallery -->
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="all" />
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="js/coverflow-gallery.js"></script>
</body>
</html>
