
<!doctype html>
<?php
include_once('header.php');
$title=$_GET['name'];
?>
<html>
<head>
<title><?php echo $title ?></title>
<style>
.card a
{
	color:green;
	text-decoration:underline;
}
</style>

 <link rel="stylesheet" href="cardcss.css" type="text/css"></head>

<?php
include_once('backend/code/config.php');
?>

	
	
	
	  
		   
			<h1 class="text-center">OUR E-BOOKS</h1>
		<div class="rows">
		   <?php
		         $sql="select * from `e_books`";
   $result=get_data($sql);
   $books=$result->fetchAll();
   $sr=1;
   foreach($books as $book)
   {
	 $sql_ex_name="select * from `courses` where `id`=".$book['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll(); 
?>	 
                   
						  <div class="card">
						       <!-- <img src="backend/uploads/e_books/<?php/* echo $book['link'];*/?>" alt="image">-->
								
								<div class="card-container">
								<h3><?php echo $book['name'];?></h3>
								<h4><?php echo $book['description'];?></h4>
								<a href="book.php?id=<?php echo $book['id'];?>">click here to read pdf</a>
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