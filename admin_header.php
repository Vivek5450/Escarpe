<!DOCTYPE html>
<html>
<head>
<title>E-Scrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fruit_Salad Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'><script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.min.js"> </script>
<script src="js/jquery-1.11.0.min.js"> </script>
<script src="js/bootstrap.js"></script>
<!---- start-smoth-scrolling---->
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
<!---- start-smoth-scrolling---->
</head>
<body>
	<!----start-header---->
	<div class="header" id="home">
		<div class="container">
			<div class="logo">
				<a href="#"><img src="images/logo1.jpg" alt=""></a>
			</div>
			<div class="navigation">
			 <span class="menu"></span> 
				<ul class="navig">
					<li><a class="active" href="admin_manage_scrap_cat.php">Scrap Category</a><span> </span></li>
					  <li><a class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Verify<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="hvr-bounce-to-bottom" href="admin_verify_buyer.php">Verify Buyer</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_verify_company.php">Verify Company</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_verify_scrap.php">Verify Scrap</a></li>
							
						</ul>
					</li>
					<li><a href="admin_block_unblock_user.php">Block/Unblock User</a><span> </span></li>
					<li><a href="admin_view_complain.php">View Complain</a><span> </span></li>
					<li><a class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a class="hvr-bounce-to-bottom" href="admin_view_company_report.php">COMPANY DETAIL <BR/>REPORT</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_view_buyer_report.php">SCRAP BUYER DETAIL <BR/>REPORT</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_view_category_report.php">CATEGORY DETAIL <BR/>REPORT</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_view_all_scrap_report.php">ALL SCRAP DETAIL <BR/>REPORT</a></li>
							<li><a class="hvr-bounce-to-bottom" href="admin_view_solved_complain_report.php">SOLVED COMPLAIN <BR/> DETAIL REPORT</a></li>
							
							
						</ul>
					</li>
					
					<li><a href="logout.php">Logout</a><span> </span></li>
				</ul>
			</div>
				 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
		 </script>
		 <!-- script-for-menu -->
		</div>
	</div>	
	<!----end-header---->