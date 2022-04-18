<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');


if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	/*$sql_chk="select * from `recent_eq` where `name`='".$_POST['name']."'";
	$result_faculty=get_data($sql_chk);
	$count=$result_faculty->rowCount();
   

    if($count==0)
	{*/
		$sql="insert into `recent_eq`(`course_id`,`exam_date`,`ques`,`module_name`) values('".$_POST['course_id']."','".$_POST['exam_date']."','".$_POST['ques']."','".$_POST['module_name']."')";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_exam_ques.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_exam_ques.php?msg=Record Not Inserted');
	    }
	/*}

	else
	{
		echo "Record Already Exists";
	}
	*/
 }
		 
 
?>


<div class="center">
<h2>Input question details</h2>

 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="container">
     <label for="course_id">Course Name</label>
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
	 
	 <label for="ques">Question</label>
	 <input type="text" name="ques" required><br><br>
	 
	 <label for="module_name">Module Name</label>
	 <input type="text" name="module_name" required><br><br>
	
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="Add Ques">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 

