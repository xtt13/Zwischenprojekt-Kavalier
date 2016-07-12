<div class="body-wrapper">

  <h3 class="headline">New Product</h3>

  <section class="form-new">
    <form class="" action="index.php?site=products&amp;action=save_new" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="">
      <fieldset>

        <div class="form-wrapper">
          <h2 class="form-headline">Name</h2>
          <label for="product-name"></label>
          <input type="text" name="product-name" class="form-input" value="">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Price</h2>
          <label for="product-price"></label>
          <input type="text" name="product-price" class="form-input" value="">
        </div>

        <div class="checkbox-wrapper">
          <label for="Sale">Sale</label>
          <input type="checkbox" name="sale">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Description</h2>
          <textarea name="product-description" rows="15" cols="50" class="form-textarea" value=""></textarea>
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
            <input type="number" name="stock" class="form-input">
        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Main Image</h2>
        </div>

        <div class="form-wrapper">
       </div>
        <div class="upload-wrapper">

          <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
          <span id="filename">Select your File</span>
          <label for="file-upload">Browse<input type="file" id="file-upload" name="image[]" ></label>

        </div>

        <div class="form-wrapper">
          <h2 class="form-headline">Other Image</h2>
        </div>

        <div class="form-wrapper">

          <div class="upload-wrapper">

            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <span id="filename2">Select your File</span>
            <label for="file-upload2">Browse<input type="file" id="file-upload2" name="image2[]" multiple></label>

        </div>

        <div class="form-wrapper">
          <input type="submit"  class="save-button" value="Save"></input>

          <?php if(isset($success_message)){echo '<p>' . $success_message . '</p>';} ?>
          <?php if(isset($error_message)){echo '<p>' . $error_message . '</p>';} ?>

        </div>
      </fieldset>
    </form>
  </section>
  </div>
