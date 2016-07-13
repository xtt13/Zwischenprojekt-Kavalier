<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($product);
echo '</pre>';


 ?>

<div class="body-wrapper">

  <h3 class="headline">Edit Product</h3>

  <section class="form-new">
    <form class="" action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
      <fieldset>

        <div class="form-wrapper">
          <h2 class="form-headline">Name</h2>
          <label for="product-name"></label>
          <input type="text" name="product-name" class="form-input" value="<?php echo $product['product_name']; ?>">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Price</h2>
          <label for="product-price"></label>
          <input type="text" name="product-price" class="form-input" value="<?php echo $product['price']; ?>">
        </div>

        <div class="checkbox-wrapper">
          <label for="Sale">Sale</label>
          <input type="checkbox" name="sale" <?php echo is_checked($product["sale"]) ?>>
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Description</h2>
          <textarea name="product-description" rows="15" cols="50" class="form-textarea" value="<?php echo $product['description']; ?>"></textarea>
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Category</h2>
          <div class="select-wrapper">

            <select class="" name="category">
              <?php foreach($categories as $category){

                $category_id = $category['id'];
                $category_name = $category['category'];

                echo "<option value='$category_id' ";



                echo ">$category_name</option>";
              }
              ?>

            </select>
          </div>
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Stock</h2>
            <label for="stock"></label>
            <input type="number" name="stock" class="form-input" value="<?php echo $product['stock']; ?>">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Main Image</h2>
        </div>

        <div class="form-wrapper">
          <?php
          $image_main = $product["image_main"];

           if(isset($image_main)){
             echo "<a class='image-link'><img src='../images/$image_main' alt='$image_main'></a>";
           } ?>
         </div>
          <div class="upload-wrapper">

            <input type="hidden" name="image[]" name="MAX_FILE_SIZE" value="2000000">

            <span id="filename">

            <?php if(isset($image_main)){
                echo $image_main;
              }else{
                echo "Select your File";
            } ?>

            </span>
            <label for="file-upload">Browse<input type="file" value='' id="file-upload" name="image[]"></label>

          </div>
       <!-- </div> -->


        <div class="form-wrapper">
          <h2 class="form-headline">Other Image</h2>
        </div>

        <div class="form-wrapper">
          <?php if(isset($other_image)){
           foreach ($other_image as $image) {
              echo "<a class='image-link'><img src='../images/$image' alt='$image'></a>";
              echo "<div class='upload-wrapper'>



                  <input type='hidden' name='MAX_FILE_SIZE' name='image2[]' value='$image'>

                  <span id='filename2'>";
                  if(isset($image)){
                      echo $image;
                    }else{
                      echo 'Select your File';
                  }
             echo "</span>
               <label for='file-upload2' name='image'>Browse<input type='file' value='' name='image2[]' id='file-upload2' multiple></label>

           </div>  ";

           }
         }?>

        <div class="form-wrapper">
          <input type="submit"  class="save-button" value="Save"></input>

          <?php if(isset($success_message)){echo '<p>' . $success_message . '</p>';} ?>
          <?php if(isset($error_message)){echo '<p>' . $error_message . '</p>';} ?>

        </div>
      </fieldset>
    </form>
  </section>
  </div>
