<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql="select * from `e_books` where `id`=".$id;
	$result=get_data($sql);
	$books=$result->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		if(isset($_POST['check']))
		{
		    $query="select * from `e_books` where `id`=".$books[0]['id'];
			$query_run=get_data($query);
			$newlink=$_FILES['newlink']['name'];
			
			foreach($query_run as $fa_row)
			{
		      if($newlink==NULL)
			  {
				  $pic_data=$fa_row['link'];
			  }
			  else
			  {
				$pic_data=$_FILES['newlink']['name'];
				$folder="../uploads/e_books/".$_FILES['newlink']['name'];
	            if (move_uploaded_file($_FILES['newlink']['tmp_name'],$folder))
		        {
		           	$msg="e-book Uploaded Successfully";
	            }
		        else
		        {
		         	$msg="Failed to upload e-book";
		        }
		         unlink("../uploads/e_books/".$_POST['imgx']);
			  }
			}
	
		    $sql_upd="update `e_books` set `name`='".$_POST['name']."',`course_id`='".$_POST['course_id']."',`description`='".$_POST['description']."',`link`='".$pic_data."' where id=".$_POST['book_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 ob_clean();
			 header('location:manage_ebooks.php?msg=Record Updated');
		    }
		    else
		    {
			 header('location:manage_ebooks.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update E_BOOK Details</h2>
<form action="" method="POST" enctype="multipart/form-data">
     <?php 
	      if(isset($_GET['msg']))
		  {
			  echo $_GET['msg'];
		  }
	?>
      <input type="hidden" name="book_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  <label for="name"> Name</label>
	  <input type="text" name="name" value="<?php echo $books[0]['name']?>"><br><br>
	
		    <label for="course_id">Course Name</label>
	  <select name="course_id" id="course_id" required>
	 <option value="">select course</option>
	 
	
	 <?php
	    $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{
			$req="";
			if($cid['id']==$books[0]['course_id'])
			{
				$req='selected';
			}
			
			
			
			
	?>
	<option value="<?php echo $cid['id'];?>" <?php echo $req; ?> ><?php echo $cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	<br><br> 
	
	
	 <label for="">DESCRIPTION</label>
	 	  <input type="text" name="description" value="<?php echo $books[0]['description']?>"><br><br>
		  
		
     <label for="oldlink">Old LINK</label>
	 <a href="../uploads/e_books/<?php echo $books[0]['link'];?>"/> click here to read old book</a><br><br><br>
		
	 <label for="newlink">Select a file</label>
	      <input type="file" id="newlink" name="newlink" accept=".pdf, .txt"><br><br>
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="hidden" name="imgx" id="imgx" value="<?php echo $books[0]['link'];?>">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 