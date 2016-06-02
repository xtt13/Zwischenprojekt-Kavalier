<!-- <form>



  fullname
  email
  password
  street and number
  zip and location
  country
  is_admin -->

  <div class="body-wrapper">

    <h3 class="headline">New Product</h3>

  <section class="product-form">


    <form class="" action="index.html" method="post">
      <fieldset>

        <div class="user-form">
          <h2 class="form-headline">Fullname</h2>
          <label for="fullname"></label>
          <input type="text" name="fullname" class="user-name" value="">
        </div>

        <div class="user-form">
          <h2 class="form-headline">Email</h2>
          <label for="email"></label>
          <input type="text" name="email" class="user-email" value="">
        </div>

        <div class="user-form">
          <h2 class="form-headline">Password</h2>
          <label for="password"></label>
          <input type="password" name="password" class="user-password" value="">
          <h3>Confirm Password</h3>
          <label for="password-confirm"></label>
          <input type="password-confirm" name="password-confirm" class="user-password" value="">
        </div>

        <div class="user-form">
          <h2 class="form-headline">Adress</h2>

          <h3>Street</h3>

          <label for="street"></label>
          <input type="text" name="street" class="user-adress" value="">

          <h3>Number</h3>

          <label for="number"></label>
          <input type="text" name="number" class="user-adress" value="">

          <h3>ZIP</h3>

          <label for="zip"></label>
          <input type="text" name="zip" class="user-zip" value="">

          <h3>Location</h3>

          <label for="location"></label>
          <input type="text" name="location" class="user-adress" value="">

          <h3>Country</h3>
          <label for="country"></label>
          <input type="text" name="country" class="user-adress" value="">
        </div>

        <div class="user-form">
          <label for="admin">Administrator</label>
          <input type="checkbox" name="admin" value="Admin">
        </div>



        <div class="product-form">
          <input type="submit"  class="save-button" value="Save">
        </div>
      </fieldset>
    </form>
    </section>
    </div>
