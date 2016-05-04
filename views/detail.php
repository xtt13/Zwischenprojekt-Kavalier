<?php

  $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($link, $sql) or die(mysqli_error($link));

    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //print_r($products);
 ?>


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

      <div class="wrapper-information">
        <h1><?php echo $products['0']['product_name']; ?></h1>
        <p class="product-info"><?php echo $products['0']['description']; ?></p>
        <p class="product-price"><?php echo $products['0']['price']; ?>€</p>
        <select class="" name="">
          <option value="0">Quantity</option>

          <?php
          for($i=1;$i<=$products['0']['stock'];$i++){
            echo "<option value='$i'>$i</option>";
          }
          ?>

        </select>
        <div class="wrapper-information-wrapper">
          <a href="index.php?site=detail&amp;id=<?php echo $products['0']['id']; ?>&amp;action=addtobag" class="add-to-bag">Add to bag</a>
          <a href="index.php?site=bag" class="show-bag">Show Bag</a>
        </div>
      </div>
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
