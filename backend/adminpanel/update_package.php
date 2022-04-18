<?php
    ob_start();
    $id=$_GET['id'];
	include_once('header.php');
	$sql_package="select * from `course_packages` where `id`=".$id;
	$result_package=get_data($sql_package);
	$packages=$result_package->fetchAll();
	
	if(isset($_POST['flag'])&&$_POST['flag']=='update')
	{
		if(isset($_POST['check']))
		{
			$msg='Record not inserted';
		    $sql_upd="update `course_packages` set `course_id`='".$_POST['course_id']."',`package_name`='".$_POST['package_name']."',`duration`='".$_POST['duration']."',`fee`='".$_POST['fee']."' where `id`=".$_POST['pack_id'];
		    $result=update_data($sql_upd);
		    if($result==1)
		    {
			 ob_clean();
			 header('location:manage_package.php?msg=Record Updateed');
		    }
		    else
		    {
			 header('location:manage_package.php?msg=Record not updated');
		    }
		}
		else
		{
			echo"please check the check box";
		}
	}
		
	
?>


<div class="center">
<h2>Update Package Details</h2>
<form action="" method="POST">
      <input type="hidden" name="pack_id" value="<?php echo $id?>">
	  
	  
	  <div class="container">
	  
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
			if($cid['id']==$packages[0]['course_id'])
			{
				$req='selected';
			}
			
			
			
			
	?>
	<option value="<?php echo $cid['id'];?>" <?php echo $req; ?> ><?php echo $cid['course_name'];?></option>
	<?php
		}
	?>
    </select>	<br><br> 

	  
	  
	  
	  <label for="package_name">Package Name</label>
	  	  <input type="text" name="package_name" value="<?php echo $packages[0]['package_name']?>">
	
	
	
	 <label for="duration">duration</label>
	 	  <input type="text" name="duration" value="<?php echo $packages[0]['duration']?>">

	 

	 <label for="fee">Fee</label>
	 	  <input type="number" name="fee" value="<?php echo $packages[0]['fee']?>">
		  
	
		  
		  
	 <input type="hidden" name="flag" value="update">
	 
	 <input type="checkbox" name="check" value="1">
	 <input type="submit" name="submit" value="update">
	 </div>
	 
</form>
</div>
<? include_once('footer.php');?>
	 