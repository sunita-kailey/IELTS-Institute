<?php
include_once('header.php');
include_once('backend/code/config.php');
$id=$_GET['id'];

?>
<html>
<head>
<title><?php echo "our packages" ?></title>
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

<h2>COURSE PACKAGES</h2>



<?php
   $sql_package="select * from `course_packages` where `course_id`=".$id;
   $result_package=get_data($sql_package);
   $packages=$result_package->fetchAll();
   $sr=1;
   foreach($packages as $package)
   {
?>	
<div class="pack-body">   
<h4>PACKAGE NAME:<?php echo $package['package_name'];?></h4>
 <h5>DURATION:<?php echo $package['duration'];?></h5>
<h5>FEE:</td><td> <?php echo $package['fee'];?></h5>
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
