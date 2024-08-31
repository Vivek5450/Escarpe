<?php
session_start();
include("company_header.php");
include("connect.php");



?>
<br/><br/><br/>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>COMPLAIN STATUS DETAIL</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$userid=$_SESSION['compid'];
	
				$res1=mysql_query("select * from complain_detail where user_id='$userid'");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								
								<th>COMPLAIN ID</th>
								<th>COMPLAIN DATE</th>
								<th>COMPLAIN AGAINST NAME</th>
								<th>DESCRIPTION</th>
								
								<th>COMPLAIN STATUS</th>
								
								
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							
							echo "<td>$r1[2]</td>";
							
							echo "<td>$r1[3]</td>";
							
							
							if($r1[6]=="0")
							{
								echo "<td style='color:blue;'>NEW COMPLAIN</td>";
							}else if($r1[6]=="1")
							{
								echo "<td style='color:pink;'>COMPLAIN VERIFY</td>";
							}else if($r1[6]=="2")
							{
								echo "<td style='color:red;'>FAKE COMPLAIN</td>";
							}else if($r1[6]=="3")
							{
								echo "<td style='color:orange;'>PENDING</td>";
							}else if($r1[6]=="4")
							{
								echo "<td style='color:yellow;'>ACTION TAKEN</td>";
							}else if($r1[6]=="5")
							{
								echo "<td style='color:green;'>COMPLAIN SOLVED</td>";
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