<?php
session_start();
include("scrap_buyer_header.php");
include("connect.php");

$sid=$_REQUEST['sid'];
$res1=mysql_query("select * from scrap_detail where scrap_id='$sid'");
$r1=mysql_fetch_array($res1);
$name1=$r1[1];
$catid1=$r1[2];
$desc1=$r1[3];
$qty1=$r1[4];
$uom1=$r1[5];
$udate1=$r1[6];
$lbdate1=$r1[7];
$mamt1=$r1[8];
$simg1=$r1[9];

$res2=mysql_query("select * from category_master where cat_id='$catid1'");
$r2=mysql_fetch_array($res2);
$cat1=$r2[1];
?>
<script type="text/javascript">
	function validation()
	{
		var v=/^[0-9]+$/;
		var mamt=parseInt(form1.txtmamt.value);
		var bamt=parseInt(form1.txtamt.value);
		if(form1.txtamt.value=="")
		{
			alert("Please Enter Your Amount");
			form1.txtamt.focus();
			return false;
		}else if((parseInt(form1.txtamt.value))<=0)
		{
			alert("Please Enter Your Bid Amount Greater Than 0");
			form1.txtamt.focus();
			return false;
		}else if(bamt<mamt)
		{
			alert("Please Enter Your Bid Amount More Than Minimum Amount");
			form1.txtamt.focus();
			return false;
		}else{
			if(!v.test(form1.txtamt.value))
			{
				alert("Please Enter Your Only Digit In Bid Amount");
				form1.txtamt.focus();
				return false;
			}
		}
		
	}
</script>
<?php
if(isset($_POST['btnsubmit']))
{
	$bamt=$_POST['txtamt'];
	$userid=$_SESSION['buyerid'];
	$bdate=date("Y-m-d");
	//auto no code start...
	$qur1=mysql_query("select max(bid_id) from bidding_detail");
	$bid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$bid=$q1[0];
	}
	$bid++;
	//auto no code end...
	$query="insert into bidding_detail values('$bid','$bdate','$sid','$userid','$bamt')";
	
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Your Bid is Submitted');";
		echo "window.location.href='scrap_buyer_view_scrap.php';";
		echo "</script>";
	}
}
?>
<div class="banner banner5" id="home">
				
			</div>
	<!----end-header---->
	<!--contact-starts-->
	<div class="contact">
		<div class="container">
			<div class="contact-top">
				<div class="col-md-12 contact-left heading">
					<CENTER><h2>SCRAP DETAIL</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<img src="<?php echo $simg1; ?>" style="width:550px; height:380px;">
				</div>
				<div class="col-md-6 contact-right">
					<div class="row">
						<div class="col-md-4">
							<h3>Scrap Name:</h3>
						</div>
						<div class="col-md-6">
							<h3><?php echo $name1; ?></h3>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<h3>Description:</h3>
						</div>
						<div class="col-md-8">
							<h3><?php echo $desc1; ?></h3>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<h3>Quantity:</h3>
						</div>
						<div class="col-md-6">
							<h3><?php echo $qty1." ".$uom1; ?></h3>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<h3>Upload Date:</h3>
						</div>
						<div class="col-md-6">
							<h3><?php echo date('d-m-Y',strtotime($udate1)); ?></h3>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-4">
							<h3>Last Bid Date:</h3>
						</div>
						<div class="col-md-6">
							<h3><?php echo date('d-m-Y',strtotime($lbdate1)); ?></h3>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-5">
							<h3>Minimum Amount:</h3>
						</div>
						<div class="col-md-6">
							<h3>&#8377; <?php echo $mamt1; ?> /-</h3>
						</div>
					</div>
					<br/>
				<?php
				$userid=$_SESSION['buyerid'];
				$res5=mysql_query("select * from bidding_detail where scrap_id='$sid' and user_id='$userid'");
				if(mysql_num_rows($res5)>0)
				{
					echo "<h3 style='color:red;'>Already Bid On This Scrap</h3>";
				}else{
				?>
					<form method="post" name="form1">
					<input type="number" name="txtamt" placeholder="Enter Your Bid Amount"/>
					<input type="hidden" name="txtmamt" value="<?php echo $mamt1; ?>"/>
						<div class="submit-btn">
							<form>
								<input type="submit" value="SUBMIT YOUR BID" name="btnsubmit" onclick="return validation();">
							</form>
						</div>
					</form>
				<?php
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