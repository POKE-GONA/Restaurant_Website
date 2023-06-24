<?php 
session_start();
include ('BrowsingFunction.php');
recordBrowse("http://localhost:70/Test/Bamboo/index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Staple Food a Restaurants Category Bootstrap Responsive website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Staple Food Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<!-- //Custom Theme files --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>  
<!-- //js -->
<!-- web-fonts -->   
<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
<!-- //web-fonts -->
</head>
<body> 
	<!-- banner -->
	<div class="banner">
		<!-- header -->
		<div class="header">
			<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-left">
						<p>Free home delivery at your doorstep For Above $30</p>
					</div>
					<div class="w3ls-header-right">
						<ul> 
							<li class="head-dpdn">
								<i class="fa fa-phone" aria-hidden="true"></i> Call us: +01 222 33345 
							</li> 
							<li class="head-dpdn">
								<a href="Customer_Login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
							</li> 
							<li class="head-dpdn">
								<a href="CustomerEntry.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>
							</li> 
							<li class="head-dpdn">
								<a href="offers.html"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
							</li> 
							<li class="head-dpdn">
								<a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
							</li>
						</ul>
					</div>
					<div class="clearfix"> </div> 
				</div>
			</div>
			<!-- //header-one -->    
			<!-- navigation -->
			<div class="navigation agiletop-nav">
				<div class="container">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header w3l_logo">
							<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>  
							<h1><a href="index.php"><i></i>Bamboo<span>Korea BBQ Restaurant</span></a></h1>
						</div> 
						<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php" class="active">Home</a></li>	
								<!-- Mega Menu -->
								<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Booking <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="BookingDisplay.php">Booking Step</a></li>
										<li><a href="BookingReportList.php">Search & Report</a></li>
			   
									</ul>
								</li>

								<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordering <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="OrderingDisplay.php">Ordering Step</a></li>
										<li><a href="OrderingReportList.php">Search & Report</a></li>
			   
									</ul>
								</li>

								<li><a href="about.html">About</a></li> 

								<li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="Customer_Update.php">Cus: Update</a></li>
										<li><a href="Customer_Logout.php">Cus: Logout</a></li>   
									</ul>
								</li> 

								<li><a href="contact.html">Contact Us</a></li>
								<li><a href="History.php">History</a></li>

							</ul>
						</div> 
					</nav>
				</div>
			</div>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2>
				<div class="agileits_search">
					<form action="#" method="post">
						<input name="Search" type="text" placeholder="Enter Your Area Name" required="">
						<select id="agileinfo_search" name="agileinfo_search" required="">
							<option value="">Popular Cities</option>
							<option value="navs">New York</option>
							<option value="quotes">Los Angeles</option>
							<option value="videos">Chicago</option>
							<option value="news">Phoenix</option>
							<option value="notices">Fort Worth</option>
							<option value="all">Other</option>
						</select>
						<input type="submit" value="Search">
					</form>
				</div> 	
			</div>
		</div>
	</div>
	<!-- //banner -->   
	<!-- add-products -->
	<div class="add-products">
		<div class="container">
			<div class="add-products-row">
				
				<div class="w3ls-add-grids">
					<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=3">
						<h4>Get <span>20%<br>Cashback</span></h4>
						<h5>Ordered in mobile app only </h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<hr/>
				<h2 align="Right">
					<video width="300" height="300" controls autoplay>
							<source src="video\bamboovideo2.mp4" type="video/mp4">
							<source src="video\bamboovideo2.ogg" type="video/ogg">
					</video>
				</h2>
				<div class="w3ls-add-grids w3ls-add-grids-right">
					<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=1"> 
						<h4>GET Upto<span><br>40% Offer</span></h4>
						<h5>Sunday special discount</h5>
						<h6>Order Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div>
				<h2 align="Right">
					<video width="300" height="300" controls autoplay>
							<source src="video\bamboovideo1.mp4" type="video/mp4">
							<source src="video\bamboovideo1.ogg" type="video/ogg">
					</video>
				</h2>

				<div class="clearfix"> </div> 
			</div>  	 
		</div>
	</div>
	<!-- //add-products --> 
	<!-- order -->   	
	<div class="wthree-order">  
		<img src="images/i2.jpg" class="w3order-img" alt=""/>
		<div class="container">
			<h3 class="w3ls-title">How To Order Online Food</h3>
			<p class="w3lsorder-text">Get your favourite food in 4 simple steps.</p>
			<div class="order-agileinfo">  
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-map" aria-hidden="true"></i> 
						<h5>Search Area</h5>
						<span>1</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-cutlery" aria-hidden="true"></i> 
						<h5>Choose Food</h5>
						<span>2</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-credit-card" aria-hidden="true"></i>
						<h5>Pay Money</h5>
						<span>3</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 order-w3lsgrids"> 
					<div class="order-w3text"> 
						<i class="fa fa-truck" aria-hidden="true"></i>
						<h5>Enjoy Food</h5>
						<span>4</span>
					</div>
				</div>
				<div class="clearfix"> </div> 
			</div>
		</div>
	</div>
	<!-- //order -->    
	<!-- deals -->
	<div class="w3agile-deals">
		<div class="container">
			<h3 class="w3ls-title">Special Services</h3>
			<div class="dealsrow">
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4>FREE DELIVERY</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-birthday-cake" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4>Party Orders</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-users" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4>Team up Scheme</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-6 col-sm-6 deals-grids">
					<div class="deals-left">
						<i class="fa fa-building" aria-hidden="true"></i>
					</div> 
					<div class="deals-right">
						<h4>corporate orders</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tempus justo ac </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //deals --> 
	<!-- dishes -->
	<div class="w3agile-spldishes">
		<div class="container">
			<h3 class="w3ls-title">Bamboo Foods</h3>
			<div class="spldishes-agileinfo">
				<div class="col-md-3 spldishes-w3left">
					<h5 class="w3ltitle">Bamboo Specials</h5>
					<p>Vero vulputate enim non justo posuere placerat Phasellus mauris vulputate enim non justo enim .</p>
				</div> 
				<div class="col-md-9 spldishes-grids">
					<!-- Owl-Carousel -->
					<div id="owl-demo" class="owl-carousel text-center agileinfo-gallery-row">
						<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=1" class="item g1">
							<img class="lazyOwl" src="images/g1.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Pork BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=2" class="item g1">
							<img class="lazyOwl" src="images/g2.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Chicken BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=3" class="item g1">
							<img class="lazyOwl" src="images/g3.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Beef BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=4" class="item g1">
							<img class="lazyOwl" src="images/g4.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Seafood BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="http://localhost:70/Bamboo2/BookingMenuDisplay.php?MID=5" class="item g1">
							<img class="lazyOwl" src="images/g5.jpg" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Sea Fish BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a> 
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g1.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Pork BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g2.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Chicken BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
						<a href="products.html" class="item g1">
							<img class="lazyOwl" src="images/g3.jpg" title="Our latest gallery" alt=""/>
							<div class="agile-dish-caption">
								<h4>Korea Beef BBQ</h4>
								<span>Neque porro quisquam est qui dolorem </span>
							</div>
						</a>
					</div> 
				</div>  
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //dishes --> 
	<!-- subscribe -->
	<div class="subscribe agileits-w3layouts"> 
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>Keep in touch</h4>  
				<ul>
					<li><a href="https://www.facebook.com/BambooGroveKoreanBBQ/" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="https://twitter.com/?lang=en" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="https://plus.google.com/" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="https://dribbble.com/" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="https://rss.com/" class="fa fa-rss icon rss"> </a></li> 
				</ul> 
				<ul class="apps"> 
					<li><h4>Download Our app : </h4> </li>
					<li><a href="https://www.apple.com/" class="fa fa-apple"></a></li>
					<li><a href="http://localhost:70/Bamboo/index.php" class="fa fa-windows"></a></li>
					<li><a href="https://www.android.com/" class="fa fa-android"></a></li>
				</ul> 
			</div> 
			<div class="col-md-6 subscribe-right">
				<h3 class="w3ls-title">Subscribe to Our <br><span>Newsletter</span></h3>  
				<form action="#" method="post"> 
					<input type="email" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
					<div class="clearfix"> </div> 
				</form>  
				<img src="images/i1.png" class="sub-w3lsimg" alt=""/>
			</div>
			<div class="clearfix"> </div> 
		</div>
	</div>
	<!-- //subscribe --> 
	<!-- footer -->
	<div class="footer agileits-w3layouts">
		<div class="container">
			<div class="w3_footer_grids">

				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>Restaurant</h3>
					<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Contact Us</a></li>  
						<li><a href="careers.html">Careers</a></li>  
					</ul>
				</div>

				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>Customer</h3> 
					<ul>
						<li><a href="Customer_Update.php">Customer Update</a></li>
						<li><a href="Customer_Logout.php">Customer Logout</a></li> 
					</ul>  
				</div> 
				
				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>Menu Booking & Ordering</h3> 
					<ul>
						<li><a href="BookingDisplay.php">Customer Booking</a></li>
						<li><a href="BookingReportList.php">Booking Search & Report</a></li>
						<li><a href="OrderingDisplay.php">Customer Ordering</a></li> 
						<li><a href="OrderingReportList.php">Ordering Search & Report</a></li> 
					</ul>  
				</div>

				<div class="col-xs-6 col-sm-3 footer-grids w3-agileits">
					<h3>help & policy info</h3>
					<ul>
						<li><a href="faq.html">FAQ</a></li> 
						<li><a href="help.html">Partner With Us</a></li>
						<li><a href="terms.html">Terms & Conditions</a></li>  
						<li><a href="privacy.html">Privacy Policy</a></li>
					</ul>  
				</div> 
				
				<div class="clearfix"> </div>
			</div>
		</div> 
	</div>
	<div class="copyw3-agile"> 
		<div class="container">
			<p>&copy; 2020 Bamboo Korea BBQ Restaurant. All rights reserved | Design by <a href="#">Bamboo</a></p>
		</div>
	</div>
	<!-- //footer --> 
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- start-smooth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>  
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>