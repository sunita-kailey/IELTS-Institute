<?php
ob_start();
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `videos` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_videos.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_videos.php?msg=Record Not Deleted');
	}
}
?>



<div class="container">
<h2>Manage Videos Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Video Name</th><th>video link</th><th colspan="2">Operations</th>
<?php
   $sql_video="select * from `videos`";
   $result_video=get_data($sql_video);
   $videos=$result_video->fetchAll();
   $sr=1;
   foreach($videos as $video)
   {
	
	   
	 /*  $sql_ex_name="select * from `courses` where `id`=".$video['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();
	 */ 
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $video['video_name'];?></td><td><?php echo $video['video'];?></td><td><a href="update_videos.php?id=<?php echo $video['id'];?>">update</a></td><td><a href="manage_videos.php?id=<?php echo $video['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
