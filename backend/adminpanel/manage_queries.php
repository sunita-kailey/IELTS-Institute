<?php
ob_start();
include_once('header.php');

$msg="";
if(isset($_GET['flag']) && $_GET['flag']=='delete')
{
	$msg='Record Not Deleted';
	$id=$_GET['id'];
	$sql="delete from `call_request` where `id`=".$id;
	$count=delete_data($sql);
	if($count==1)
	{
		ob_clean();
		header('location:manage_queries.php?msg=Record Deleted');
	}
	else
	{
		ob_clean();
		header('location:manage_queries.php?msg=Record Not Deleted');
	}
}
?>

<div class="container">
<h2>Manage Queries</h2>
<table id="tab">
<?php
  if(isset($_GET['msg']))
  {
	  echo $_GET['msg'];
  }
?>
  <tr><th>Sr.No.</th><th>Name</th><th>contact_number</th><th>e_mail</th><th>city</th><th>query</th><th>date</th><th colspan="2">Operations</th></tr>
<?php
   $sql="select * from `call_request` order by `date` desc";
   $result=get_data($sql);
   $queries=$result->fetchAll();
   $sr=1;
   foreach($queries as $query)
   {
	
	   
	   
?>
<tr><td><?php echo $sr;?></td><td><?php echo $query['name'];?></td><td><?php echo $query['contact_number'];?></td><td><?php echo $job['e_mail'];?></td><td><?php echo $job['e_mail'];?></td><td><?php echo $query['city'];?></td><td><?php echo $query['query'];?></td><td><?php echo $query['date'];?></td><td><a href="update_queries.php?id=<?php echo $job['id'];?>">update</a></td><td><a href="manage_queries.php?id=<?php echo $query['id'];?>&flag=delete">Delete</a></td></tr>

<?php
   $sr=$sr+1;
   }
?>
</table>
</div>
<?php include_once('footer.php');?>
  
