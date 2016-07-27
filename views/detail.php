  <div class="wrapper-page detail">

    <div class="wrapper-detail">
      <a class='backlink' href="index.php?site=store">&#10229; Back!</a>
      <div id="slider">
        <a href="#" class="control_next"></a>
        <a href="#" class="control_prev"></a>
        <ul>
          <li><img class="slider-image" src="images/<?php echo $products['0']['image_main']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>

          <?php
            foreach ($images_other_array as $image) {
                echo "<li><img class='slider-image' src='images/$image' alt=''></li>";
            } ?>

          <li><img class="slider-image" src="images/<?php echo $products['0']['image_main']; ?>" alt="<?php echo $products['0']['product_name']; ?>"></li>

            <?php
            // Doppelte Images (Pfusch ;-) )
            foreach ($images_other_array as $image) {
                echo "<li><img class='slider-image' src='images/$image' alt=''></li>";
            }
           ?>

        </ul>
      </div>


      <form class="" action="index.php?site=detail&amp;id=<?php echo $id; ?>&amp;action=add-to-bag" method="post">
        <div class="wrapper-information">
          <h1><?php echo $products['0']['product_name']; ?></h1>
          <p class="product-info"><?php echo $products['0']['description']; ?></p>
          <p class="product-price"><?php echo $products['0']['price']; ?>€</p>

          <input class='hidden-product-name' type="hidden" name="product_name" value="<?php echo $products['0']['product_name']; ?>">
          <input class='hidden-product-price' type="hidden" name="price" value="<?php echo $products['0']['price']; ?>">
          <input class='hidden-product-id' type="hidden" name="id" value="<?php echo $products['0']['id']; ?>">

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
  <?php if(isset($at_least_one_product)): ?>
  <section class="other-products">
    <h2>You might also like:</h2>
    <ul>

      <?php foreach ($products_other as $product) {

        $name = $product['product_name'];
        $image = $product['image_main'];
        $price = $product['price'];
        $sale = $product['sale'];
        $id = $product['id'];

        echo "<li>";

        if($sale == 1) {
          echo "<p class='sale'>SALE!</p>";
        }

        echo "
          <a class='image-link' href='index.php?site=detail&id=$id'><img src='images/$image' alt=''></a>
          <div><a class='title-link' href='index.php?site=detail&id=$id'>$name</a><a class='price-link' href='index.php?site=detail&id=$id'>$price €</a></div>
          <a class='view-link' href='index.php?site=detail&id=$id'>View Item</a>
        </li>";
      }
      ?>

    </ul>
  </section>
  <?php endif; ?>
