<?php
ob_start();
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `e_books` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_ebooks.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_ebooks.php?msg=Record Not Deleted');
	}
}
?>

<div class="container">
<h2>Manage ebooks Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Book Name</th><th>Exam name</th><th>About book</th><th>link</th><th colspan="2">Operations</th>
<?php
   $sql_book="select * from `e_books` order by `name`";
   $result_book=get_data($sql_book);
   $books=$result_book->fetchAll();
   $sr=1;
   foreach($books as $book)
   {
	   
	   $sql_ex_name="select `course_name` from `courses` where `id`=".$book['course_id'];
	   $result_ex_name=get_data($sql_ex_name);
	   $ex_name=$result_ex_name->fetchAll();
	   
	
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $book['name'];?></td><td><?php echo $ex_name[0]['course_name'];?></td><td><?php echo $book['description'];?></td><td><?php echo $book['link'];?></td><td><a href="update_ebooks.php?id=<?php echo $book['id'];?>">update</a></td><td><a href="manage_ebooks.php?id=<?php echo $book['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
