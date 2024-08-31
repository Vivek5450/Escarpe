<?php
session_start();
include("scrap_buyer_header.php");
include("connect.php");
?>

<div class="banner banner5" id="home">
				
			</div>
	<!----end-header---->
	<!--about-starts--> 
	<div class="about">
		<div class="container">
			<div class="about-top heading">
				<h3>VIEW SCRAP</h3>
				<div class="row">
				<div class="col-md-3">
					<h3>CATEGORY</h3>
				<?php
				$qur1=mysql_query("select * from category_master");
				echo "<ul>";
				while($q1=mysql_fetch_array($qur1))
				{
					echo "<li><h4><a href='scrap_buyer_view_scrap.php?catid=$q1[0]'>$q1[1]</a></h4></li><br/>";
				}
				echo "</ul>";
				?>
				</div>
				<div class="col-md-9">
				<div class="about-bottom">
				<?php
				$tdate=date("Y-m-d");
				if(isset($_REQUEST['catid']))
				{
					$catid=$_REQUEST['catid'];
					$res1=mysql_query("select * from scrap_detail where status='1' and last_bid_date>='$tdate' and cat_id='$catid'");
				}else{
					$res1=mysql_query("select * from scrap_detail where status='1' and last_bid_date>='$tdate'");
				}
				if(mysql_num_rows($res1)>0)
				{
					while($r1=mysql_fetch_array($res1))
					{
				?>
					
					<div class="col-md-6 about-left">
						<a href="scrap_buyer_view_scrap_detail.php?sid=<?php echo $r1[0]; ?>"><img src="<?php echo $r1[9]; ?>" alt="" style="width:409; height:335px;"/></a>
						<h5><a href="scrap_buyer_view_scrap_detail.php?sid=<?php echo $r1[0]; ?>"><?php echo $r1[1]; ?></a></h5>
						<p>Last Bidding Date:<?php echo $r1[7]; ?><br/>
							Minimum Bid Amount: &#8377; <?php echo $r1[8]; ?>/-<br/>
						</p>
					</div>
				<?php
					}
				}else{
					echo "<h2>No Scrap Uploaded</h2><br/><br/><br/><br/><br/><br/>";
				}
				?>
					
					<div class="clearfix"></div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!----about-end---->

<?php
include("footer.php");
?>