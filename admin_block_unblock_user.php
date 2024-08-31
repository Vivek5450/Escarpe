<?php
include("admin_header.php");
include("connect.php");



if(isset($_REQUEST['ubid']))
{
	$userid=$_REQUEST['ubid'];
	$query="update user_regis set status='3' where user_id='$userid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('User Blocked Successfully');";
		echo "window.location.href='admin_block_unblock_user.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['uubid']))
{
	$userid=$_REQUEST['uubid'];
	$query="update user_regis set status='1' where user_id='$userid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('User Unblocked Successfully');";
		echo "window.location.href='admin_block_unblock_user.php';";
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
					<CENTER><h2>BLOCK UNBLOCK USER</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$res1=mysql_query("select * from user_regis where status in('1','3')");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
							
								<th>USER ID</th>
								<th>USER NAME</th>
								<th>ADDRESS</th>
								<th>CITY</th>
								<th>MOBILE NO</th>
								<th>EMAIL ID</th>
								<th>LICENSE IMAGE</th>
								<th>USER TYPE</th>
								<th>USER STATUS</th>
								<th>BLOCK/UNBLOCK</th>
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							echo "<td>$r1[2]</td>";
							echo "<td>$r1[3]</td>";
							echo "<td>$r1[4]</td>";
							echo "<td>$r1[5]</td>";
							echo "<td><a href='$r1[8]' target='_blank'><img src='$r1[8]' style='width:150px; height:150px;'></a></td>";
							if($r1[7]=="1")
							{
								echo "<td><b>COMPANY</b></td>";
							}else{
								echo "<td><b>SCRAP BUYER</b></td>";
							}
							if($r1[9]=="1")
							{
								echo "<td style='color:green;'><b>UNBLOCKED</b></td>";
								echo "<td><A href='admin_block_unblock_user.php?ubid=$r1[0]'>BLOCK USER</A></td>";
							}else{
								echo "<td style='color:red;'><b>BLOCKED</b></td>";
								echo "<td><A href='admin_block_unblock_user.php?uubid=$r1[0]'>UNBLOCK USER</A></td>";
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