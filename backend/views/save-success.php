<div class="body-wrapper">

  <h3 class="headline">Saved!</h3>

  <section class="form-new">


        <div class="form-wrapper">
          <input type="submit"  class="save-button" value="Save"></input>

          <?php if(isset($success_message)){echo '<p>' . $success_message . '</p>';} ?>
          <?php if(isset($error_message)){echo '<p>' . $error_message . '</p>';} ?>

  </section>
</div>
