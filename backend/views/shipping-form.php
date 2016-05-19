<form action="#" method="post">
  <fieldset>
    <h3 class="shipping-form">Shippingadress</h3>
    <input class="shipping-adress" type="text" name="adress" placeholder="Street and Number"><br>

    <!-- <div class="short"> -->
      <input class="shipping-zip" type="text" name="zip" placeholder="Zip"><br>
      <input class="shipping-country" type="text" name="country" placeholder="Country"><br>
    <!-- </div> -->

    <!-- <div class="shipping-alternative-wrapper"> -->
      <input class="shipping-alternative" id="shipping-alternative" value="alt_shipping_adress" type="checkbox" name="alternative_checkbox" checked>
      <label class="shipping-alternative-label" for="shipping-alternative"><span></span>Alternative Invoiceadress</label>
    <!-- </div> -->


    <input class="invoice-adress" type="text" name="alt-adress" placeholder="Street and Number" disabled><br>

    <!-- <div class="short"> -->
      <input class="invoice-zip" type="text" name="alt_zip" placeholder="Zip" disabled><br>
      <input class="invoice-country" type="text" name="alt_country" placeholder="Country" disabled><br>
    <!-- </div> -->

    <h3 class="shipping-form">Payment</h3>

    <!-- <div class="checkboxes-wrapper"> -->
      <!-- <div class="on-invoice-wrapper"> -->
        <input class="on-invoice" id="on-invoice-label" name="payment" value="oninvoice" type="radio">
        <label class="on-invoice-label" for="on-invoice-label"><span></span>On Invoice</label>
      <!-- </div> -->

      <!-- <div class="lastname-wrapper"> -->
        <input class="lastname" id="lastname-label" name="payment" value="lastname" type="radio">
        <label class="lastname-label" for="lastname-label"><span></span>Lastname</label>
      <!-- </div> -->

      <!-- <div class="prepayment-wrapper"> -->
        <input class="prepayment" id="prepayment-label"  value="prepayment" name="payment" type="radio">
        <label class="prepayment-label" for="prepayment-label"><span></span>Prepayment</label>
      <!-- </div> -->
    <!-- </div> -->

    <!-- <button class="shipping-submit" name="button-sbm" type="submit" value="Next">Next!</button> -->
  </fieldset>
</form>
