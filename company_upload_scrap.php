<?php
session_start();
include("company_header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validation()
	{
		var rg=/^[a-zA-Z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Scrap Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!rg.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Scrap Name");
				form1.txtname.focus();
				return false;
			}
		}
		if(form1.selcat.value=="0")
		{
			alert("Please Select Category");
			form1.selcat.focus();
			return false;
		}
		if(form1.txtdesc.value=="")
		{
			alert("Please Enter Scrap Description");
			form1.txtdesc.focus();
			return false;
		}
		
		var rg=/^[0-9]+$/;
		if(form1.txtqty.value=="")
		{
			alert("Please Enter Scrap Quantity");
			form1.txtqty.focus();
			return false;
		}else if((parseInt(form1.txtqty.value))<=0)
		{
			alert("Please Enter Scrap Quantity Greater Than 0");
			form1.txtqty.focus();
			return false;
		}
		else{
			if(!rg.test(form1.txtqty.value))
			{
				alert("Please Enter Only Digits in Scrap Quantity");
				form1.txtqty.focus();
				return false;
			}
		}
		
		if(form1.seluom.value=="0")
		{
			alert("Please Select Unit Of Mesaurement");
			form1.seluom.focus();
			return false;
		}
		
		var rg=/^[0-9]+$/;
		if(form1.txtamt.value=="")
		{
			alert("Please Enter Scrap Minimum Bid Amount");
			form1.txtamt.focus();
			return false;
		}else if((parseInt(form1.txtamt.value))<=0)
		{
			alert("Please Enter Scrap Minimum Bid Amount Greater Than 0");
			form1.txtamt.focus();
			return false;
		}
		else{
			if(!rg.test(form1.txtamt.value))
			{
				alert("Please Enter Only Digits in Scrap Minimum Bid Amount");
				form1.txtamt.focus();
				return false;
			}
		}
		
		var fname=document.getElementById("txtfile").value;
		var ext =fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtfile").value=="")
		{
			alert("Please Select Scrap Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp")))
			{
				alert("Please Select Scrap Image In Format Like jpg, jpeg, png and webp");
				return false;
			}
		}
		
	}
</script>
<?php
if(isset($_POST['btnupload']))
{
	$name=$_POST['txtname'];
	$catid=$_POST['selcat'];
	$desc=$_POST['txtdesc'];
	$qty=$_POST['txtqty'];
	$uom=$_POST['seluom'];
	$price=$_POST['txtamt'];
	$udate=date("Y-m-d");
	$lbdate=date("Y-m-d",strtotime("+10 days"));
	$userid=$_SESSION['compid'];
	//auto no code start...
	$qur1=mysql_query("select max(scrap_id) from scrap_detail");
	$sid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$sid=$q1[0];
	}
	$sid++;
	//auto no code end...
		
	$tmppath= $_FILES['txtfile']['tmp_name'];
	$imgpath="scrap_img/SI".$sid.".png";
	$query="insert into scrap_detail values('$sid','$name','$catid','$desc','$qty','$uom','$udate','$lbdate','$price','$imgpath','$userid','0')";
	if(mysql_query($query))
	{
		move_uploaded_file($tmppath,$imgpath);
		echo "<script type='text/javascript'>";
		echo "alert('Scrap Uploaded And Verified in 24 Hours');";
		echo "window.location.href='company_view_scrap.php';";
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
					<CENTER><h3>UPLOAD SCRAP</h3></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<img src="images/reg2.png" alt="" style="width:100%;" />
				</div>
				<div class="col-md-6 contact-right">
				<form method="post" name="form1" enctype="multipart/form-data">
					<input type="text" value="" name="txtname" placeholder="Enter Scrap Name"/>
					<select name="selcat">
						<option value="0">--Select Category--</option>
					<?php
					$qur9=mysql_query("select * from category_master");
					while($q9=mysql_fetch_array($qur9))
					{
						?>
						<option value="<?php echo $q9[0]; ?>"><?php echo $q9[1]; ?></option>
						<?php
					}
					?>
					</select>
					<textarea name="txtdesc" placeholder="Enter Scrap Description" ></textarea>
					<input type="number" name="txtqty" placeholder="Enter Scrap Quantity"/>
					<select name="seluom">
						<option value="0">--Select Unit of Mesaurement--</option>
						<option value="KG">KG</option>
						<option value="LITRE">LITRE</option>
						<option value="TON">TON</option>
					</select>
					<input type="number" name="txtamt" placeholder="Enter Scrap Minimum Amount"/>
					
					
					Select Scrap Image:
					<input type="file" name="txtfile" id="txtfile">
						<div class="submit-btn">
							<form>
								<input type="submit" value="UPLOAD SCRAP" name="btnupload" onclick="return validation();">
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