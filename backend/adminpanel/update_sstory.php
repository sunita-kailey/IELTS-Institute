<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_story="select * from `success_stories` where `id`=".$id;
	$result_story=get_data($sql_story);
	$stories=$result_story->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		     $query="select * from `success_stories` where `id`=".$stories[0]['id'];
			$query_run=get_data($query);
			$newpic=$_FILES['newpic']['name'];
			
			foreach($query_run as $fa_row)
			{
		      if($newpic==NULL)
			  {
				  $pic_data=$fa_row['pic'];
			  }
			  else
			  {
				$pic_data=$_FILES['newpic']['name'];
				$folder="../uploads/success_story_images/".$_FILES['newpic']['name'];
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
	
		    $sql_upd="update `success_stories` set `student_name`='".$_POST['student_name']."',`course_id`='".$_POST['course_id']."',`exam_date`='".$_POST['exam_date']."',`result_date`='".$_POST['result_date']."',`pic`='".$pic_data."' where id=".$_POST['story_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			if(isset($_POST['check']))
			{
			 ob_clean();
			 header('location:manage_sstory.php?msg=Record Updateed');
		    }
		    else
		    {
			 header('location:manage_sstory.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update Success Story Details</h2>
<form action="" method="POST" enctype="multipart/form-data">
     <?php 
	      if(isset($_GET['msg']))
		  {
			  echo $_GET['msg'];
		  }
	?>
      <input type="hidden" name="story_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  <label for="student_name">Student Name</label>
	  <input type="text" name="student_name" value="<?php echo $stories[0]['student_name']?>"><br><br>
	  
	  
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
			if($cid['id']==$stories[0]['course_id'])
			{
				$req='selected';
			}
			
			
			
			
	?>
	<option value="<?php echo $cid['id'];?>" <?php echo $req; ?> ><?php echo $cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	<br><br> 
	
	
	 <label for="exam_date">Exam Date</label>
	 	  <input type="date" name="exam_date" value="<?php echo $stories[0]['exam_date']?>"><br><br>

	 

	 <label for="result_date">Result Date</label>
	 	  <input type="date" name="result_date" value="<?php echo $stories[0]['result_date']?>"><br><br>
		
     <label for="oldpic">Old Image</label>
	 <img src="../uploads/success_story_images/<?php echo $stories[0]['pic'];?>" style="width:200px;height:200px;"><br><br>
		
     <label for="newpic">Select a file</label>
	      <input type="file" id="newpic" name="newpic" accept=".pdf, .jpg, .jpeg"><br><br>
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="hidden" name="imgx" id="imgx" value="<?php echo $stories[0]['pic'];?>">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 
	 
	 
	 
	 
	 
	