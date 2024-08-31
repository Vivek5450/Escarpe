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
					<CENTER><h2>COMPANY WISE SCRAP DETAIL REPORT</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$userid=$_REQUEST['cid'];
				$res1=mysql_query("select * from scrap_detail where user_id='$userid'");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								
								<th>SCRAP ID</th>
								<th>SCRAP NAME</th>
								<th>CATEGORY</th>
								<th>DESCRIPTION</th>
								<th>QUANTITY</th>
								<th>UPLOAD DATE</th>
								<th>LAST BIDDING DATE</th>
								<th>MINIMUM BID AMOUNT</th>
								
								<th>SCRAP IMAGE</th>
								<th>SCRAP STATUS</th>
								<th>VIEW BIDDING/WINNER</th>
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							//echo "<td>$r1[2]</td>";
							$res2=mysql_query("select * from category_master where cat_id='$r1[2]'");
							$r2=mysql_fetch_array($res2);
							echo "<td>$r2[1]</td>";
							echo "<td>$r1[3]</td>";
							echo "<td>$r1[4] $r1[5]</td>";
							echo "<td>$r1[6]</td>";
							echo "<td>$r1[7]</td>";
							echo "<td>&#8377; $r1[8] /-</td>";
							echo "<td><a href='$r1[9]' target='_blank'><img src='$r1[9]' style='width:150px; height:150px;'></a></td>";
							if($r1[11]=="0")
							{
								echo "<td style='color:orange;'>NEW UPLOADED</td>";
								echo "<td style='color:orange;'>----------</td>";
							}else if($r1[11]=="1")
							{
								echo "<td style='color:green;'>VERIFIED</td>";
								echo "<td style='color:green;'><a href='admin_view_scrap_wise_bid.php?sid=$r1[0]'>VIEW BIDDING</a></td>";
							}else if($r1[11]=="2")
							{
								echo "<td style='color:red;'>NOT VERIFIED</td>";
								echo "<td style='color:red;'>-----------</td>";
							}else if($r1[11]=="3")
							{
								echo "<td style='color:pink;'>SOLD</td>";
								echo "<td style='color:pink;'><a href='admin_view_winner.php?sid=$r1[0]'>VIEW WINNER</a></td>";
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