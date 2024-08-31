<?php
include("admin_header.php");
include("connect.php");

$cid=$_REQUEST['cid'];
$status=$_REQUEST['status'];

if(isset($_POST['btnupdate']))
{
	$cid=$_POST['txtcid'];
	$ustatus=$_POST['selstatus'];
	
	
	$query="update complain_detail set status='$ustatus' where complain_id='$cid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Status Updated Successfull');";
		echo "window.location.href='admin_view_complain.php';";
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
					<CENTER><h2>UPDATE COMPLAIN STATUS</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
					<img src="images/comp4.jpg" style="width:550px; height:300px;">
				</div>
				<div class="col-md-6 contact-right">
					<form method="post" name="form1">
					Complain ID:
					<input type="text" name="txtcid" placeholder="Enter Scrap Category" value="<?php echo $cid; ?>"/>
					Select Status
					<select name="selstatus" >
						<option value="0" <?php if($status=="0"){ echo "selected='selected'"; } ?>>NEW COMPLAIN</option>
						<option value="1" <?php if($status=="1"){ echo "selected='selected'"; } ?>>COMPLAIN VERIFY</option>
						<option value="2" <?php if($status=="2"){ echo "selected='selected'"; } ?>>FAKE COMPLAIN</option>
						<option value="3" <?php if($status=="3"){ echo "selected='selected'"; } ?>>PENDING</option>
						<option value="4" <?php if($status=="4"){ echo "selected='selected'"; } ?>>ACTION TAKEN</option>
						<option value="5" <?php if($status=="5"){ echo "selected='selected'"; } ?>>COMPLAIN SOLVED</option>
					</select>
					
						<div class="submit-btn">
							<form>
							
								<input type="submit" value="UPDATE STATUS" name="btnupdate" >
							
							</form>
						</div>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!----contact-end---->

<?php
include("footer.php");
?>