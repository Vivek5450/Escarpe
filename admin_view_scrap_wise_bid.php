<?php
session_start();
include("admin_header.php");
include("connect.php");



?>
<br/><br/><br/>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>SCRAP WISE BIDDING DETAIL REPORT</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$sid=$_REQUEST['sid'];
	
				$res1=mysql_query("select * from bidding_detail where scrap_id='$sid' order by bid_amt desc");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								
								<th>BIDDING ID</th>
								<th>BIDDING DATE</th>
								<th>SCRAP NAME</th>
								<th>QUANTITY</th>
								
								<th>MINIMUM BID AMOUNT</th>
								<th>SCRAP BUYER NAME</th>
								<th>MOBILE NO</th>
								<th>BIDDING AMOUNT</th>
								
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							$res2=mysql_query("select * from scrap_detail where scrap_id='$r1[2]'");
							$r2=mysql_fetch_array($res2);
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							
							echo "<td>$r2[1]</td>";
							
							echo "<td>$r2[4] $r2[5]</td>";
							
							
							echo "<td>&#8377; $r2[8] /-</td>";
							$res3=mysql_query("select * from user_regis where user_id='$r1[3]'");
							$r3=mysql_fetch_array($res3);
							echo "<td>$r3[1]</td>";
							echo "<td>$r3[4]</td>";
							echo "<td>&#8377; $r1[4] /-</td>";
							
							echo "</tr>";
						}
					echo "</table><br/><br/><br/><br/><br/><br/>";
				}else{
					echo "<h2>NO RECORD FOUND</h2> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
				}
				?>
				</div>
			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!----contact-end---->

<?php
include("footer.php");
?>