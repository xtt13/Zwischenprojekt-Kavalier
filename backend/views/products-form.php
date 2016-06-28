<div class="body-wrapper">

  <h3 class="headline"><?php echo $title ?></h3>


  <section class="form-new">
    <form class="" action="index.html" method="post">
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
          <input type="text" name="product-price" class="form-input" value="<?php echo $product['price']; ?>€">
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

        <div class="upload-wrapper">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

          <span id="filename">Select your file</span>
          <label for="file-upload">Browse<input type="file" id="file-upload"></label>

        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Other Image</h2>
        </div>

        <div class="upload-wrapper">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

          <span id="filename">Select your file</span>
          <label for="file-upload">Browse<input type="file" id="file-upload"></label>

        </div>
        <div class="upload-wrapper">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

          <span id="filename">Select your file</span>
          <label for="file-upload">Browse<input type="file" id="file-upload"></label>

        </div>

        <div class="form-wrapper">
          <input type="submit"  class="save-button" value="Save">
        </div>
      </fieldset>
    </form>
  </section>
  </div>
