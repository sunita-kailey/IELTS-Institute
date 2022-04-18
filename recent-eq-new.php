<?php
include_once('header.php');
include_once('backend/code/config.php');
$id=$_GET['course_id'];

?>
<html>
<head>
<title><?php echo "recent exam ques" ?></title>
<link rel="stylesheet" href="style.css" type="text/css">
<style>
h4
{
	font-family:open-sans-condensed;
	color:#512b7f;
	
}
.pack-body
{
	text-align:center;
	font-family:sans-serif;
	line-height:1.5;
}
.center h2
{
	text-align:center;
	color:#f5f5f5;
	background:orange;
	padding:10px 0px;
	margin:5px 0px;
	
}
</style>
</head>
 
<div class="center">

<h2>RECENT EXAM QUESTIONS </h2>



<?php
   $sql="select * from `recent_eq` where `course_id`=".$id;
   $result=get_data($sql);
   $questions=$result->fetchAll();
   $sr=1;
   foreach($questions as $ques)
   {
?>	
<div class="pack-body">   
<!--<h4>PACKAGE NAME:<?php echo $package['package_name'];?></h4>
 <h5>DURATION:<?php echo $package['duration'];?></h5>
<h5>FEE:</td><td> <?php echo $package['fee'];?></h5>
<<h4>EXAM NAME:</td><td><?php echo $ex_name[0]['course_name'];?></td></tr>-->
<h4>MODULE:</td><td> <?php echo $ques['module_name'];?></h4>
<h5>QUESTION:</td><td><?php echo $ques['ques'];?></h5>
 <h5>EXAM DATE:</td><td><?php echo $ques['exam_date'];?></h5>


<br>
<br>
</div>
<hr>
<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
