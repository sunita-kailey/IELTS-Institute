
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

	
	
	
	  
		   
			<h1 class="text-center">OUR SUCCESS STORIES</h1>
		<div class="rows">
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
                   
						  <div class="card">
						        <img src="backend/uploads/success_story_images/<?php echo $story['pic'];?>" alt="image">
								
								<div class="card-container">
								<h3><?php echo $story['student_name'];?></h3>
								<h4><?php echo $story['exam_date'];?></h4>
								<p>
								     <?php 
									 echo $ex_name[0]['course_name'];?>
								
							    </p>
							</div>	
	
                    </div>
						
						<?php
   }

   ?>
 
 </div>
							

	
	
<?php include_once('footer.php');
?>