<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	$sql_chk="select * from `videos` where `video_name`='".$_POST['video_name']."'";
	$result_video=get_data($sql_chk);
	$count=$result_video->rowCount();
    if($count==0)
	{
		$folder="../uploads/videos/".$_FILES['video']['name'];
	    if (move_uploaded_file($_FILES['video']['tmp_name'],$folder))
		{
			$msg="Video Uploaded Successfully";
		}
		else
		{
			$msg="Failed to upload Video";
		}
	    $sql_video="insert into `videos`(`video_name`,`video`) values
		('".$_POST['video_name']."','".$_FILES['video']['name']."')";
		$result=insert_data($sql_video);
		
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add-videos.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add-videos.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
 }
		 
 
?>


<div class="center">
<h2>Input Video Details</h2>

 <form action="" method="POST" enctype="multipart/form-data">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="container">
     <label for="video_name">Name</label>
	 <input type="text" name="video_name" required><br><br>
	 
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
	 

	 
	 
	 <label for="video">Select a file:</label>
	 <input type="file" id="video" name="video" accept=".mp4" required><br><br>
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <br>
	 <input type="submit" id="submit" value="Add Video">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
