<!DOCTYPE html>
<html lang="en">

<head>
  <title>ZeeStore - Dashboard</title>
  <?php require_once '../php/styles.php' ?>
</head>

<body>
  <nav>
    <a href="index.html" class="brand">ZeeStore</a>
    <div>
      <ul id="navbar">
        <?php navigation(1) ?>
        <li class="user" id="user">
          <div class="circle"></div>
          <i class="fa fa-user"></i>
        </li>
        <a href="#" id="close"><i class="far fa-times"></i></a>
      </ul>
      <div id="userbar">
        <li><a href="settings.php">Setting</a></li>
        <li><a href="../login.php">Logout</a></li>
        <a href="#" id="asd"><i class="fa-solid fa-xmark"></i></a>
      </div>
    </div>
    <div class="show">
      <div class="user2" id="user2">
        <div class="circle"></div>
        <i class="fa fa-user"></i>
        <i class="fa fa-exclamation-circle"></i>
      </div>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </nav>
  <!-- END nav -->

  <div class="container">
    <h1>Quick view of the inventory!</h1>

    <div class="pad">
      <div class="row">
        <div class="cell">
          <p>Number of brands (on going)</p>
          <h2>14</h2>
        </div>
        <div class="cell">
          <p>Number of categories (on going)</p>
          <h2>9</h2>
        </div>
        <div class="cell">
          <p>No. of unique products (available)</p>
          <h2>10</h2>
        </div>
      </div>
      <div class="row">
        <div class="cell half">
          <p>Total sales till date (Rs.)</p>
          <h2>917101.22</h2>
        </div>
        <div class="cell half">
          <p>Total amount collected (Rs.)</p>
          <h2>917036.22</h2>
        </div>
      </div>
      <div class="row">
        <div class="cell">
          <p>Our total customers</p>
          <h2>9</h2>
        </div>
        <div class="cell">
          <p>Number of orders till date</p>
          <h2>10</h2>
        </div>
        <div class="cell">
          <p>Due (amount yet to be collected)</p>
          <h2>65</h2>
        </div>
      </div>
    </div>
  </div>
  <!--quick view    -->

  <div class="container">
    <h1>Rising Trends</h1>
    <div class="box">
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <h1>Top Products</h1>
    <div class="box">
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
      <div class="product">
        <div
          class="pimage"
          style="background-image: url(../images/lap2.jpg)"></div>
        <div class="des">
          <span>Dell</span>
          <h5>Dell XPS 15 I7 13 gen CPU NVIDIA</h5>
          <div class="star">
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
            <img src="../svg/star-svgrepo-com.svg" />
          </div>
          <h4>$1200.00</h4>
        </div>
        <a href="#" class="cart">
          <img src="../svg/shopping-cart-svgrepo-com.svg" />
        </a>
      </div>
    </div>
  </div>

  <?php require_once '../php/loader.php' ?>
  <?php require_once '../php/javaScripts.php' ?>

</body>

</html>