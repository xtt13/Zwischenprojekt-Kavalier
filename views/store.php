
  <div class="wrapper-page shop">
    <div class="wrapper-categories">
      <h1>Categories</h1>
      <ul>
        <li><a class='store-category<?php if(!isset($_GET['category']) && $_GET['site'] == 'store'){ echo " category-underline'";} ?>' href='index.php?site=store'>All Products</a></li>
        
        <?php
        foreach ($categories as $category) {
          $category_id = $category['id'];
          $category = $category['category'];

          echo "<li><a class='store-category ";

          if(isset($_GET['category']) && $_GET['category'] == $category){ echo "category-underline";}


          echo" 'href='index.php?site=store&category=$category_id'>$category</a></li>";
        }
        ?>

      </ul>
        <form action="" method="post">
          <input class='store-checkbox' type="checkbox" value="None" id="sale" checked name="checkbox-sale"/>
          <label class='store-checkbox-sonderangebote'for="sale"><span></span>SALE</label>
        </form>
    </div>

    <div class="wrapper-products">
      <div class="wrapper-selection">
        <p>Showing <span><?php if(isset($results)){echo $results;} ?></span> results</p>
        <form action='' method='post'>
          <select class="select-view" name="view-products" id="blabla">
            <option value="12" <?php if(isset($perPage) && $perPage == 12){echo 'selected';} ?>>VIEW 12 PRODUCTS</option>
            <option value="24" <?php if(isset($perPage) && $perPage == 24){echo 'selected';} ?>>VIEW 24 PRODUCTS</option>
          </select>

          <select class="select-price" name="sort-price" id="blablaaa">
            <option value="">SORT PRICE</option>
            <option value="low-to-high" <?php if(isset($low_to_high)){echo $low_to_high;} ?>>Low to High</option>
            <option value="high-to-low" <?php if(isset($high_to_low)){echo $high_to_low;} ?>>High to Low</option>
          </select>
        </form>
      </div>
      <div class="wrapper-all-products">
        <ul>
          <?php
          //print_r($products);


          // Foreach Schleife um Produkt-Div zu befüllen
          foreach($products as $product){

          $id = $product['id'];
          $name = $product['product_name'];
          $price = $product['price'];
          $sale = $product['sale'];
          $image_main = $product['image_main'];
          $sale = $product['sale'];

            echo "<li>";

            // Wenn SALE == 1 dann füge <p>-sale ein
            if($sale == 1) {
              echo "<p class='sale'>SALE!</p>";
            }

            echo "
              <a class='image-link' href='index.php?site=detail&id=$id'><img src='images/$image_main' alt='Nailkit'></a>
              <div><a class='title-link' href='index.php?site=detail&id=$id'>$name</a><a class='price-link' href='index.php?site=detail&id=$id'>$price €</a></div>
              <a class='view-link' href='index.php?site=detail&id=$id'>View Item</a>
            </li>";
          }

          ?>

        </ul>

        <?php
        if(!isset($_GET['category']) && !isset($_GET['action'])){
          if($pages > 1){
            echo "<a class='pagination-prev' href='?site=store&page=$prevpage&per-page=$perPage'><</a>";
            for($x=1; $x <= $pages; $x++){
              echo "<a href='?site=store&page=$x&per-page=$perPage' class='pagination ";
              if($page === $x){echo "selected-page";}
              echo "'>$x</a>";
            }
            if($nextpage >= $pages){
              echo "<a class='pagination-next' href='?site=store&page=$pages&per-page=$perPage'>></a>";
            } else {
              echo "<a class='pagination-next' href='?site=store&page=$nextpage&per-page=$perPage'>></a>";
            }

          }
        }
        ?>

      </div>
    </div>
</div>
