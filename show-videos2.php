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
	
	<div class="conatiner py-2">
	
	
	
	    <div class="row">
		    <div class="col-md-12">
			<h1 class="text-center">OUR videos</h1>
			</div>
		</div>
		<div class="row mt-4">
		   <?php
		         $sql_video="select * from `videos`";
   $result_video=get_data($sql_video);
   $videos=$result_video->fetchAll();
   $sr=1;
   foreach($videos as $video)
   {
	 
?>	 
                     <div class="col-md-3 mt-3">
					      <div class="card">
						        <video controls>
						        <source src="backend/uploads/videos/<?php echo $video['video'];?>" width="200px" height="200px"></video>
								
								<div class="card-body">
								<h4 class="card-title"><?php echo $video['video_name'];?></h4>
								
							    </div>
						</div>
						</div>
						<?php
   }

   ?>
  </div>
 </div>
							
<?php include_once('footer.php');
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  </body>
</html>