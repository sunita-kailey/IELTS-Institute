<?php
include_once('header.php');
include_once('backend/code/config.php');
$id=$_GET['course_id'];
/*$id=1;*/
?>
<html>




<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
 <h2>Recent Exam Questions</h2>
<div class="center">
<table id="tab-eq">


<?php
   $sql_ques="select * from `recent_eq` where `course_id`=".$id;
   $result_ques=get_data($sql_ques);
   $questions=$result_ques->fetchAll();
   $sr=1;
   foreach($questions as $ques)
   {
	    $sql_ex_name="select * from `courses` where `id`=".$ques['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();
	   
	   
?>	   
<tr><td>EXAM NAME:</td><td><?php echo $ex_name[0]['course_name'];?></td></tr>
 <tr><td>EXAM DATE:</td><td><?php echo $ques['exam_date'];?></td></tr>
<tr><td>MODULE:</td><td> <?php echo $ques['module_name'];?></td></tr>
<tr> <td>QUESTION:</td><td><?php echo $ques['ques'];?></td></tr>
<br>
<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
