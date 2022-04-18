<?php
include_once('header.php');
include_once('backend/code/config.php');
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<div class="center-out">
 <h2>OUR FACULTY</h2>
<div class="center">
<table id="tab-faculty">


<?php
   $sql_faculty="select * from `faculty`";
   $result_faculty=get_data($sql_faculty);
   $facultys=$result_faculty->fetchAll();
   $sr=1;
   foreach($facultys as $faculty)
   {
?>	   
<tr><td> NAME:</td><td><?php echo $faculty['name'];?></td></tr>
 <tr><td>POSITION:</td><td><?php echo $faculty['position'];?></td></tr>
<tr><td>QUALIFICATION:</td><td> <?php echo $faculty['qualification'];?></td></tr>
<tr><td>EXPERTISE:</td><td> <?php echo $faculty['expertise'];?></td></tr>
<tr><td>EXPERIENCE:</td><td> <?php echo $faculty['experience'];?></td></tr>
<?php
   }
?>
</table>
</div>
</div>
<?php
include_once('footer.php');
?>
</html>  
