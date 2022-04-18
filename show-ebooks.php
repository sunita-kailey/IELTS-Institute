
<?php
$_title=$_GET['name'];?>
<title><?php echo $title;?>
<?
include_once('header.php');
include_once('backend/code/config.php');

   $id=1;
   $sql_book="select * from `e_books`  where `course_id`=".$id;
   $result_book=get_data($sql_book);
   $books=$result_book->fetchAll();
   foreach($books as $book)
   {
	 ?>
 <h5><?php echo $book['name'];?></h5>
 <h5><?php echo $book['description'];?></h5>
 <h5><?php echo $book['link'];?></h5>

  <a href="show-ebooks.php?id=<?php echo $book['id'];?>">click here to read pdf</a>
<?php
   }
include_once('footer.php');
?>
  
