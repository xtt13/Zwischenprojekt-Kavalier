
  <header class="main-header">
    <h1><a href="index.html">Kavalier</a></h1>
    <nav><ul>
      <li><a href="index.html#top">Home</a></li>
      <li><a href="store.html">Store</a></li>
      <li><a href="index.html#AboutUs">About Us</a></li>
      <li><a href="index.html#Team">Team</a></li>
      <li><a href="index.html#Location">Location</a></li>
      <li><a href="index.html#Contact">Contact</a></li>
    </ul>
  </nav>
    <a class="cart" href="bag.html">
      <p>1</p>
    </a>
    <a class="signin" href="login.html">Sign In/Register</a>
    <div class="nav-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </header>

  <section class="fullscreen-above-the-fold above-the-fold">
    <h1>Kavalier</h1>
    <h2>Welcome Modern Knights!</h2>
  </section>

  <section class="fullscreen homepage-store" id="Store">
    <h2 class="headline">Store</h2>
    <ul>
      <li>
        <a href=""><img class="top-link" src="images/clothing.png" alt="Clothing"></a><a class="bottom-link" href="">Clothing</a></li>
      <li>
        <a href=""><img class="top-link" src="images/gadgets.png" alt="Gadgets"></a><a class="bottom-link" href="">Gadgets</a></li>
      <li>
        <a href=""><img class="top-link" src="images/accessorize.png" alt="Accessorize"></a><a class="bottom-link" href="">Accessorize</a></li>
    </ul>
  </section>

  <section class="fullscreen homepage-about-us" id="AboutUs">
    <h2 class="headline">About Us</h2>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea
      takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
      et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
    <h3>Follow Us</h3>
    <ul>
      <li><a class="facebook-icon" href="#">Facebook></a></li>
      <li><a class="instagram-icon" href="#">Instagram</a></li>
      <li><a class="twitter-icon" href="#">Twitter</a></li>
    </ul>
  </section>

  <section class="fullscreen homepage-team" id="Team">
    <h2 class="headline">Team</h2>
    <ul>
      <li>
        <img src="images/hannah.png" alt="Hannah">
        <h3>Hannah</h3>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
      </li>
      <li>
        <img src="images/michi.png" alt="Michi">
        <h3>Michi</h3>
        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
      </li>
    </ul>
  </section>

  <section class="fullscreen homepage-location" id="Location">
    <h2 class="headline">Location</h2>
    <ul>
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
      <form action="validation.php" method="post">
        <input class="newsletter-name" type="text" placeholder="Name">
        <input class="newsletter-email" type="email" placeholder="Email Adress">
        <button>Subscribe</button>
      </form>
    </div>
    <div class="contactform">
      <h3>Contact Us!</h3>
      <p>You have a question or want to contact us? Write us an email.</p>
      <form action="validation.php" method="post">
        <input class="contactform-name" type="text" placeholder="Name">
        <br>
        <input class="contactform-email" type="email" placeholder="Email Adress">
        <br>
        <select class="contactform-subject" name="blabla" id="blabla">
          <option value="">Subject</option>
          <option value="">Complaint</option>
          <option value="">Test</option>
          <option value="">Test</option>
        </select>
        <br>
        <textarea class="contactform-textarea" name="blablabla" id="blablabla" cols="30" rows="10" placeholder="Message"></textarea>
        <br>
        <button>Send</button>
      </form>
    </div>
  </section>
