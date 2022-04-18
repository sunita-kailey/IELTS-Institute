<?php
ob_start();
include_once('header.php');

$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `courses` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_course.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_course.php?msg=Record Not Deleted');
	}
}
?>

<div class="container">
<h2>Manage Courses</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Course Title</th><th colspan="2">Operations</th></tr>
<?php
   $sql="select * from `courses` order by `id`";
   $result=get_data($sql);
   $courses=$result->fetchAll();
   $sr=1;
   foreach($courses as $course)
   {
	
	   
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $course['course_name'];?></td><td><a href="update_courses.php?id=<?php echo $course['id'];?>">update</a></td><td><a href="manage_course.php?id=<?php echo $course['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
