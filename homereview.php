<table id="tab-reviews">


         <?php
          $sql_review="select * from `reviews`";
          $result_review=get_data($sql_review);
          $reviews=$result_review->fetchAll();
          $sr=1;
          foreach($reviews as $review)
          {
         ?>	   
          <tr><td><?php echo $review['r eview'];?></td></tr>
          <tr><td><?php echo $review['name'];?></td></tr>
        <?php
          }
        ?>
        </table>