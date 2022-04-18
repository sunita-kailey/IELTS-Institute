
	
	
	
	<?php
ob_start();
include_once('backend/code/config.php');

include_once('header.php');

if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
 ob_clean();
 header('location:recent-eq-news.php?msg=Record Inerted');
}		  
 
?>

<div class="tab-call" style="margin:30px 250px; ">
<h2>SELECT EXAM</h2>

 <form action="recent-eq-new.php" method="GET">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	  
	 <div class="tab-call-container">
	
	
	
	
	
	 
	    <label for="course_id">Course Name</label>
	  <select name="course_id" id="course_id" required>
	<option value="">SELECT COURSE</option>
	 <?php
	    $sql_cid="select * from `courses`";
		$result_cid=get_data($sql_cid);
		$cids=$result_cid->fetchAll();
		foreach($cids as $cid)
		{
	?>
	<option value="<?php echo $cid['id'];?>"><?php echo $cid['course_name'];?></a></option>
	 
	<?php
		}
	?>
    </select>	<br><br> 
	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="SUBMIT">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
