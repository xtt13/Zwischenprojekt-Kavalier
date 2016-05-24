<div class="body-wrapper">

  <h3 class="headline">New Product</h3>

<section class="product-form">


  <form class="" action="index.html" method="post">
    <fieldset>

      <div class="product-form ">
        <h2 class="form-headline">Name</h2>
        <label for="product-name"></label>
        <input type="text" name="product-name" class="product-name" value="">
      </div>

      <div class="product-form">
        <h2 class="form-headline">Price</h2>
        <label for="product-price"></label>
        <input type="text" name="product-price" class="product-price" value="">
      </div>

      <div class="sale-wrapper">
        <label for="Sale">Sale</label>
        <input type="checkbox" name="sale" value="Sale">
      </div>

      <div class="product-form">
        <h2 class="form-headline">Description</h2>
        <textarea name="porduct-description" rows="8" cols="40" class="product-description"></textarea>
      </div>

      <div class="category-radio-wrapper">

        <h2 class="form-headline">Category</h2>

        <div class="category">
          <label for="category" class="category-radio-headline">Category1</label>
          <input type="radio" name="category"class="category-input" value="Category1">
        </div>

        <div class="category">
          <label for="category" class="category-radio-headline">Category2</label>
          <input type="radio" name="category"class="category-input" value="Category1">
        </div>

      </div>


      <div class="product-form">
        <h2 class="form-headline">Main Image</h2>
      </div>

      <div class="upload-wrapper">
        <label for="product-image_main" class="choose-file-button-label"></label>

        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

        <input name="product-image_main" class="choose-file-button" type="file" id="product-image_main">

        <input name="upload" type="submit" class="upload-button" id="upload" value=" Upload ">

      </div>

      <div class="product-form">
        <h2 class="form-headline">Other Image</h2>
      </div>

      <div class="upload-wrapper">
        <label for="product-image_main" class="choose-file-button-label"></label>

        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

        <input name="product-image_main" class="choose-file-button" type="file" id="product-image_main">

        <input name="upload" type="submit" class="upload-button" id="upload" value=" Upload ">

      </div>


      <div class="product-form">
        <input type="submit"  class="save-button" value="Save">
      </div>
    </fieldset>
  </form>
  </section>
  </div>
