<?php
include_once('header.php');
include_once('backend/code/config.php');
?>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
 <h2>OUR REVIEWS</h2>
<div class="center">
<table>


<?php
   $sql_review="select * from `reviews`";
   $result_review=get_data($sql_review);
   $reviews=$result_review->fetchAll();
   $sr=1;
   foreach($reviews as $review)
   {
?>	   
<tr><td><?php echo $review['review'];?></td></tr>
<tr><td><?php echo $review['name'];?></td></tr>
<?php
   }
?>
</table>
</div>
<?php
include_once('footer.php');
?>
</html>  
