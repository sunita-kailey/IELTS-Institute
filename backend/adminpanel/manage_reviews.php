<?php
ob_start();
include_once('header.php');
$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `reviews` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_reviews.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_reviews.php?msg=Record Not Deleted');
	}
}
?>

<div class="container">

<h2>Manage Exam Ques Details</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>NAME</th><th>REVIEW</th><th>Operations</th>
<?php
   $sql_review="select * from `reviews` ";
   $result_review=get_data($sql_review);
   $reviews=$result_review->fetchAll();
   $sr=1;
   foreach($reviews as $review)
   {
	   
	 
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $review['name'];?></td><td><?php echo $review['review'];?></td><td><a href="manage_reviews.php?id=<?php echo $review['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
