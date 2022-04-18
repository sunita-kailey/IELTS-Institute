<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{

	
	
	
	
	$sql_chk="select * from `e_books` where `name`='".$_POST['name']."'";
	$result_book=get_data($sql_chk);
	$count=$result_book->rowCount();
    if($count==0)
	{

		$folder="../uploads/e_books/".$_FILES['book']['name'];
	    if (move_uploaded_file($_FILES['book']['tmp_name'],$folder))
		{
			$msg="book Uploaded Successfully";
		}
		else
		{
			$msg="Failed to upload book";
		}
	    $sql_book="insert into `e_books`(`name`,`course_id`,`description`,`link`) values
		('".$_POST['name']."','".$_POST['course_id']."','".$_POST['description']."','".$_FILES['book']['name']."')";
		$result=insert_data($sql_book);
		
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_ebook.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_ebook.php?msg=Record Not Inserted');
	    }
	}
	else
	{
		echo "Record Already Exists";
	}
	
		
 }
		 
 
?>


<div class="center">
<h2>Input E-Book Details</h2>

 <form action="" method="POST" enctype="multipart/form-data">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="container">
     <label for="name">Book Name</label>
	 <input type="text" name="name" ><br><br>
	 
	 <label for="course_id">Exam name</label>
	 	 <select name="course_id" id="course_id">
	 <option value="">Select course</option>
	 <?php
	    $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{
	?>
	<option value="<?php echo $cid['id'];?>"><?php echo$cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	<br><br> 
	 
	 <label for="description">About Book</label>
	 <input type="text" name="description"><br><br>
	 
	
	 
	 <label for="book">Select a file:</label>
	 <input type="file" id="book" name="book" accept=".pdf, .txt"><br><br>
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <br>
	 <input type="submit" id="submit" value="Add e-book">
	 </div>
</form>
</div>
<?php include_once('footer.php');?>
	 
