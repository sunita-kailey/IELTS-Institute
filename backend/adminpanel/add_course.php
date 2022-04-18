<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	$sql_chk="select * from `courses` where `course_name`='".$_POST['course_name']."'";
	$result_course=get_data($sql_chk);
	$count=$result_course->rowCount();
    if($count==0)
	{
		$sql="insert into `courses`(`course_name`) values('".$_POST['course_name']."')";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_course.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_course.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
 }
		 
 
?>


<div class="center">
<h2>Input course details</h2>

 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="container">
     <label for="course_name">Name</label>
	 <input type="text" name="course_name" ><br><br>
	
	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="Add course">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
