<?php
ob_start();
include_once('backend/code/config.php');

include_once('header.php');
if(isset($_POST['flag'])&& $_POST['flag']=='submit')
{
	
		$sql="insert into `call_request`(`name`,`contact_number`,`e_mail`,`city`,`query`) values('".$_POST['name']."','".$_POST['contact_number']."','".$_POST['e_mail']."','".$_POST['city']."','".$_POST['query']."')";
		$result=insert_data($sql);
	    if($result==1)
	    {
		  ob_clean();
		  header('location:new3index.php?msg=Record Inerted');
	    }
	    else
	    {
		 ob_clean();
		 header('location:new3index.php?msg=Record Not Inserted');
	    }

 }
		 
 
?>

<div class="tab-call" style="margin:30px 250px; ">
<h2>SEND US YOUR QUERY</h2>

 <form method="POST">
 
     <?php
	     if(isset($_GET['msg']))
		 {
			 echo $_GET['msg'];
		 }
	  ?>
	 <br> 
	 <div class="tab-call-container">
    
	 <input type="text" name="name" placeholder=" YOUR NAME" ><br><br>
	 
	 
	 <input type="text" name="contact_number" placeholder="CONTACT NUMBER"><br><br>
	 
	 
	 <input type="text" name="e_mail" placeholder="YOUR E-MAIL"><br><br>
	 
	 
	 <input type="text" name="city" placeholder="YOUR CITY"><br><br>
	 
	 <input type="text" name="query" placeholder="YOUR QUERY""><br><br>
	 
	 

	 
	  
	 <input type="date" name="date" placeholder="Today's date ><br><br>
	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="SUBMIT">
	 </div>
</form>
</div>

<?php include_once('footer.php');?>
	 
