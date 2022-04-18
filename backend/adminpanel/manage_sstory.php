<?php
ob_start();
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `success_stories` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_sstory.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_sstory.php?msg=Record Not Deleted');
	}
}
?>


<div class="container">

<h2>Manage Sucess Stories Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Student Name</th><th>Exam Name</th><th>Exam date</th><th>Result Date</th><th>image</th><th colspan="2">Operations</th>
<?php
   $sql_story="select * from `success_stories` order by `exam_date`";
   $result_story=get_data($sql_story);
   $stories=$result_story->fetchAll();
   $sr=1;
   foreach($stories as $story)
   {
	
	   
	   $sql_ex_name="select * from `courses` where `id`=".$story['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();
	  
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $story['student_name'];?></td><td><?php echo $ex_name[0]['course_name'];?></td><td><?php echo $story['exam_date'];?></td><td><?php echo $story['result_date'];?></td><td><?php echo $story['pic'];?></td><td><a href="update_sstory.php?id=<?php echo $story['id'];?>">update</a></td><td><a href="manage_sstory.php?id=<?php echo $story['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
