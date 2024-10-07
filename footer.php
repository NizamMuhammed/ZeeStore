<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      /* Footer Styles */
      footer {
        background-color: #f96d00; /* Orange color */
        color: #ffffff;
        padding: 40px 20px;
      }

      .footer-container {
        display: flex;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
      }

      .footer-section {
        flex: 1;
        margin: 0 15px;
      }

      .footer-section h4 {
        font-size: 16px;
        color: #ffffff;
        margin-bottom: 20px;
      }

      .footer-section ul {
        list-style-type: none;
        padding: 0;
      }

      .footer-section ul li {
        margin: 8px 0;
      }

      .footer-section ul li a {
        color: #333333;
        text-decoration: none;
        font-size: 14px;
      }

      .footer-section ul li a:hover {
        color: #ffffff;
      }

      .footer-bottom {
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid #e6e6e6;
        font-size: 14px;
        color: #333333;
      }

      /* Back-to-Top Button Styles */
      #backToTopBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 12px;
        background-color: #f96d00; /* Orange color */
        color: white;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
      }

      #backToTopBtn:hover {
        background-color: #cc7a00; /* Darker orange */
      }
    </style>
  </head>
  <body>
    <!-- Footer Section -->
    <footer>
      <div class="footer-container">
        <div class="footer-section">
          <h4>Get to Know Us</h4>
          <ul>
            <li><a href="php/about.php">About ZeeStore</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Press Releases</a></li>
            <li><a href="#">ZeeStore Cares</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Make Money with Us</h4>
          <ul>
            <li><a href="#">Sell on ZeeStore</a></li>
            <li><a href="#">Affiliate Program</a></li>
            <li><a href="#">Advertise Your Products</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>ZeeStore Payment Products</h4>
          <ul>
            <li><a href="#">ZeeStore Business Card</a></li>
            <li><a href="#">Reload Your Balance</a></li>
            <li><a href="#">ZeeStore Currency Converter</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h4>Let Us Help You</h4>
          <ul>
            <li><a href="#">Your Account</a></li>
            <li><a href="#">Shipping Rates & Policies</a></li>
            <li><a href="#">Returns & Replacements</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2024 ZeeStore. All rights reserved.</p>
      </div>
    </footer>

    <!-- Back-to-Top Button -->
    <button onclick="topFunction()" id="backToTopBtn" title="Back to Top">Back to Top</button>

    <!-- JavaScript for Back-to-Top Button -->
    <script>
      // Get the button
      let mybutton = document.getElementById("backToTopBtn");

      // When the user scrolls down 20px from the top, show the button
      window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      };

      // When the user clicks on the button, scroll to the top
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
  </body>
</html>
