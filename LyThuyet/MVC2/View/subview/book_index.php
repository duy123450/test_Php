<?php
foreach ($data as $key => $value) 
        {
        	?>
       
        <div class="templatemo_product_box">
            	<h1><?php echo $value['book_name'] ?>  <span>(tac gia)</span></h1>
   	      <img src="<?php echo BASE_URL ?>/images/book/<?php echo $value['img'] ?>" alt="image" />
                <div class="product_info">
                	<p>Etiam luctus. Quisque facilisis suscipit elit. Curabitur...</p>
                  <h3>$55</h3>
                    <div class="buy_now_button"><a href="subpage.html">Buy Now</a></div>
                    <div class="detail_button"><a href="index.php?controller=Book&action=detail&book_id=<?php echo $value['book_id'] ?>">Detail</a></div>
                </div>
                <div class="cleaner">&nbsp;</div>
            </div>
        <?php
        if ($key %2==0) echo '<div class="cleaner_with_width">&nbsp;</div>';
        else echo '<div class="cleaner_with_height">&nbsp;</div>';
        }
        ?>          
         