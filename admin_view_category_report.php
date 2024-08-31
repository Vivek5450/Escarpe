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
					<CENTER><h2>CATEGORY DETAIL REPORT</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-12 contact-left heading">
				<?php
				$res1=mysql_query("select * from category_master");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								
								<th>CATEGORY ID</th>
								<th>CATEGORY</th>
								<th>VIEW SCRAP</th>
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							echo "<td><a href='admin_view_catwise_scrap_report.php?cid=$r1[0]'>VIEW SCRAP DETAIL</a></td>";
							
							echo "</tr>";
						}
					echo "</table><br/><br/><br/><br/><br/><br/>";
				}else{
					echo "<h4>NO RECORD FOUND</h4> <br/><br/><br/><br/><br/><br/>";
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