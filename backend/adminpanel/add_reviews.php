<?php
ob_start();
include_once('../code/config.php');
include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
		$sql="insert into `reviews`(`name`,`review`) values('".$_POST['name']."','".$_POST['review']."')";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:add_reviews.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:add_reviews.php?msg=Record Not Inserted');
	    }

 }
		 
 
?>
<html>
<head>
<title></title>
<link rel="stylesheet" href="back_style.css" type="text/css">
</head>
<body>
<div class="center">

<h2>ADD REVIEW</h2>
 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	<div class="container">
	 <label for="name">ENTER YOUR NAME</label>
	 <input type="text" name="name" required><br><br>
	 
	 
     <label for="review">WRITE REVIEW HERE</label>
	 <input type="text" name="review" required><br><br>
	 
	
	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="Add REVIEW">
	</div>
</form>
</div>

<?php include_once('footer.php');?>
</body>
</html>
	 
