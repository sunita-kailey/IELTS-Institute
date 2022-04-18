<?php
 include_once('backend/code/config.php');
?>
<html>
  <head>
      <link rel="stylesheet" href="style.css" type="text/css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://use.fontawesome.com/b2bcab25dd.js"></script>
	  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

  </head>
  <body>
    <div id ="wrapper">
        <div id="header">
            <div class="header-top">
                <div class="header-top-left">
                   <span>contact info:</span><span><i class="fa fa-phone"></i>6778989,678798</span>
                </div>
                <div class="header-top-right">
                   <span><i class="fa fa-envelope"></i>e-mail:@makkarielts</span>
                </div>

            </div>
            <div class="header-bot">
                <div class="header-bot-left">  
                    <img src="images/logo2.png">
				</div>
                <div class="header-bot-right">
                    <p>MAKKAR IELTS AND FOREIGN LANGUAGES</p>				
                    <span>Established since 2001</span><br>
                    <span>Expertise in IELTS and Foreign Languages for exams</span><br>
                    <span>Producing the best results </span>

                </div>
            
            </div>
     
        </div>    <!--end of header-->
  
    </div>      <!--end of wrapper-->
	
	
<div class="topnav-wrap">
	<div class="topnav" id="mytopnav">
		    <a class="dropbtn" href="index.php" ><i class="fa fa-home"></i>Home
			</a>
			    <div class="dropdown">
				    <button class="dropbtn"></a><i class="fa fa-user"></i>About Us
					</button>
				   <div class="dropdown-content">
					 <a href="our-head.php?name=our-head">Our head</a>
					 <a href="sstorycard.php?name=our-success-stories">Our success stories</a>
					 <a href="facultycard.php?name=our-faculty">our faculty</a>
					 
					 
				   </div>
				</div>
				<div class="dropdown">
				    <button class="dropbtn"><i class="fa fa-certificate"></i>Courses Offered
					</button>
				   <div class ="dropdown-content">
				     <a href="ielts.php?name=ielts">IELTS</a>
					 <a href="toefl.php?name=toefl">TOEFL</a>
					 <a href="french.php?name=french">FRENCH</a>
					  <a href="german.php?name=german">GERMAN</a>
				   </div>
				</div>
				<div class="dropdown">
				  <button class="dropbtn"><i class="fas fa-comment-dollar"></i>Fee structure
				  </button>
				    <div class="dropdown-content">
						<?php
						 $sql_ex_name="select * from `courses`";
	                     $result_ex_name=get_data($sql_ex_name);
	                     $ex_names=$result_ex_name->fetchAll();
						 foreach($ex_names as $ex_name)
						 {
							 
						?>
				      <a href="package_new.php?id=<?php echo $ex_name['id'];?>"><?php echo $ex_name['course_name'];?></a>
						 <?php } ?>
					   <!--<a href="show-packages.php">French</a>
					   <a href="show-packages.php">German</a>-->
				    </div>
				</div>
				<div class="dropdown">
				     <button class="dropbtn"><i class="fa fa-book"></i>study material
					 </button>
					 <div class ="dropdown-content">
					    <a href="select_exam.php">Recent exam ques</a>
					    <a href="bookcard.php?name=e-books">e-books</a>
						<a href="videoscard.php?name=videos">videos</a>
					 </div>
					 
				</div>
				<div class="dropdown">
				     <button class="dropbtn"><i class="fa fa-phone"></i>Contact Us
					 </button>
					 <div class ="dropdown-content">
                         <a href="call_request.php?name=send-us-query">send us query</a>
                         <a href="our_socials.php?name=our-socials">our socials</a>						 
				     </div>
                </div>					 
					
					    
	</div>
</div>
