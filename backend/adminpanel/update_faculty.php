<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_fclty="select * from `faculty` where `id`=".$id;
	$result_fclty=get_data($sql_fclty);
	$fcltys=$result_fclty->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		  if(isset($_POST['check']))
		      {
		       $facul_query="select * from `faculty` where `id`=".$fcltys[0]['id'];
			$facul_query_run=get_data($facul_query);
			$newpic=$_FILES['newpic']['name'];
			
			foreach($facul_query_run as $fa_row)
			{
		      if($newpic==NULL)
			  {
				  $pic_data=$fa_row['pic'];
			  }
			  else
			  {
				$pic_data=$_FILES['newpic']['name'];
				$folder="../uploads/faculty_images/".$_FILES['newpic']['name'];
	            if (move_uploaded_file($_FILES['newpic']['tmp_name'],$folder))
		        {
		           	$msg="Image Uploaded Successfully";
	            }
		        else
		        {
		         	$msg="Failed to upload image";
		        }
		         unlink("../uploads/faculty_images/".$_POST['imgx']);
			  }
			}
	
		    $sql_upd="update `faculty` set `name`='".$_POST['name']."',`position`='".$_POST['position'].
			"',`qualification`='".$_POST['qualification']."',`experience`='".$_POST['experience'].
			"',`expertise`='".$_POST['expertise']."',`experience`='".$_POST['experience'].
			"',`pic`='".$pic_data."' where id=".$_POST['fclty_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 
		
			     ob_clean();
			      header('location:manage_faculty.php?msg=Record Updateed');
		      }
		      else
		     {
			    header('location:manage_faculty.php?msg=Record not updated');
		      }
		   }
		  else
		 {
			echo"please check the check box";
		 }
	}
		
	
?>


<div class="center">
<h2>Update FACULTY Details</h2>
<form action="" method="POST" enctype="multipart/form-data">
     <?php 
	      if(isset($_GET['msg']))
		  {
			  echo $_GET['msg'];
		  }
	?>
      <input type="hidden" name="fclty_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  <label for="name"> Name</label>
	  <input type="text" name="name" value="<?php echo $fcltys[0]['name']?>"><br><br>
	  
	  
	    <label for="position">POSITION</label>
	 <input type="text" name="position" id="position" value="<?php echo $fcltys[0]['position']?>"><br><br>
	
	
	
	 <label for="qualification">QUALIFICATION</label>
	 	  <input type="text" name="qualification" value="<?php echo $fcltys[0]['qualification']?>"><br><br>

	 

	 <label for="expertise">EXPERTISE</label>
	 	  <input type="text" name="expertise" value="<?php echo $fcltys[0]['expertise']?>"><br><br>
		  
		   <label for="experience">EXPERIENCE</label>
	 	  <input type="text" name="experience" value="<?php echo $fcltys[0]['experience']?>"><br><br>
		
		
     <label for="oldpic">Old Image</label>
	 <img src="../uploads/faculty_images/<?php echo $fcltys[0]['pic'];?>"/><br><br>
		
	 <label for="newpic">Select a file</label>
	      <input type="file" id="newpic" name="newpic" accept=".jpg, .png, .jpeg"><br><br>
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="hidden" name="imgx" id="imgx" value="<?php echo $fcltys[0]['pic'];?>">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 