<?php
session_start();
session_destroy();
$title="login Form";
include_once('code/config.php');
 
if(isset($_POST['flag'])&& $_POST['flag']=='login')
{
	$sql="select * from `master_login` where `phno`='".$_POST['phno']."' and `password`='".$_POST['password']."'";
	$return=get_data($sql);
	$count=$return->rowCount();
	
	echo "count=".$count;
	if($count==1)
	{
		session_start();
		$row=$return->fetchAll();
		$_SESSION['name']=$row[0]['name'];
		$_SESSION['id']=$row[0]['id'];
		header('location:adminpanel/index.php?name=index');
	}
	else
	{
		header('location:index.php?msg=wrong credentials');
	}
 
}
?>
<html>
<head>
<link rel="stylesheet" href="adminpanel/back_style.css" type="text/css">
</head>
<body>

         <div class="center">
	    <h2>Login Form</h2>
		<form action="" method="POST">
		<?php
			if(isset($_GET['msg']))
			{
				echo $_GET['msg'];
			}	
		?>
		    </br>
			<div class="container">
			<label for="phno">Phone Number</label>
			<input type="number" name="phno" minlenght="10" value="8427064922">
			
			
	
			<label for="password">Password</label>
			<input type="password" name="password" minlenght="5" value="sunita">
			
			
		<input type="hidden" name="flag" id="flag" value="login">
		
		
		    <input type="submit" id="submit" value="login">
			</div>
			
		</form>
		</div>
</body>
</html>

	