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
 <h2>RECENT SUCCES STORIES</h2>
<div class="center">
<table class="tab-sstory">


<?php
   $sql_story="select * from `success_stories`";
   $result_story=get_data($sql_story);
   $stories=$result_story->fetchAll();
   $sr=1;
   foreach($stories as $story)
   {
	   
	   $sql_ex_name="select * from `courses` where `id`=".$story['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();
?>	 
<tr><td><img src="backend/uploads/success_story_images/<?php echo $story['pic'];?>"</tr>  
<tr><td><?php echo $story['student_name'];?></td></tr>
 <tr><td><?php echo $ex_name[0]['course_name'];?></td></tr>
<tr><td> <?php echo $story['exam_date'];?></td></tr>

<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
