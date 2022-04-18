<?php
ob_start();
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `recent_eq` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_ex_ques.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_ex_ques.php?msg=Record Not Deleted');
	}
}
?>


<div class="container">
<h2>Manage Exam Ques Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Course Name</th><th>Exam Date</th><th>ques</th><th>Module Name</th><th colspan="2">Operations</th>
<?php
   $sql_ques="select * from `recent_eq` order by `exam_date`";
   $result_ques=get_data($sql_ques);
   $questions=$result_ques->fetchAll();
   $sr=1;
   foreach($questions as $ques)
   {
	   $sql_crs="select * from `courses` where `id`=".$ques['course_id'];
	   $result_crs=get_data($sql_crs);
	   $crs=$result_crs->fetchAll();
	   
	   
	 
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $crs[0]['course_name'];?></td><td><?php echo $ques['exam_date'];?></td><td><?php echo $ques['ques'];?></td><td><?php echo $ques['module_name'];?></td><td><a href="update_ex_ques.php?id=<?php echo $ques['id'];?>">update</a></td><td><a href="manage_ex_ques.php?id=<?php echo $ques['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
