<?php
include_once('header.php');
include_once('backend/code/config.php');
$id=$_GET['id'];
$title=$_GET['name'];

?>
<html>
<head>
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
 <h2>COURSE PACKAGES</h2>
<div class="center">
<table id="tab-packages">


<?php
   $sql_package="select * from `course_packages` where `course_id`=".$id;
   $result_package=get_data($sql_package);
   $packages=$result_package->fetchAll();
   $sr=1;
   foreach($packages as $package)
   {
?>	   
<tr><td>PACKAGE NAME:</td><td><?php echo $package['package_name'];?></td></tr>
 <tr><td>DURATION:</td><td><?php echo $package['duration'];?></td></tr>
<tr><td>FEE:</td><td> <?php echo $package['fee'];?></td></tr>
<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
