<!doctype html>



<?php
include_once('header.php');
include_once('backend/code/config.php');
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>success-stories</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
	
	<div class="conatiner py-5">
	
	
	
	    <div class="row">
		    <div class="col-md-12">
			<h1 class="text-center">OUR SUCCESS STORIES</h1>
			</div>
		</div>
		<div class="row mt-4">
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
                     <div class="col-md-3 mt-3">
					      <div class="card">
						        <img src="backend/uploads/success_story_images/<?php echo $story['image'];?>" width="300px" height="200px" alt="image">
								
								<div class="card-body">
								<h4 class="card-title"><?php echo $story['student_name'];?></h4>
								<h4 class="card-title"><?php echo $story['exam_date'];?></h4>
								<p class="card-text">
								     <?php echo $story['student_name'];?>
							    </p>
								
							</div>
						</div>
						</div>
						<?php
   }

   ?>
  </div>
 </div>
							

	
	
	
	
	
	
	
	
	
	
	
	
<?php include_once('footer.php');?>	
	
  </body>
</html>