
  <div class="wrapper-page detail">
    <div class="wrapper-detail">

      <div id="slider">
        <a href="#" class="control_next"></a>
        <a href="#" class="control_prev"></a>
        <ul>
          <li><img class="slider-image" src="images/<?php echo $products['0']['image_main']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>
          <li><img class="slider-image" src="images/<?php echo $products['0']['image_other']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>
          <li><img class="slider-image" src="images/<?php echo $products['0']['image_other']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>
          <li><img class="slider-image" src="images/<?php echo $products['0']['image_other']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>
        </ul>
      </div>

      <form class="" action="index.php?site=detail&amp;id=<?php echo $id; ?>&amp;action=add-to-bag" method="post">
        <div class="wrapper-information">
          <h1><?php echo $products['0']['product_name']; ?></h1>
          <p class="product-info"><?php echo $products['0']['description']; ?></p>
          <p class="product-price"><?php echo $products['0']['price']; ?>€</p>

          <input type="hidden" name="product_name" value="<?php echo $products['0']['product_name']; ?>">
          <input type="hidden" name="price" value="<?php echo $products['0']['price']; ?>">
          <input type="hidden" name="id" value="<?php echo $products['0']['id']; ?>">

          <select class="detail-select" name="quantity">
            <option value="0">Quantity</option>

            <?php
            for($i=1;$i<=$products['0']['stock'];$i++){
              echo "<option value='$i'>$i</option>";
            }
            ?>

          </select>


          <?php

          // Wenn es weniger als 5 Artikel eines Produktes gibt --> Alert Message
          if($products['0']['stock'] < 5){
            $quantity_products = $products['0']['stock'];
            echo "<p class='detail-quantity-alert'>Only $quantity_products products left!</p>";
          }

          // Quantity-Error bei 0 Produkten im Select
          if(isset($quantity_error)){
            echo "<p class='quantity-error'>$quantity_error</p>";
          }

          // Success Message bei erfolgreichem Hinzufügen zum Bag
          if(isset($quantity_success)){
            echo "<p class='quantity-success'>$quantity_success</p>";
          }
           ?>

          <div class="wrapper-information-wrapper">
            <button class="add-to-bag" type="submit" name="button">Add To Bag</button>
            <a href="index.php?site=bag" class="show-bag">Show Bag</a>
          </div>
        </div>
      </form>

    </div>
  </div>
  <section class="other-products">
    <h2>You might also like:</h2>
    <ul>
      <li>
        <p class="sale">SALE!</p>
        <a class="image-link" href="#"><img src="images/product-image.jpeg" alt=""></a>
        <div><a class="title-link" href="detail.html">Gentlemen's Set</a><a class="price-link" href="">89,99€</a></div>
        <a class="view-link" href="">View Article</a>
      </li>
      <li>
        <p class="sale">SALE!</p>
        <a class="image-link" href="detail.html"><img src="images/product-image.jpeg" alt=""></a>
        <div><a class="title-link" href="detail.html">Gentlemen's Set</a><a class="price-link" href="">89,99€</a></div>
        <a class="view-link" href="detail.html">View Article</a>
      </li>
      <li>
        <p class="sale">SALE!</p>
        <a class="image-link" href="detail.html"><img src="images/product-image.jpeg" alt=""></a>
        <div><a class="title-link" href="detail.html">Gentlemen's Set</a><a class="price-link" href="">89,99€</a></div>
        <a class="view-link" href="detail.html">View Article</a>
      </li>
    </ul>
  </section>
