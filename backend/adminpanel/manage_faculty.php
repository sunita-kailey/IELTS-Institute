<?php
ob_start();
include_once('header.php');

$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	unlink("../uploads/faculty_images/pic");
	$sql="delete from `faculty` where `id`=".$id;
	$count=delete_data($sql);
	
	if($count==1)
	{
		ob_clean();
		header('location:manage_faculty.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_faculty.php?msg=Record Not Deleted');
	}
}
?>




<div class="container">

<h2>Manage Faculty</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Name</th><th>Qualification</th><th>Position</th><th>Expertise</th><th>Experience</th><th>IMAGE</th><th colspan="2">Operations</th>
<?php
   $sql_fclty="select * from `faculty` order by `name`";
   $result_fclty=get_data($sql_fclty);
   $fcltys=$result_fclty->fetchAll();
   $sr=1;
   foreach($fcltys as $fclty)
   {
	
?>
<tr><td><?php echo $sr;?></td><td><?php echo $fclty['name'];?></td><td><?php echo $fclty['qualification'];?></td><td><?php echo $fclty['position'];?></td><td><?php echo $fclty['expertise'];?></td><td><?php echo $fclty['experience'];?></td><td><?php echo $fclty['pic'];?></td><td><a href="update_faculty.php?id=<?php echo $fclty['id'];?>">update</a></td><td><a href="manage_faculty.php?id=<?php echo $fclty['id'];?>&flag=delete&pic=<?php echo $fclty['pic'];?>">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
