<?php
include("admin_header.php");
include("connect.php");

?>

<script type="text/javascript">
	function validation()
	{
		var rg=/^[a-zA-Z ]+$/;
		if(form1.txtcat.value=="")
		{
			alert("Please Enter Scrap Category");
			form1.txtcat.focus();
			return false;
		}else{
			if(!rg.test(form1.txtcat.value))
			{
				alert("Please Enter Only Characters in Scrap Category");
				form1.txtcat.focus();
				return false;
			}
		}
	}
</script>
<?php
if(isset($_POST['btnsave']))
{
	$cat=$_POST['txtcat'];
	//auto no code start...
	$qur1=mysql_query("select max(cat_id) from category_master");
	$catid=0;
	while($q1=mysql_fetch_array($qur1))
	{
		$catid=$q1[0];
	}
	$catid++;
	
	//auto no code end...
	
	$query="insert into category_master values('$catid','$cat')";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Saved Successfull');";
		echo "window.location.href='admin_manage_scrap_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['cdid']))
{
	$catid1=$_REQUEST['cdid'];
	$query="delete from category_master where cat_id='$catid1'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Deleted Successfull');";
		echo "window.location.href='admin_manage_scrap_cat.php';";
		echo "</script>";
	}
}

if(isset($_REQUEST['ceid']))
{
	$catid=$_REQUEST['ceid'];
	$qur2=mysql_query("select * from category_master where cat_id='$catid'");
	$q2=mysql_fetch_array($qur2);
	$cat1=$q2[1];
}

if(isset($_POST['btnedit']))
{
	$cat=$_POST['txtcat'];
	$catid=$_REQUEST['ceid'];
	
	$query="update category_master set category='$cat' where cat_id='$catid'";
	if(mysql_query($query))
	{
		echo "<script type='text/javascript'>";
		echo "alert('Category Updated Successfull');";
		echo "window.location.href='admin_manage_scrap_cat.php';";
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
					<CENTER><h2>MANAGE SCRAP CATEGORY</h2></CENTER>
					
				</div>
			
				<div class="clearfix"> </div>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left heading">
				<?php
				$res1=mysql_query("select * from category_master");
				if(mysql_num_rows($res1)>0)
				{
					echo "<table class='table table-bordered'>
							<tr>
								<th>EDIT</th>
								<th>DELETE</th>
								<th>CATEGORY ID</th>
								<th>CATEGORY</th>
								
							</tr>
							";
						while($r1=mysql_fetch_array($res1))
						{
							echo "<tr>";
							echo "<td><a href='admin_manage_scrap_cat.php?ceid=$r1[0]'>EDIT</a></td>";
							echo "<td><a href='admin_manage_scrap_cat.php?cdid=$r1[0]'>DELETE</a></td>";
							echo "<td>$r1[0]</td>";
							echo "<td>$r1[1]</td>";
							
							echo "</tr>";
						}
					echo "</table><br/><br/><br/><br/><br/><br/>";
				}else{
					echo "<h4>NO RECORD FOUND</h4> <br/><br/><br/><br/><br/><br/>";
				}
				?>
				</div>
				<div class="col-md-6 contact-right">
					<form method="post" name="form1">
					<input type="text" name="txtcat" placeholder="Enter Scrap Category" value="<?php echo $cat1; ?>"/>
					
					
						<div class="submit-btn">
							<form>
							<?php
							if(isset($_REQUEST['ceid']))
							{
								?>
								<input type="submit" value="EDIT" name="btnedit" onclick="return validation();">
								<?php
							}else{
							?>
								<input type="submit" value="SAVE" name="btnsave" onclick="return validation();">
							<?php
							}
							?>
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