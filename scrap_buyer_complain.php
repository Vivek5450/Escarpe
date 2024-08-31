<?php
session_start();
include("scrap_buyer_header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validation()
	{
		var rg=/^[a-zA-Z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Complain Against Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!rg.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Complain Against Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Complain Description");
			form1.txtdesc.focus();
			return false;
		}
	}
</script>
<?php
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$desc=$_POST['txtdesc'];
	$cdate=date("Y-m-d");
	$userid=$_SESSION['buyerid'];
	
	
	//auto no code start...
	$qur1=mysql_query("select max(complain_id) from complain_detail");
	$cid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$cid=$q1[0];
	}
	$cid++;
	//auto no code end...
		
		
	$query="insert into complain_detail values('$cid','$cdate','$name','$desc','$userid','2','0')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Complain Submitted Successfully');";
		echo "window.location.href='scrap_buyer_view_complain_status.php';";
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
					<CENTER><h3>COMPLAIN</h3></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<img src="images/reg2.png" alt="" style="width:100%;" />
				</div>
				<div class="col-md-6 contact-right">
				<form method="post" name="form1" enctype="multipart/form-data">
					<input type="text" value="" name="txtname" placeholder="Enter Complain Against Name"/>
					<textarea name="txtdesc" placeholder="Enter Complain Description" ></textarea>
					
						<div class="submit-btn">
							<form>
								<input type="submit" value="SUBMIT COMPLAIN" name="btnsubmit" onclick="return validation();">
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