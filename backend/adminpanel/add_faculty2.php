<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	$img_types=array('image/jpg','image/png','image/jpeg');
	$validate_img_extension=in_array($_FILES['pic']['type'],$img_types);
	
	if($validate_img_extension)
	{
	
	
	
	
	
	
	$sql_chk="select * from `faculty` where `name`='".$_POST['name']."'";
	$result_faculty=get_data($sql_chk);
	$count=$result_faculty->rowCount();
    if($count==0)
	{
		$folder="../uploads/faculty_images/".$_FILES['pic']['name'];
	    if (move_uploaded_file($_FILES['pic']['tmp_name'],$folder))
		{
			$msg="pic Uploaded Successfully";
		}
		else
		{
			$msg="Failed to upload pic";
		}
	    $sql_faculty="insert into `faculty`(`name`,`qualification`,`position`,`expertise`,`experience`,`pic`) values
		('".$_POST['name']."','".$_POST['qualification']."','".$_POST['position']."','".$_POST['expertise']."','".$_POST['experience']."','".$_FILES['pic']['name']."')";
		$result=insert_data($sql_faculty);
		
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_faculty2.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_faculty2.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
}
else
{
	
	ob_clean();
	header('location:add_faculty2.php?msg=only png,jpg,jpeg images are allowed');
}

 }
		 
 
?>


<div class="center">
<h2>Input Faculty Details</h2>

 <form action="" method="POST" enctype="multipart/form-data">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="container">
     <label for="name">Name</label>
	 <input type="text" name="name" ><br><br>
	 
	<!-- <label for="course_id">Exam name</label>
	 	 <select name="course_id" id="course_id">
	 <option value="">Select Course</option>-->
	 <?php
	   /* $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{*/
	?>
	<!--<option value="<?php /*echo $cid['id'];?>"><?php echo$cid['course_name'];?></option>-->
	<?php
		/*}*/
	?>
  <!--  </select>	<br><br> -->
	  <label for="qualification">Qualification</label>
	 <input type="text" name="qualification" ><br><br>
	 
	 
	  <label for="expertise">Expertise</label>
	 <input type="text" name="expertise" ><br><br>
	 
	  <label for="experience">Experience</label>
	 <input type="text" name="experience" ><br><br>
	 
	  <label for="position">position</label>
	 <input type="text" name="position" ><br><br>

	 
	 
	 <label for="pic">Select a file:</label>
	 <input type="file" id="pic" name="pic"><br><br>
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <br>
	 
	 <input type="submit" id="submit" value="Add faculty">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
