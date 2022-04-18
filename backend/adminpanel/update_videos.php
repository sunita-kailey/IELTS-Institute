<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_video="select * from `videos` where `id`=".$id;
	$result_video=get_data($sql_video);
	$videos=$result_video->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		if(isset($_POST['check']))
		{
		    $query="select * from `videos` where `id`=".$videos[0]['id'];
			$query_run=get_data($query);
			$newvideo=$_FILES['newvideo']['name'];
			
			foreach($query_run as $fa_row)
			{
		      if($newvideo==NULL)
			  {
				  $pic_data=$fa_row['video'];
			  }
			  else
			  {
				$pic_data=$_FILES['newvideo']['name'];
				$folder="../uploads/videos/".$_FILES['newvideo']['name'];
	            if (move_uploaded_file($_FILES['newvideo']['tmp_name'],$folder))
		        {
		           	$msg="video Uploaded Successfully";
	            }
		        else
		        {
		         	$msg="Failed to upload video";
		        }
		         unlink("../uploads/videos/".$_POST['imgx']);
			  }
			}
	
		    $sql_upd="update `videos` set `video_name`='".$_POST['video_name']."',`video`='".$pic_data."' where id=".$_POST['video_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 ob_clean();
			 header('location:manage_videos.php?msg=Record Updateed');
		    }
		    else
		    {
			 header('location:manage_videos.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update videos Details</h2>
<form action="" method="POST" enctype="multipart/form-data">
     <?php 
	      if(isset($_GET['msg']))
		  {
			  echo $_GET['msg'];
		  }
	?>
      <input type="hidden" name="video_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  <label for="videot_name">video Name</label>
	  <input type="text" name="video_name" value="<?php echo $videos[0]['video_name']?>"><br><br>
	  
	  
	   <!-- <label for="course_id">Course Name</label>
	  	 <select name="course_id" id="course_id" required>
	 <?php 
	 /*
		  $sql_ex_name="select * from `courses` where `id`=".$packages[0]['course_id'];
	        $result_ex_name=get_data($sql_ex_name);
	        $ex_name=$result_ex_name->fetchAll();*/
		
	?>	
	 <option value=""><?php /*echo $ex_name[0]['course_name']*/?></option>
	 <?php
	   /* $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{*/
	?>
	<!--<option value="<?php/* echo $cid['id'];*/?> required"><?php/* echo $cid['course_name'];*/?></option>-->
	<?php
		/*}*/
	?>
   <!-- </select>	<br><br>-->
	
	


	 

	 
     <label for="oldvideo">Old video</label>
	 <video style="width:200px;height:200px" controls>
	 <source src="../uploads/videos/<?php echo $videos[0]['video'];?>" type="video/mp4" />
	</video>	
	<br><br>
	 <label for="newvideo">Select a file</label>
	      <input type="file" id="newvideo" name="newvideo" accept=".mp4"><br><br>
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="hidden" name="imgx" id="imgx" value="<?php echo $videos[0]['video'];?>">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 