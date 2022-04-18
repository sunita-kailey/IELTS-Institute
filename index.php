<?php
 include_once('header.php');
 include_once('backend/code/config.php');
 ?>


<div class="banner"><img src="images/banner_final.jpg">

<!--<h2>WELCOME TO MAKKAR IELTS<br></h2>
   <h3>
   <li>Highly qualified trainers
   <li>Estb. since 2001
   <li>Latest Study Material
   <li>regular mock tests
   <li>Serene Ambience
   <li>Personal Counselling
</h3>-->
   
</div>
<div class="main-body">
 <div class="course-align">
 <h1>Courses We Offer</h1>
 <div class="courses">
    <h2>IELTS</h2>
	<p>The first IELTS training institute which Cambridge University Press chose as its official knowledge partner and India's No. 1 IELTS training institute is also in Jalandhar. Join MAKKAR IELTS and enable yourself to score the required bands in IELTS
	</p>
	<button class="more"><a href="ielts.php?name=ielts">more info...</a></button>
 </div>
    <div class="courses">
    <h2>TOEFL</h2>
     <p>Test of English as a foreign language (TOEFL) assesses the English aptitude of students whose native language is not English. TOEFL is based on North American English. Join MAKKAR IELTS and get ready for TOEFL.
	</p><br>
	<button class="more"><a href="toefl.php?name=toefl">more info...</a></button>
 </div>
<div class="courses">
    <h2>FRENCH</h2>
	<p>French is one of the world’s major languages. It is a main or official language not just in France, but in parts of Belgium, in parts of Canada-mainli in quebec and montreal .Join Makkar to get ready to speak french fluntly.
	</p><br>
	<button class="more"><a href="french.php?name=courses">more info...</a></button>
 </div>
<div class="courses">
    <h2>GERMAN</h2>
	<p>German is the most widely spoken language in Eurpe.Learning German language will definitely give immense benifit to the students planning to study in german.join our instituter for upto date course curriculum and latest study material.</p>
	<button class="more"><a href="german.php?german">more info...</a></button>
 </div> 
 </div>
 
     <div class="videos">
	        <h1>Our Demo Class Videos</h1>
		     <video poster="images/thumbnail1.jpg" controls>
			   <source src="vid/essayvideo.mp4" type="video/mp4">
			  </video>
			  <video poster="images/thumbnail2.jpg" controls>
			    <source src="vid/bargraphvideo.mp4" type="video/mp4">
			  </video>
			  <video poster="images/thumbnail3.jpg" controls>
			    <source src="vid/grammarvideo.mp4" type="video/mp4">
			  </video>
			 <!-- <video controls>
			    <source src="vid/bargraphvideo.mp4" type="video/mp4">
			  </video>-->
		</div>
	
		
		
		
		
	<hr style="width:100%;text-align:left;margin-left:0">	
 <div class="call-story">

   <div class="story">
       <h2>OUR SUCCESS STORIES</h2>


        <?php
          $sql_story="select * from `success_stories` limit 0,4";
          $result_story=get_data($sql_story);
          $stories=$result_story->fetchAll();
          $sr=1?>
		  <marquee behavior="scrool" direction="up" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="8">
		  <ul>
<?php		  
          foreach($stories as $story)
          {
	   
	        $sql_ex_name="select * from `courses` where `id`=".$story['course_id'];
	        $result_ex_name=get_data($sql_ex_name);
	        $ex_name=$result_ex_name->fetchAll();
       ?>  
          <li style="list-style:none;"><img src="backend/uploads/success_story_images/<?php echo $story['pic'];?>"/></li>
           <h5>NAME:<?php echo $story['student_name'];?><br>
           EXAM TAKEN:<?php echo $ex_name[0]['course_name'];?><br>
           EXAM DATE: <?php echo $story['exam_date'];?></h5>
           
        <?php
           }
        ?></ul>
		</marquee>
   </div>
	 <div class="story">
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


<div class="tab-call">
<h2>REQUEST A CALL FROM US</h2>

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
	 
	 <input type="text" name="query" placeholder="YOUR QUERY"><br><br>
	 
	 

	 
	  
	 <input type="date" name="date" placeholder="date"><br><br>
	 
	 
	 <input type="hidden" name="flag" id="flag" value="submit">
	 
	 <input type="submit" id="submit" value="SUBMIT">
	 </div>
</form>
</div>
	 

	 </div>
</div>
</div>
<?php 
   include_once('footer.php')
?>


