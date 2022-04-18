<?php
include_once('header.php');
include_once('backend/code/config.php');
?>
<html>
<head>
<style>
table img
{
	width:200px;
	height:200px;
}
</style>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
 <h2>videos</h2>
<div class="center">
<table class="tab-videos">


<?php
   $sql_video="select * from `videos`";
   $result_video=get_data($sql_video);
   $videos=$result_video->fetchAll();
   $sr=1;
   foreach($videos as $video)
   {
	   
	  /* $sql_ex_name="select * from `videos` where `id`=".$story['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();*/
?>	 
<tr><td>Video</td><td><video controls><source src="backend/uploads/videos/<?php echo $video['video'];?>" type="video/mp4"></video></tr>  
<tr><td>video name:</td><td><?php echo $video['video_name'];?></td></tr>

<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
