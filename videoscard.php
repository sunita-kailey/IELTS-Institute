
<!doctype html>
<?php
include_once('header.php');
$title=$_GET['name'];
?>
<html>
<head>
<title><?php echo $title; ?></title>

 <link rel="stylesheet" href="cardcss.css" type="text/css"></head>

<?php
include_once('backend/code/config.php');
?>

	
	
	
	  
	 
			<h1 class="text-center">OUR VIDEOS</h1>
		<div class="rows">
		   <?php
		         $sql="select * from `videos`";
   $result=get_data($sql);
   $videos=$result->fetchAll();
   $sr=1;
   foreach($videos as $video)
   {
	 /*$sql_ex_name="select * from `courses` where `id`=".$story['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll(); */
?>	 
                   
						  <div class="card">
						      <video controls>
						        <source src="backend/uploads/videos/<?php echo $video['video'];?>" type="video/mp4">
							</video>
								<div class="card-container">
								<h3><?php echo $video['video_name'];?></h3>
							</div>	
	
                    </div>
						
						<?php
   }

   ?>
 
 </div>
					

	
	
	
	
	
	
	
	
	
	
	
	
	
	
 <?php include_once('footer.php');
 ?>