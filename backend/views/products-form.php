<div class="body-wrapper">

  <h3 class="headline"><?php echo $title ?></h3>


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
          <textarea name="porduct-description" rows="15" cols="50" class="form-textarea" value=""><?php echo $product['description']; ?></textarea>
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Category</h2>
          <div class="select-wrapper">
            <select class="" name="category">
              <?php foreach($categories as $category) : ?>
              <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $product['category']){
                echo 'selected';
              } ?>><?php echo $category['category_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
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

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

          <span id="filename">

          <?php if(isset($image_main)){
              echo $image_main;
            }else{
              echo "Select your file";
          } ?>

          </span>
          <label for="file-upload">Browse<input type="file" id="file-upload" name="file_upload"></label>

        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Other Image</h2>
        </div>

        <div class="form-wrapper">
        <?php
        $image_other = $product["image_other"];

         if(isset($image_main)){
           echo "<a class='image-link'><img src='../images/$image_other' alt='$image_other'></a>";
         } ?>
       </div>

        <div class="upload-wrapper">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

          <span id="filename">

            <?php if(isset($image_other)){
                echo $image_other;
              }else{
                echo "Select your file";
            } ?>

        </span>
          <label for="file-upload" name="image_other">Browse<input type="file" id="file-upload"></label>

        </div>

        <div class="form-wrapper">
          <input type="submit"  class="save-button" value="<?php echo $submit_button_text?>"></input>
        </div>
      </fieldset>
    </form>
  </section>
  </div>
