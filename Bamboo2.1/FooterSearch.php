 		</div>
	</div>
	<!-- //add-products --> 
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