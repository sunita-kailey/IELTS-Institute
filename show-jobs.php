<?php
include_once('header.php');
include_once('backend/code/config.php');
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
 
<div class="center">
<h2 style="background:orange; color:#f5f5f5;">JOBS AT MAKKAR IELTS</h2>
<table id="tab-jobs">


<?php
   $sql_job="select * from `jobs`";
   $result_job=get_data($sql_job);
   $jobs=$result_job->fetchAll();
   $sr=1;
   foreach($jobs as $job)
   {
?>	   
<tr><td>POSITION:</td><td><?php echo $job['position'];?></td></tr>
 <tr><td>QUALIFICATION REQUIRED:</td><td><?php echo $job['required_qualification'];?></td></tr>
<tr><td>EXPERIENCE REQUIRED:</td><td> <?php echo $job['experience_required'];?></td></tr>
<tr> <td>VACANCIES:</td><td><?php echo $job['vacancies'];?></td></tr>
<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
