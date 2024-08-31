<?php
include("admin_header.php");
include("connect.php");



if(isset($_REQUEST['vbid']))
{
	$userid=$_REQUEST['vbid'];
	$query="update user_regis set status='1' where user_id='$userid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Buyer Verified Successfully');";
		echo "window.location.href='admin_verify_buyer.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['nvbid']))
{
	$userid=$_REQUEST['nvbid'];
	$query="update user_regis set status='2' where user_id='$userid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Buyer Not Verified Successfully');";
		echo "window.location.href='admin_verify_buyer.php';";
		echo "</script>";
	}
}
?>
<br/><br/><br/>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>VERIFY SCRAP BUYER</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$res1=mysql_query("select * from user_regis where user_type='2' and status='0'");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>VERIFY</th>
								<th>NOT VERIFY</th>
								<th>USER ID</th>
								<th>USER NAME</th>
								<th>ADDRESS</th>
								<th>CITY</th>
								<th>MOBILE NO</th>
								<th>EMAIL ID</th>
								<th>LICENSE IMAGE</th>
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							echo "<td><a href='admin_verify_buyer.php?vbid=$r1[0]'>VERIFY</a></td>";
							echo "<td><a href='admin_verify_buyer.php?nvbid=$r1[0]'>NOT VERIFY</a></td>";
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							echo "<td>$r1[2]</td>";
							echo "<td>$r1[3]</td>";
							echo "<td>$r1[4]</td>";
							echo "<td>$r1[5]</td>";
							echo "<td><a href='$r1[8]' target='_blank'><img src='$r1[8]' style='width:150px; height:150px;'></a></td>";
							
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