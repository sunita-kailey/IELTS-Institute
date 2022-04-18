<?php
include_once('header.php');
include_once('backend/code/config.php');
$title=$_GET['name'];
?>
<html>
<head>
<title><?php echo $title;?></title>
<link rel="stylesheet" href="style.css" type="text/css">
<style>
h3
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

<h2>JOBS AT MAKKAR IELTS</h2>



<?php
   $sql="select * from `jobs`";
   $result=get_data($sql);
   $jobs=$result->fetchAll();
   $sr=1;
   foreach($jobs as $job)
   {
?>	
<div class="pack-body">   
<h3>Position:<?php echo $job['position'];?></h3>
 <h5>Qualification Reqired:<?php echo $job['required_qualification'];?></h5>
<h5>Experience Required:<?php echo $job['experience_required'];?></h5>
<h5>vacancies:<?php echo $job['vacancies'];?></h5>
<br>
</div>
<hr>
<?php
   }
?>

</div>
<?php
include_once('footer.php');
?>
</html>  
