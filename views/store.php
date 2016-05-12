
  <div class="wrapper-page shop">
    <div class="wrapper-categories">
      <h1>Categories</h1>
      <ul>
        <li><a <?php if(!isset($_GET['category']) && $_GET['site'] == 'store'){ echo "class='category-underline'";} ?>href='index.php?site=store'>All Products</a></li>
        <?php

        foreach ($categories as $category) {
          $category = $category['category'];
          echo "<li><a ";

          if(isset($_GET['category']) && $_GET['category'] == $category){ echo "class='category-underline'";}

          echo" href='index.php?site=store&category=$category'>$category</a></li>";
        }



        ?>
      </ul>
        <input type="checkbox" value="None" id="sale" name="checkbox-sale"/>
        <label for="sale"><span></span>Sonderangebote</label>
    </div>

    <div class="wrapper-products">
      <div class="wrapper-selection">
        <p>Showing <span>1-12</span> of 32 results</p>
        <form action='' method='post'>
          <select class="select-view" name="view-products" id="blabla" onchange='this.form.submit()'>
            <option value="">VIEW 12 PRODUCTS</option>
            <option value="">1</option>
            <option value="">2</option>
          </select>

          <select class="select-price" name="sort-price" id="blablaaa" onchange='this.form.submit()'>
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

      </div>
    </div>
</div>
