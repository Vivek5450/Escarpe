<?php
include("header.php");
include("connect.php");
?>
<script type="text/javascript">
	function validation()
	{
		var rg=/^[a-zA-Z ]+$/;
		if(form1.txtname.value=="")
		{
			alert("Please Enter Your Name");
			form1.txtname.focus();
			return false;
		}else{
			if(!rg.test(form1.txtname.value))
			{
				alert("Please Enter Only Characters in Your Name");
				form1.txtname.focus();
				return false;
			}
		}
		
		if(form1.txtadd.value=="")
		{
			alert("Please Enter Your Address");
			form1.txtadd.focus();
			return false;
		}
		
		if(form1.txtcity.value=="")
		{
			alert("Please Enter Your City");
			form1.txtcity.focus();
			return false;
		}else{
			if(!rg.test(form1.txtcity.value))
			{
				alert("Please Enter Only Characters in Your City");
				form1.txtcity.focus();
				return false;
			}
		}
		
		var rg=/^[0-9]+$/;
		if(form1.txtmno.value=="")
		{
			alert("Please Enter Your Mobile No");
			form1.txtmno.focus();
			return false;
		}else if(form1.txtmno.value.length!=10)
		{
			alert("Please Enter Your Mobile No 10 Digit Long");
			form1.txtmno.focus();
			return false;
		}
		else{
			if(!rg.test(form1.txtmno.value))
			{
				alert("Please Enter Only Digits in Your Mobile No");
				form1.txtmno.focus();
				return false;
			}
		}
		
		var rg=/^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/;
		if(form1.txtemail.value=="")
		{
			alert("Please Enter Your Email ID");
			form1.txtemail.focus();
			return false;
		}else{
			if(!rg.test(form1.txtemail.value))
			{
				alert("Please Enter Valid Email ID");
				form1.txtemail.focus();
				return false;
			}
		}
		
		if(form1.txtpwd.value=="")
		{
			alert("Please Enter Your Password");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length<6)
		{
			alert("Please Enter Your Password More than 6 Characters");
			form1.txtpwd.focus();
			return false;
		}else if(form1.txtpwd.value.length>10)
		{
			alert("Please Enter Your Password Less than 10 Characters");
			form1.txtpwd.focus();
			return false;
		}
		
		if(form1.selutype.value=="0")
		{
			alert("Please Select User Type");
			form1.selutype.focus();
			return false;
		}
		
		var fname=document.getElementById("txtfile").value;
		var ext =fname.substr(fname.lastIndexOf(".")+1).toLowerCase().trim();
		if(document.getElementById("txtfile").value=="")
		{
			alert("Please Select License Image");
			return false;
		}else{
			if(!((ext=="png") || (ext=="jpeg") || (ext=="jpg") || (ext=="webp")))
			{
				alert("Please Select License Image In Format Like jpg, jpeg, png and webp");
				return false;
			}
		}
		
	}
</script>
<?php
if(isset($_POST['btnregis']))
{
	$name=$_POST['txtname'];
	$add=$_POST['txtadd'];
	$city=$_POST['txtcity'];
	$mno=$_POST['txtmno'];
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$utype=$_POST['selutype'];
	
	$res1=mysql_query("select * from user_regis where email_id='$email'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Email Id Already Exists');";
		echo "window.location.href='registration.php';";
		echo "</script>";
	}else{
		//auto no code start...
		$qur1=mysql_query("select max(user_id) from user_regis");
		$uid=0;
		while($q1=mysql_fetch_array($qur1))
		{
			$uid=$q1[0];
		}
		$uid++;
		//auto no code end...
		
		$tmppath= $_FILES['txtfile']['tmp_name'];
		$imgpath="lic_img/LI".$uid.".png";
		$query="insert into user_regis values('$uid','$name','$add','$city','$mno','$email','$pwd','$utype','$imgpath','0')";
		if(mysql_query($query))
		{
			move_uploaded_file($tmppath,$imgpath);
			echo "<script type='text/javascript'>";
			echo "alert('Registration Done Wait Until Verified Your Verification is done in 24 hours');";
			echo "window.location.href='login.php';";
			echo "</script>";
		}
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
					<CENTER><h3>REGISTRATION FORM</h3></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<img src="images/reg2.png" alt="" style="width:100%;" />
				</div>
				<div class="col-md-6 contact-right">
				<form method="post" name="form1" enctype="multipart/form-data">
					<input type="text" value="" name="txtname" placeholder="Enter Your Name"/>
					<textarea name="txtadd" placeholder="Enter Your Address" ></textarea>
					<input type="text" name="txtcity" placeholder="Enter Your City Name"/>
					<input type="text" name="txtmno" placeholder="Enter Your Mobile No"/>
					<input type="email" name="txtemail" placeholder="Enter Your Email ID"/>
					<input type="password" name="txtpwd" placeholder="Enter Your Password"/>
					<select name="selutype">
						<option value="0">--Select User Type--</option>
						<option value="1">COMPANY</option>
						<option value="2">SCRAP BUYER</option>
					</select>
					Select License Image:
					<input type="file" name="txtfile" id="txtfile">
						<div class="submit-btn">
							<form>
								<input type="submit" value="REGISTER" name="btnregis" onclick="return validation();">
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