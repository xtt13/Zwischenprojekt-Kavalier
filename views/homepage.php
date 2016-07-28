
  <section class="fullscreen-above-the-fold above-the-fold">
    <h1>Kavalier</h1>
    <h2>Welcome Modern Knights!</h2>
  </section>

  <section class="fullscreen homepage-store" id="Store">
    <h2 class="headline">Store</h2>
    <ul class='hideme'>
      <li>
        <a href="index.php?site=store&amp;category=2"><img class="top-link" src="images/firestarter.jpeg" alt="Gadgets"></a><a class="bottom-link" href="index.php?site=store&amp;category=2">Gadgets</a></li>
      <li>
        <a href="index.php?site=store&amp;category=3"><img class="top-link" src="images/navywallet.jpeg" alt="Accessorize"></a><a class="bottom-link" href="index.php?site=store&amp;category=3">Accessorize</a></li>
      <li>
        <a href="index.php?site=store&amp;category=4"><img class="top-link" src="images/notebook2.jpeg" alt="Office"></a><a class="bottom-link" href="index.php?site=store&amp;category=4">Office</a></li>
    </ul>
  </section>

  <section class="fullscreen homepage-about-us" id="AboutUs">
    <h2 class="headline">About Us</h2>
    <p class='hideme'></br>
    Welcome to the KAVALIER Online Store. Explore international menswear, the KAVALIER brand world – must haves for
    modern knights!
    KAVALIER is an Linke Wienzeile design label. Our collections offer everything for a stylish wardrobe and
    unusual accessories. You’ll only find sophisticated designs, fine materials and
    unique styles that are sought particularly from urban and trendy target groups.
    </br>
    </br>
    Starting our project in 2015 we remembered an old story about projects and the chicken and the pig:
    In a project the chicken’s commitment in the business will be to lay eggs whereas the pig will be the bacon.
    In other words: The pigs are the project team – the chickens are the people who want and need the product –
    our customers. You see. It’s all about the chicken!
    </p>
    <h3>Follow Us</h3>
    <ul class='hideme'>
      <li><a class="facebook-icon" href="#">Facebook></a></li>
      <li><a class="instagram-icon" href="#">Instagram</a></li>
      <li><a class="twitter-icon" href="#">Twitter</a></li>
    </ul>
  </section>

  <section class="fullscreen homepage-team" id="Team">
    <h2 class="headline">Team</h2>
    <ul class='hideme'>
      <li>
        <img src="images/hannah.png" alt="Hannah">
        <h3>Hannah</h3>
        <p>On of the two founders of Kavalier.
          Hannah works as our store manager and is dedicated to her work like no one else.
          With her knowledge about design and trends she is a precious member of our Team. </p>
      </li>
      <li>
        <img src="images/michi.png" alt="Michi">
        <h3>Michi</h3>
        <p>Is a co-founder of Kavalier.
          He works as sales manager at the store and online.
          Michi is the brain behind everything.
          His huge knowledge about the latest technologies is what makes Kavalier such a huge success.</p>
      </li>
    </ul>
  </section>

  <section class="fullscreen homepage-location" id="Location">
    <h2 class="headline">Location</h2>
    <ul class='hideme'>
      <li>
        <h3>Where?</h3>
        <p class="location-info">Neubaugasse 36/1
          <br>1070 Wien</p>
        <h3>When?</h3>
        <p class="location-info">Monday - Thursday 09:00 - 19:00
          <br>Friday - Saturday 10:00 - 18:00</p>
        <p class="location-info-small">You can always visit our store online!</p>
      </li>
      <li><div id="map"></div></li>
    </ul>
  </section>

  <section class="homepage-contact" id="Contact">
    <h2 class="headline">Contact</h2>
    <div class="newsletter">
      <h3>Newsletter</h3>
      <p>Want to be uptodate? Signup for our monthly Newsletter.</p>
      <form action="#" method="post">
        <input class="newsletter-name" type="text" name='newslettername' placeholder="Name">
        <input class="newsletter-email" type="email" name='newsletteremail' placeholder="Email Adress">
        <button type='submit' class='button-newsletter <?php if(isset($successnewsletter) && $successnewsletter == true){echo 'successnewsletter';} ?>' name='newslettersbmt'><?php if(isset($successnewsletter) && $successnewsletter == true){echo '✓';} else { echo 'Subscribe';}?></button>
      </form>
      <p class='error_message_newsletter'><?php if(isset($errormessagenewsletter)){echo $errormessagenewsletter;} ?></p>
    </div>
    <div class="contactform">
      <h3>Contact Us!</h3>
      <p>You have a question or want to contact us? Write us a message.</p>
      <form action="#" method="post">
        <input class="contactform-name" name='contactname' type="text" placeholder="Name">
        <br>
        <input class="contactform-email" name='contactemail' type="email" placeholder="Email Adress">
        <br>
        <select class="contactform-subject" name="contactsubject" id="blabla">
          <option value="No-Subject">Subject</option>
          <option value="Complaint">Complaint</option>
          <option value="Question">Question</option>
          <option value="Other">Other</option>
        </select>
        <br>
        <textarea class="contactform-textarea" name="contactmessage" id="blablabla" cols="30" rows="10" placeholder="Message"></textarea>
        <br>
        <button type='submit' class='button-contact <?php if(isset($successcontact) && $successcontact == true){echo 'successcontact';} ?>' name='contactsbmt'><?php if(isset($successcontact) && $successcontact == true){echo '✓';} else { echo 'Send';}?></button>
      </form>
        <p class'error_message_contact'><?php if(isset($errormessagecontact)){echo $errormessagecontact;} ?></p>
    </div>
  </section>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDR5BTqOGfwfrDxu0Wyj9kr7VA4rMVYpRU&callback=initMap"></script>
  <script src="js/maps.js"></script>
