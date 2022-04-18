<?php
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `course_packages` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_package.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_package.php?msg=Record Not Deleted');
	}
}
?>



<div class="container">
<h2>Manage Package Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Course Name</th><th>Package Name</th><th>duration</th><th>fee</th><th colspan="2">Operations</th>
<?php
   $sql_package="select * from `course_packages` order by `package_name`";
   $result_package=get_data($sql_package);
   $packages=$result_package->fetchAll();
   $sr=1;
   foreach($packages as $package)
   {
	   $sql_crs="select `course_name` from `courses` where `id`=".$package['course_id'];
	   $result_crs=get_data($sql_crs);
	   $crs=$result_crs->fetchAll();
	   
	   
	 
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $crs[0]['course_name'];?></td><td><?php echo $package['package_name'];?></td><td><?php echo $package['duration'];?></td><td><?php echo $package['fee'];?></td><td><a href="update_package.php?id=<?php echo $package['id'];?>">update</a></td><td><a href="manage_package.php?id=<?php echo $package['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
