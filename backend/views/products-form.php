<div class="body-wrapper">

  <h3 class="headline">New Product</h3>

<section class="form-new">


  <form class="" action="index.html" method="post">
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
        <input type="checkbox" name="sale" value="Sale">
      </div>

      <div class="form-wrapper">
        <h2 class="form-headline">Description</h2>
        <textarea name="porduct-description" rows="8" cols="40" class="form-textarea"></textarea>
      </div>

      <div class="radio-wrapper">

        <h2 class="form-headline">Category</h2>

        <div class="category-space">
          <label for="category1" class="form-radio-label">Category1</label>
          <input type="radio" name="category1"class="form-radio" value="Category1">
        </div>

        <div class="category-space">
          <label for="category" class="form-radio-label">Category2</label>
          <input type="radio" name="category"class="form-radio" value="Category1">
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
