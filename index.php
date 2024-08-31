<?php
include("header.php");
?>

<!--banner-starts-->
	<div class="banner" id="home">
		
	</div>	
	<!--banner-ends--> 
	<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
			<!--End-slider-script-->
<div class="welcome">
	<div class="container">
		<h4>Welcome To E-Scrap World</h4>
		<p>Often when you think you’re at the end of something, you’re at the beginning of something else</p>
	</div>
</div>
<div class="welcome-bottom">
	<div class="container">
		<div class="welcome-bottom-info">
				<div class="col-md-6 slit-slider">
					<section class="slider">
                <div class="flexslider">
                    <ul class="slides">
						<li>
							<div class="banner-top">
							<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/electronic1.jpg" alt="" />
								<h3>Electronic Scrap</h3>
								<p>Best Electronic Scrap For Just a Few Clicks</p>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/metal1.jpg" style="width:123px; height:123px;" alt="" />
								<h3>Metal Scrap</h3>
								<p>All Types of Metal Scrap Available</p>
							</div>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</li>
				<li>
					<div class="banner-top">
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/chemical1.jpg" alt="" />
								<h3>Chemical Scrap</h3>
								<p>All Types of Chemical Scrap Are Available</p>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/rubber2.jpg" style="width:123px; height:123px;" alt="" />
							<h3>Rubber Scrap</h3>
								<p>All type of Tyres and rubber Scrap Are Available</p>
							</div>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</li>
				<li>
					<div class="banner-top">
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/paper1.jpg" style="width:123px; height:123px;" alt="" />
								<h3>Paper Scrap</h3>
								<p>All Types of Paper Waste Available</p>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="images/plastic1.jpg" style="width:123px; height:123px;" alt="" />
								<h3>Plastic Scrap</h3>
								<p>All Types of Plastic Scrap Are Avilable</p>
							</div>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</li>
          </ul>
        </div>
      </section>
				</div>
				<div class="col-md-6 slit-slider-text">
					<h4>We cannot solve our problems with the same thinking we used when we created them.</h4>
					<p align="justify">
                        Welcome to E-Scrap world where we provide you the whole management of your scrap through our web applications. As Scrap of one company could be 
                        used as a raw material for other industry. In this new digitalized world we provide you the platform for company where company
                        can upload there scrap on our website and get the good price for their scrap from the scrap buyer.
                    </p>
                    <p align="justify">
                        We also provide one time bidding system for each scrap buyer on scrap and company can flexible to select any
                        scrap buyer as a winner for their scrap. Scrap Buyer can view the scrap and bid on the scrap before the time limit is 
                        over and time limit is 10 days for bidding process.
                        
                    </p>
				</div>
				<div class="clearfix"> </div>
				</div>
	</div>
</div>
	<!--offer-starts-->
	<div class="offer">
		<div class="container">
			<div class="offer-top heading">
				<h4>Scrap Category</h4>
			</div>
			<div class="offer-bottom">
				<div class="col-md-3 offer-left">
					<a href="#"><img src="images/plastic2.jpg" alt="" style="width:255px; height:204px;" />
					<h4><a href="#">Plastic Scrap</a></h4>
					
				</div>
				<div class="col-md-3 offer-left">
					<a href="#"><img src="images/paper2.jpg" alt="" style="width:255px; height:204px;" />
					</a>
					<h4><a href="#">Paper Scrap</a></h4>
				</div>
				<div class="col-md-3 offer-left">
					<a href="#"><img src="images/chemical2.jpg" style="width:255px; height:204px;" alt="" />
					</a>
					<h4><a href="#">Chemical Scrap</a></h4>
					
				</div>
				<div class="col-md-3 offer-left">
					<a href="#"><img src="images/electronic2.webp" style="width:255px; height:204px;" alt="" />
					</a>
					<h4><a href="#">Electronic Scrap</a></h4>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--offer-ends--> 
	<!--nature-starts--> 
		<div class="nature">
			<div class="nature-top">
				<h3></h3>
				<p>.</p>
			</div>
		</div>
	<!--nature-ends--> 


<?php
include("footer.php");
?>