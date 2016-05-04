<?php

  $sql = "SELECT * FROM products";
  $result = mysqli_query($link, $sql) or die(mysqli_error($link));

  $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>



  <div class="wrapper-page shop">
    <div class="wrapper-categories">
      <h1>Categories</h1>
      <ul>
        <li><a href="#">Suits</a></li>
        <li><a href="#">Accessoires</a></li>
        <li><a href="#">Glasses</a></li>
        <li><a href="#">Watches</a></li>
        <li><a href="#">Lighters</a></li>
        <li><a href="#">Knifes</a></li>
      </ul>
      <input type="checkbox" value="None" id="sale" name="check"/>
      <label for="sale"><span></span>Sonderangebote</label>
    </div>

    <div class="wrapper-products">
      <div class="wrapper-selection">
        <p>Showing <span>1-12</span> of 32 results</p>
        <select class="select-view" name="blabla" id="blabla">
          <option value="">VIEW 12 PRODUCTS</option>
          <option value="">1</option>
          <option value="">2</option>
        </select>
        <select class="select-price" name="blablaa" id="blablaaa">
          <option value="">SORT PRICE</option>
          <option value="">1</option>
          <option value="">2</option>
        </select>
      </div>
      <div class="wrapper-all-products">
        <ul>
          <?php
          //print_r($products);

          foreach($products as $product){

          $id = $product['id'];
           $name = $product['product_name'];
           $price = $product['price'];
           $sale = $product['sale'];
           $image_main = $product['image_main'];


            echo "<li>
            <p class='sale'>SALE!</p>
              <a class='image-link' href='index.php?site=detail&id=$id'><img src='images/$image_main' alt='Nailkit'></a>
              <div><a class='title-link' href='index.php?site=detail&id=$id'>$name</a><a class='price-link' href='index.php?site=detail&id=$id'>$price €</a></div>
              <a class='view-link' href='index.php?site=detail&id=$id'>View Item</a>
            </li>";

          }


          ?>

        </ul>
      </div>
    </div>
</div>
