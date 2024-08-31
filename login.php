<?php
session_start();
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
	$email=$_POST['txtemail'];
	$pwd=$_POST['txtpwd'];
	$res1=mysql_query("select * from admin_detail where email_id='$email' and pwd='$pwd'");
	if(mysql_num_rows($res1)>0)
	{
		echo "<script type='text/javascript'>";
		echo "alert('Admin Login Successfull');";
		echo "window.location.href='admin_manage_scrap_cat.php';";
		echo "</script>";
	}else{
		$res2=mysql_query("select * from user_regis where email_id='$email' and pwd='$pwd'");
		if(mysql_num_rows($res2)>0)
		{
			$r2=mysql_fetch_array($res2);
			if($r2[9]=="0")
			{
				echo "<script type='text/javascript'>";
				echo "alert('Yet To Verified Verification Done in 24 hours After Registration');";
				echo "window.location.href='login.php';";
				echo "</script>";
			}else if($r2[9]=="1")
			{
				
				if($r2[7]=="1")
				{
					$_SESSION['compid']=$r2[0];
					echo "<script type='text/javascript'>";
					echo "alert('Company Login Successfull');";
					echo "window.location.href='company_upload_scrap.php';";
					echo "</script>";
				}else{
					$_SESSION['buyerid']=$r2[0];
					echo "<script type='text/javascript'>";
					echo "alert('Scrap Buyer Login Successfull');";
					echo "window.location.href='scrap_buyer_view_scrap.php';";
					echo "</script>";
				}
			}else if($r2[9]=="2")
			{
				echo "<script type='text/javascript'>";
				echo "alert('You Are Not Verified By Admin Please Contact Us');";
				echo "window.location.href='contact.php';";
				echo "</script>";
			}else if($r2[9]=="3")
			{
				echo "<script type='text/javascript'>";
				echo "alert('You Are Blocked By Admin Please Contact Us');";
				echo "window.location.href='contact.php';";
				echo "</script>";
			}
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Invalid Credentials');";
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
					<CENTER><h2>LOGIN</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<img src="images/log1.gif" style="width:550px; height:280px;">
				</div>
				<div class="col-md-6 contact-right">
					<form method="post">
					<input type="email" name="txtemail" placeholder="Enter Your Email ID"/>
					<input type="password" name="txtpwd" placeholder="Enter Your Password"/>
					
						<div class="submit-btn">
							<form>
								<input type="submit" value="LOGIN" name="btnlogin">
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