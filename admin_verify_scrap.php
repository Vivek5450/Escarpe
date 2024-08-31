<?php
session_start();
include("admin_header.php");
include("connect.php");



if(isset($_REQUEST['vsid']))
{
	$scrapid=$_REQUEST['vsid'];
	$query="update scrap_detail set status='1' where scrap_id='$scrapid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Scrap Verified Successfully');";
		echo "window.location.href='admin_verify_scrap.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['nvsid']))
{
	$scrapid=$_REQUEST['nvsid'];
	$query="update scrap_detail set status='2' where scrap_id='$scrapid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Scrap Not Verified Successfully');";
		echo "window.location.href='admin_verify_scrap.php';";
		echo "</script>";
	}
}

?>
<br/><br/><br/>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container-fluid">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>VERIFY SCRAP DETAIL</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				
				$res1=mysql_query("select * from scrap_detail where status='0'");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>VERIFY</th>
								<th>NOT VERIFY</th>
								
								<th>SCRAP NAME</th>
								<th>CATEGORY</th>
								<th>DESCRIPTION</th>
								<th>QUANTITY</th>
								<th>UPLOAD DATE</th>
								<th>LAST BIDDING DATE</th>
								<th>MINIMUM BID AMOUNT</th>
								<th>COMPANY NAME</th>
								<th>SCRAP IMAGE</th>
								
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							echo "<td><a href='admin_verify_scrap.php?vsid=$r1[0]'>VERIFY</a></td>";
							echo "<td><a href='admin_verify_scrap.php?nvsid=$r1[0]'>NOT VERIFY</a></td>";
							
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
							$res3=mysql_query("select * from user_regis where user_id='$r1[10]'");
							$r3=mysql_fetch_array($res3);
							echo "<td>$r3[1]</td>";
							echo "<td><a href='$r1[9]' target='_blank'><img src='$r1[9]' style='width:150px; height:150px;'></a></td>";
							
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