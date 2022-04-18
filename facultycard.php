
<!doctype html>
<?php
include_once('header.php');
$title=$_GET['name'];
?>
<html>
<head>
<title><?php echo $title?></title>

 <link rel="stylesheet" href="cardcss.css" type="text/css"></head>

<?php
include_once('backend/code/config.php');
?>

	
	
	
	  
		   
			<h1 class="text-center">OUR FACULTY</h1>
		<div class="rows">
		   <?php
		         $sql_faculty="select * from `faculty`";
   $result_faculty=get_data($sql_faculty);
   $facultys=$result_faculty->fetchAll();
   $sr=1;
   foreach($facultys as $faculty)
   {
	 
?>	 
                   
						  <div class="card" style="height:375px;">
						        <img src="backend/uploads/faculty_images/<?php echo $faculty['pic'];?>" width="250px" height="150px" alt="image">
								
								<div class="card-container">
								<h3><?php echo $faculty['name'];?></h3>
								<h4><?php echo $faculty['position'];?></h4>
								<p>
								   <b>  Qualification</b>:<?php 
									 echo $faculty['qualification'];?><br>
									<b>Expertise</b>:<?php echo $faculty['expertise'];?><br>
									<b>Experience</b>:<?php echo $faculty['experience'];
									 
									 
									 
									 ?>
							    </p>
							</div>	
	
                    </div>
						
						<?php
   }

   ?>
 
 </div>
							

	
	
	<?php include_once('footer.php');
	?>