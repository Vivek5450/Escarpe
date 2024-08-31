<?php
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
					<CENTER><h2>COMPANY DETAIL REPORT</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$res1=mysql_query("select * from user_regis where user_type='1' and status='1'");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								
								<th>COMPANY ID</th>
								<th>COMPANY NAME</th>
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
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							echo "<td>$r1[2]</td>";
							echo "<td>$r1[3]</td>";
							echo "<td>$r1[4]</td>";
							echo "<td>$r1[5]</td>";
							echo "<td><a href='$r1[8]' target='_blank'><img src='$r1[8]' style='width:150px; height:150px;'></a></td>";
							echo "<td><a href='admin_view_company_wise_scrap_report.php?cid=$r1[0]'>VIEW SCRAP</a></td>";
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