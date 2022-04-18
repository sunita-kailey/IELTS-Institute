<?php
ob_start();
include_once('header.php');

$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `jobs` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_jobs.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_jobs.php?msg=Record Not Deleted');
	}
}
?>

<div class="container">
<h2>Manage Jobs</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Job Title</th><th>Qualification</th><th>vacancies</th><th colspan="2">Operations</th></tr>
<?php
   $sql_job="select * from `jobs` order by `position`";
   $result_job=get_data($sql_job);
   $jobs=$result_job->fetchAll();
   $sr=1;
   foreach($jobs as $job)
   {
	 /*  $sql_position="select `position` from `jobs` where `id`=".$job['id'];
	   $result_position=get_data($sql_position);
	   $position=$result_position->fetchAll();
	   
	   
	   $sql_qual="select `required_qualification` from `jobs` where `id`=".$job['id'];
	   $result_qual=get_data($sql_qual);
	   $qual=$result_qual->fetchAll();
	   
	   $sql_vacancy="select `vacancies` from `jobs` where `id`=".$job['id'];
	   $result_vacancy=get_data($sql_vacancy);
	   $vacancy=$result_vacancy->fetchAll();
	*/   
	   
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $job['position'];?></td><td><?php echo $job['required_qualification'];?></td><td><?php echo $job['vacancies'];?></td><td><a href="update_jobs.php?id=<?php echo $job['id'];?>">update</a></td><td><a href="manage_jobs.php?id=<?php echo $job['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
