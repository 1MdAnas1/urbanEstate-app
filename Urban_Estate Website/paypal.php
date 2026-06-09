<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!==true)
{
  ?>
   <script>
        alert("Please Login First");
        window.location.href="login.html";
   </script>
  <?php
}
?>
<script>
    alert("Proceeding to PayPal ");
</script>
<?php

?>

  <div id="smart-button-container">
    <div style="text-align: center"><label for="description">Email ID : </label><input type="text" name="descriptionInput" id="description" maxlength="127" value=""></div>
      <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Please enter an Email ID</p>
    <div style="text-align: center"><label for="amount">Amount </label><input name="amountInput" type="number" id="amount" value="" ><span> USD</span></div>
      <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Please enter a price</p>
    <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
      <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
    <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
  </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
  function initPayPalButton() {
    var description = document.querySelector('#smart-button-container #description');
    var amount = document.querySelector('#smart-button-container #amount');
    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
    var priceError = document.querySelector('#smart-button-container #priceLabelError');
    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

    var elArr = [description, amount];

    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
      invoiceidDiv.style.display = "block";
    }

    var purchase_units = [];
    purchase_units[0] = {};
    purchase_units[0].amount = {};

    function validate(event) {
      return event.value.length > 0;
    }

    paypal.Buttons({
      style: {
        color: 'gold',
        shape: 'pill',
        label: 'paypal',
        layout: 'vertical',
        
      },

      onInit: function (data, actions) {
        actions.disable();

        if(invoiceidDiv.style.display === "block") {
          elArr.push(invoiceid);
        }

        elArr.forEach(function (item) {
          item.addEventListener('keyup', function (event) {
            var result = elArr.every(validate);
            if (result) {
              actions.enable();
            } else {
              actions.disable();
            }
          });
        });
      },

      onClick: function () {
        if (description.value.length < 1) {
          descriptionError.style.visibility = "visible";
        } else {
          descriptionError.style.visibility = "hidden";
        }

        if (amount.value.length < 1) {
          priceError.style.visibility = "visible";
        } else {
          priceError.style.visibility = "hidden";
        }

        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
          invoiceidError.style.visibility = "visible";
        } else {
          invoiceidError.style.visibility = "hidden";
        }

        purchase_units[0].description = description.value;
        purchase_units[0].amount.value = amount.value;

        if(invoiceid.value !== '') {
          purchase_units[0].invoice_id = invoiceid.value;
        }
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: purchase_units,
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';

          // Or go to another URL:  actions.redirect('thank_you.html');
          
        });
      },

      onError: function (err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
  </script>

  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paymnent - Urban Estate</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">    
  </head>
  <body>
     <!-- NAVBAR -->
     <header style="background-color: #090A0A">
      <div class="nav container">
          <!-- LOGO -->
          <a href="index.html" class="logo"><i class='bx bxs-home'></i>Urban Estate</a>
          <!-- MENU -->
          <input type="checkbox" name="" id="menu">
          <label for="menu" <i class='bx bx-menu' id="menu-icon"></i></label>
          <!-- NAV LIST -->
       <ul class="navbar">
          <li><a href="index.html">Home</a></li>
          <li><a href="#properties">Properties</a>
          <ul class="dropdown">
              <li><a href="purchase.html">For Purchase</a> </li>
              <li><a href="rent.html">For Rent</a></li>
          </ul>
          </li>
          <li><a href="#about">About Us</a></li>
          <li><a href="contactus.html">Contact Us</a></li>
      </ul>  
      <a href="#" class="btn"><i class='bx bxs-user'></i><?php
   echo" Hey, ".$_SESSION['username'];?></a>      
      <a href="logout.php" class="btn">Log Out</a>
      </div>
  </header>
  
  <section class="newsletter container">
        <h2>Subscribe to Our Newsletter !!!</h2>
        <h3>Drop your email address below</h3>
        <form onsubmit="return validate(this)" action="newsletter.php" method="post">
            <input type="text" name="emailname" id="emailbox" placeholder="yourname@domain.com">
            <input type="submit" name="subnews" value="Send" class="btn">
        </form>
    </section>
    
  <!-- ABOUT -->
  <section class="about conatiner" id="about">
        <div class="about-img box">
            <img src="img/aboutus.jpg" alt="">        
        </div>
        <div class="about-text">
            <span>About Us</span>
            <h2>The Best <br> at It's best !!!</h2>
            <p>Urban Estate, the Leader in Real Estate Businness. It provides you with the best homes at the best prices <br> posssible. <br>
            We can be the website for your next home.</p>
            <a href="aboutus.html" class="btnl">Learn More</a>
        </div>
    </section>

<!-- Footer -->
<section class="footer">
        <div class="footer-container container">
            <h2>Urban Estate</h2>
            <div class="footer-box">
                <h3>Links</h3>
                <a href="purchase.html">Purchase</a><br>
                <a href="rent.html">Rent</a><br>
            </div>
            <div class="footer-box">
                <h3></h3><br><br>
                <a href="aboutus.html">About us</a><br>
                <a href="contactus.html">Contact us</a><br>                
            </div>
            <div class="footer-box">
                <h3>Connect with us</h3>
                <a href="#">+91 011 2299393</a>
                <a href="#">urbanestate@gmail.com</a><br><br>
                <div class="social">
                    <a href="https://www.instagram.com" id="insta"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="https://www.facebook.com" id="fb"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="https://www.twitter.com" id="twitter"><i class='bx bxl-twitter'></i></a>            
                    
                </div>
            </div>
        </div>
    </section>

<!-- Copyright -->
<div class="copyright">
    <p>&#169; URBANESTATE All Rights Reserved</p>
</div>

  </body>
  </html>