<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	$sql_chk="select * from `course_packages` where `package_name`='".$_POST['package_name']."'";
	$result_package=get_data($sql_chk);
	$count=$result_package->rowCount();
    if($count==0)
	{
		$sql="insert into `course_packages`(`course_id`,`package_name`,`duration`,`fee`) values('".$_POST['course_id']."','".$_POST['package_name']."','".$_POST['duration']."','".$_POST['fee']."')";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_package.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_package.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
 }
		 
 
?>


<div class="center">
<h2>Input Package details</h2>

 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br>
	 
	 <div class="container">
	  <label for="course_id">Exam name</label>
	 	 <select name="course_id" id="course_id" required>
	 <option value="">Select Course</option>
	 <?php
	    $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{
	?>
	<option value="<?php echo $cid['id'];?>"><?php echo$cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	 
	 <br><br>
	 
	 <label for="package_name">Package Name</label>
	 <input type="text" name="package_name" required><br><br>
	 
	 <label for="duration">Duration</label>
	 <input type="text" name="duration" required><br><br>
	 
	 <label for="fee">Fee</label>
	 <input type="number" name="fee" required><br><br>

	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="Add package">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
