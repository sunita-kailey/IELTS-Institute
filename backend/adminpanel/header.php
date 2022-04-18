<?php
  session_start();
  $username=$_SESSION['name'];
  include_once('../code/config.php');
 





?>
<html>
<head>
    <link rel="stylesheet" href="back_style.css" type="text/css">
</head>
<body>
    <div class="header">
	    <div class="header-left">
		
	        <img src="../../images/logo2.png">
		</div>
		<div class="header-right">
		     <h3> MAKKAR IELTS AND FOREIGN LANGUAGES</h3>
			<span> Established since 2001</span><br>
			<span> Producing the best results</span><br>
			<span>British Council Certified Institution</span>
	    </div>
	</div>
   	<div class="topnav" id="mytopnav">
		    <a class="dropbtn" href="index.php" >Home
			</a>
			    <div class="dropdown">
				    <button class="dropbtn"></a>jobs
					</button>
				   <div class="dropdown-content">
					 <a href="add_jobs.php">add jobs</a>
					 <a href="manage_jobs.php">manage jobs</a>
				   </div>
				</div>
				<div class="dropdown">
				    <button class="dropbtn">Success stories
					</button>
				   <div class ="dropdown-content">
				     <a href="add_success_stories.php">add success story</a>
					 <a href="manage_sstory.php">Manage success stories</a>
				   </div>
				</div>
				<div class="dropdown">
				  <button class="dropbtn">Faculty
				  </button>
				    <div class="dropdown-content">
				      <a href="add_faculty2.php">Add faculty</a>
					   <a href="manage_faculty.php">Manage Faculty</a>
				    </div>
				</div>
				<div class="dropdown">
				     <button class="dropbtn">study material
					 </button>
					 <div class ="dropdown-content">
					    <a href="add_exam_ques.php">Add Recent exam ques</a>
						<a href="manage_ex_ques.php">manage exam ques</a>
					    <a href="add_ebook.php"> Add e-books</a>
						<a href="manage_ebooks.php">Manage e-books</a>
						<a href="add-videos.php">Add videos</a>
						<a href="manage_videos.php">manage videos</a>
						
					 </div>
					 
				</div>
				
				<div class="dropdown">
				     <button class="dropbtn">course
					 </button>
					 <div class ="dropdown-content">
						<a href="add_course.php">Add new course</a>
					   <a href="manage_course.php">Manage courses</a>
						<a href="add_package.php">add course package</a>
						<a href="manage_package.php">Manage course package</a>
					 </div>
					 
				</div>
				<div class="dropdown">
				     <button class="dropbtn"></i>Manage
					 </button>
					 <div class ="dropdown-content">
                         <a href="manage_queries.php">Manage queries</a>
                         <a href="manage_reviews.php">Manage reviews</a>						 
				     </div>
                </div>	
                
                <div class="logout-button">
                     <a href="#">Logout</a>
				</div>	 
					
					    
	</div>