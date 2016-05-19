<div class="body-wrapper">

  <h3 class="headline">New Product</h3>

  <form class="" action="index.html" method="post">
    <fieldset>

      <label for="product-name">
        Name
        <input type="text" name="product-name" value="">
      </label>

      <br></br>

      <label for="product-price">
        Price
        <input type="text" name="product-price" value="">
      </label>

      <br></br>

      <label for="porduct-description">
        Description
        <input type="text" name="product-description" value="">
      </label>

      <br></br>

      <label for="category">
        <input type="radio" name="category" value="Category1">
        Category1
      </label>

      <label for="category">
      <input type="radio" name="category" value="Category2">
      Category2
      </label>

      <br></br>

      <label for="product-image_main">
        Main Image
        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input name="product-image_main" type="file" id="product-image_main">
        <input name="upload" type="submit" class="box" id="upload" value=" Upload ">
      </label>
      
      <br></br>

      <label for="Sale">
        <input type="checkbox" name="sale" value="Sale">
        Sale
      </label>

    </fieldset>
  </form>
  </div>
