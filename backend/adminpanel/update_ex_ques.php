<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_ques="select * from `recent_eq` where `id`=".$id;
	$result_ques=get_data($sql_ques);
	$questions=$result_ques->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		if(isset($_POST['check']))
		{
			$msg='Record not inserted';
		    $sql_upd="update `recent_eq` set `course_id`='".$_POST['course_id']."',`exam_date`='".$_POST['exam_date']."',`ques`='".$_POST['ques']."',`module_name`='".$_POST['module_name']."' where `id`=".$_POST['ques_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 ob_clean();
			 header('location:manage_ex_ques.php?msg=Record Updateed');
		    }
		    else
		    {
			 header('location:manage_ex_ques.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update Recent Exam Ques Details</h2>
<form action="" method="POST">
      <input type="hidden" name="ques_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
		
	 	    <label for="course_id">Course Name</label>
	  <select name="course_id" id="course_id" required>
	 <option value="">select course</option>
	 
	
	 <?php
	    $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{
			$req="";
			if($cid['id']==$questions[0]['course_id'])
			{
				$req='selected';
			}
			
			
			
			
	?>
	<option value="<?php echo $cid['id'];?>" <?php echo $req; ?> ><?php echo $cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	<br><br> 
	
	  
	  
	  <label for="exam_date">Exam Date</label>
	  	  <input type="date" name="exam_date" value="<?php echo $questions[0]['exam_date']?>">
	
	
	
	 <label for="ques">Ques</label>
	 	  <input type="text" name="ques" value="<?php echo $questions[0]['ques']?>">

	 

	 <label for="module_name">Module_name</label>
	 	  <input type="text" name="module_name" value="<?php echo $questions[0]['module_name']?>">
		  
	
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 