<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	$sql_chk="select * from `jobs` where `position`='".$_POST['position']."'";
	$result_job=get_data($sql_chk);
	$count=$result_job->rowCount();
    if($count==0)
	{
		$sql="insert into `jobs`(`required_qualification`,`position`,`experience_required`,`vacancies`) values('".$_POST['required_qualification']."','".$_POST['position']."','".$_POST['experience_required']."',".$_POST['vacancies'].")";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_jobs.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_jobs.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
 }
		 
 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="back_style.css" type="text/css">
</head>
<body>
<div class="center">

<h2>Input job details</h2>
 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	<div class="container">
     <label for="required qualification">Required Qualification</label>
	 <input type="text" name="required_qualification" required ><br><br>
	 
	 <label for="position">Position</label>
	 <input type="text" name="position" required><br><br>
	 
	 <label for="experience_required">Experience Required</label>
	 <input type="text" name="experience_required" required><br><br>
	 
	 <label for="vacancies">Number of vacancies</label>
	 <input type="number" name="vacancies" required><br><br>
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="Add Job">
	</div>
</form>
</div>

<?php include_once('footer.php');?>
</body>
</html>
	 
