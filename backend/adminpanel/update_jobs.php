<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_job="select * from `jobs` where `id`=".$id;
	$result_job=get_data($sql_job);
	$jobs=$result_job->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		if(isset($_POST['check']))
		{
			$msg='Record not inserted';
		    $sql_upd="update `jobs` set `required_qualification`='".$_POST['required_qualification']."',`position`='".$_POST['position']."',`experience_required`='".$_POST['experience_required']."',`vacancies`=".$_POST['vacancies']." where id=".$_POST['jobid'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 ob_clean();
			 header('location:manage_jobs.php?msg=Record Updateed');
		    }
		    else
		    {
			 header('location:manage_jobs.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update jobs</h2>
<form action="" method="POST">
      <input type="hidden" name="jobid" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  <label for="required_qualification">Required Qualification</label>
	  <input type="text" name="required_qualification" value="<?php echo $jobs[0]['required_qualification']?>">
	  
	  
	  
	  <label for="position">Position</label>
	  	  <input type="text" name="position" value="<?php echo $jobs[0]['position']?>">
	
	
	
	 <label for="experince_required">Experience Required</label>
	 	  <input type="text" name="experience_required" value="<?php echo $jobs[0]['experience_required']?>">

	 

	 <label for="vacancies">Vacancies</label>
	 	  <input type="number" name="vacancies" value="<?php echo $jobs[0]['vacancies']?>">
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 