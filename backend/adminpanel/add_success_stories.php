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
	
	
	
	
	
	$sql_chk="select * from `success_stories` where `student_name`='".$_POST['student_name']."'";
	$result_story=get_data($sql_chk);
	$count=$result_story->rowCount();
    if($count==0)
	{
		$folder="../uploads/success_story_images/".$_FILES['pic']['name'];
	    if (move_uploaded_file($_FILES['pic']['tmp_name'],$folder))
		{
			$msg="Image Uploaded Successfully";
		}
		else
		{
			$msg="Failed to upload image";
		}
	    $sql_img="insert into `success_stories`(`student_name`,`course_id`,`exam_date`,`result_date`,`pic`) values
		('".$_POST['student_name']."','".$_POST['course_id']."','".$_POST['exam_date']."'
		,'".$_POST['result_date']."','".$_FILES['pic']['name']."')";
		$result=insert_data($sql_img);
		
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_success_stories.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_success_stories.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
	}
	else
	{
		 header('location:add_success_stories.php?msg=only jpg,png,jpeg files are allowed');
    }
 }
		 
 
?>

<h3 style="text-align:center;background:red;color:#f5f5f5;"><?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
</h3>
<div class="center">
 
<h2>Input Suceess Story Details</h2>

 <form action="" method="POST" enctype="multipart/form-data">
 
    
	 <br> 
	 <div class="container">
     <label for="student_name">Name</label>
	 <input type="text" name="student_name" required><br><br>
	 
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
    </select>	<br><br> 
	 
	 <label for="exam_date">Exam date</label>
	 <input type="date" name="exam_date" required><br><br>
	 
	 <label for="result_date">Result date</label>
	 <input type="date" name="result_date" required><br><br>
	 
	 <label for="pic">Select a file:</label>
	 <input type="file" id="pic" name="pic" required><br><br>
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <br>
	 <input type="submit" id="submit" value="Add Sucess Story">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
