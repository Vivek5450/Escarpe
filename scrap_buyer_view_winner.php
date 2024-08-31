<?php
session_start();
include("scrap_buyer_header.php");
include("connect.php");



?>
<br/><br/><br/>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>VIEW WIN/LOSE DETAIL</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$userid=$_SESSION['buyerid'];
				$res1=mysql_query("select * from bidding_detail where user_id='$userid' and scrap_id in (select scrap_id from scrap_detail where status='3')");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>SCRAP IMAGE</th>
								<th>BIDDING ID</th>
								<th>BIDDING DATE</th>
								<th>SCRAP NAME</th>
								<th>QUANTITY</th>
								<th>LAST BIDDING DATE</th>
								<th>MINIMUM BID AMOUNT</th>
								<th>BIDDING AMOUNT</th>
								<th>WIN/LOSE</th>
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							$res2=mysql_query("select * from scrap_detail where scrap_id='$r1[2]'");
							$r2=mysql_fetch_array($res2);
							echo "<td><a href='$r2[9]' target='_blank'><img src='$r2[9]' style='width:150px; height:150px;'></a></td>";
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							
							echo "<td>$r2[1]</td>";
							
							echo "<td>$r2[4] $r2[5]</td>";
							
							echo "<td>$r2[7]</td>";
							echo "<td>&#8377; $r2[8] /-</td>";
							echo "<td>&#8377; $r1[4] /-</td>";
							$res9=mysql_query("select * from winner_detail where scrap_id='$r1[2]' and bid_id='$r1[0]'");
							if(mysql_num_rows($res9)>0)
							{
								echo "<td style='color:green;'><b>WINNER</b></td>";
							}else{
								echo "<td style='color:red;'><b>LOSE</b></td>";
							}
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