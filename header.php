<?php
session_start();

?>
<header>
  <div class="logo">

    <img id="ipear" class="logo" src="images/apple-whole-solid.svg" alt="iPear Logo" title="iPear">
  </div>
  <div class="site-name">
    <h1 class="hsite-name"><a href="homepage1.php">TechFix Experts<span class="text-primary">.</span> </a></h1>
  </div>
  <nav>
    <ul class="end-elements links">
      <li>
        <a href="homepage1.php" data-active="home">Home</a>
      </li>
      <li class="dropdown-products">
        <button class="dropbtn">Products</button>
        <div class="dropdown-menu">
          <span><a href="https://www.apple.com/iphone/">iPhone</a><img src="images/iphone.png" target="_blank" class="prod"></span>
          <span><a href="https://www.apple.com/ipad/">iPad</a><img src="images/ipad.jpg" target="_blank" class="prod"></span>
          <span><a href="https://www.apple.com/mac/">MacBook</a><img src="images/mac.jpg" target="_blank" class="prod"></span>
        </div>
      </li>


      <?php
      if (isset($_SESSION['authorized'])) {
        echo "<li class='book'>";
        echo "<a href='booking.php' data-active='booking'>Booking</a>";
        echo "</li>";
      }
      ?>

      <li class="dropdown-profile">
        <button class="dropbtn" id="profilebtn">Profile</button>

        <div class="dropdown-menu links">
          <?php
          if (isset($_SESSION['authorized'])) {
            echo "<a href='account_page.php' data-active='account'>Account</a>";
            echo "<a href='logout.php'>LogOut</a>";
          } else {

            echo "<a href='login.php' data-active='login' id='log'>Register/Login</a>";
          }

          ?>
        </div>
      </li>
      <li class="welcome">
        <?php
        if (isset($_SESSION['authorized'])) {
          echo "<span>Welcome, " . $_SESSION['name'] . "</span>";
        }
        ?>
      </li>
    </ul>
  </nav>

</header>