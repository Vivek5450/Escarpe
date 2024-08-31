<?php
session_start();
include("company_header.php");
include("connect.php");

if(isset($_REQUEST['bid']))
{
	$bid=$_REQUEST['bid'];
	$sid=$_REQUEST['sid'];
	$wdate=date("Y-m-d");
	$qur6=mysql_query("select * from bidding_detail where bid_id='$bid'");
	$q6=mysql_fetch_array($qur6);
	$userid=$q6[3];
	$amt=$q6[4];
	//auto no code start...
	$qur1=mysql_query("select max(winner_id) from winner_detail");
	$wid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$wid=$q1[0];
	}
	$wid++;
	//auto no code end...
		
	$query="insert into winner_detail values('$wid','$wdate','$bid','$sid','$userid','$amt')";
	if(mysql_query($query))
	{
		mysql_query("update scrap_detail set status='3' where scrap_id='$sid'");
		echo "<script type='text/javascript'>";
		echo "alert('Winner Selected Successfully');";
		echo "window.location.href='company_view_scrap.php';";
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
					<CENTER><h2>SELECT WINNER</h2></CENTER>
					
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
								<th>SELECT WINNER</th>
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
							echo "<td><a href='company_select_winner.php?sid=$sid&bid=$r1[0]'>SELECT WINNER</a></td>";
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