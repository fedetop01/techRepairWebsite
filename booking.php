<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <script type="text/javascript" >
  function EventHandler() {
    var form=document.getElementById("booking_form");
    form.addEventListener('submit',function(e){
      e.preventDefault();
      if (form.problem.value=="") {
        alert("You should describe the problem");
        form.problem.classList.add("invalid");
        form.problem.classList.remove("valid");
        form.problem.focus();
        return false;
      }else{
        form.problem.classList.add("valid");
        form.problem.classList.remove("invalid");
      }
      if (form.date.value=="") {
        alert("You should insert a date");
        form.date.classList.add("invalid");
        form.date.classList.remove("valid");
        form.date.focus();
        return false;
      }else{
        form.date.classList.add("valid");
        form.date.classList.remove("invalid");
      }
      if (form.product.value=="") {
        alert("You should insert a product");
        form.product.classList.add("invalid");
        form.product.classList.remove("valid");
        form.product.focus();
        return false;
      }else{
        form.product.classList.add("valid");
        form.product.classList.remove("invalid");
      }
      if (form.tech.value=="") {
        alert("You should insert a tech");
        form.tech.classList.add("invalid");
        form.tech.classList.remove("valid");
        form.tech.focus();
        return false;
      }else{
        form.tech.classList.add("valid");
        form.tech.classList.remove("invalid");
      }

      form.submit();



    });
  }

  </script>
  <!-- Set the character encoding for the HTML document -->
  <meta charset="UTF-8">
  <!-- Configure the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Indicate the name of the page's author or the organization responsible for its creation -->
  <meta name="author" content="TechFixExperts">
  <title>Booking form</title>
  <link rel="icon" href="images/apple-whole-solid.png" type="img/png">
  <link rel="stylesheet" href="booking.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="header.css">
  <?php
  include 'db_connection.php';
  ?>

</head>

<body onload="EventHandler()"id="booking">

  <?php
  include 'header.php';

  if (isset($_POST["problem"])) {
    $user_email = $_SESSION['email'];
    $problem =  pg_escape_string($db, $_POST["problem"]);
    $date =  pg_escape_string($db, $_POST["date"]);
    $address = "";
    if (empty($_POST["address"])) {
      $request = "SELECT address,civic_number FROM users WHERE email='$user_email';";
      $elem = pg_query($db, $request);
      $row = pg_fetch_row($elem);
      $address = $row[0] . " " . $row[1];
    } else {
      $address =  pg_escape_string($db, $_POST["address"]);
    }
    $product = explode(".", $_POST["product"]);
    $product_name =  pg_escape_string($db, $product[0]);
    $model =  pg_escape_string($db, $product[1]);
    $tech =  pg_escape_string($db, $_POST["tech"]);
    $email = pg_escape_string($db, $user_email);
    $request2 = "SELECT MAX(code) FROM booking;";
    $elem2 = pg_query($db, $request2);
    $code = 0;
    if (!$elem2)
      $code = 0;
    else {
      $row2 = pg_fetch_row($elem2);
      $code = $row2[0] + 1;
    }
    $request3 = "INSERT INTO booking (code, problem_description, booking_date,booking_address, tech_code, user_email, product_name, product_model) VALUES ('$code', '$problem', '$date','$address','$tech', '$email', '$product_name', '$model');";

    $elem3 = pg_query($db, $request3);

    if (!$elem3) {
      echo "<script>alert('Booking error')</script>";
    } else {
      header("Location: account_page.php");
    }
  }
  ?>
  <div class="container" id="container">
    <div class="form-container">
      <form action=<?php echo $_SERVER["PHP_SELF"]; ?> name="booking" method="post" id="booking_form">
        <div class="booking-form">
          <h1>MAKE YOUR BOOKING</h1>


          <div class="Problem">
            <input type="text" placeholder="Describe your problem" name="problem"  />
          </div>
          <div class="Date">
            <input type="date" placeholder="Choose the date" name="date" min="<?php echo date('Y-m-d'); ?>"  />
          </div>
          <div class="Address">
            <input type="text" placeholder="Delivery Address (If it's different from yours)" name="address" maxlength="40" />
          </div>
          <div class="Product">
            <select name="product" >
              <option value="" disabled selected hidden>Choose your product</option>
              <?php
              $request4 = "SELECT name,model FROM product ;";
              $elem4 = pg_query($db, $request4);
              while ($row4 = pg_fetch_row($elem4)) {
                echo "<option value=";
                echo $row4[0] . "." . $row4[1];
                echo "> ";
                echo $row4[0] . " " . $row4[1];
                echo "</option>";
              }
              ?>
            </select>
          </div>
          <div class="Tech">
            <select name="tech">
              <?php

              echo "<option value='' disabled selected hidden>Choose your tech</option>";

              $request5 = "SELECT code,name,surname FROM tech ;";
              $elem5 = pg_query($db, $request5);
              while ($row5 = pg_fetch_row($elem5)) {
                echo "<option value=";
                echo $row5[0];
                echo "> ";
                echo $row5[1] . " " . $row5[2];
                echo "</option>";
              }
              ?>

            </select>
          </div>
          <div class="Commit">
            <button id="commit" type="submit" form="booking_form">Commit your booking</button>
          </div>

      </form>
    </div>
  </div>
  <script type="text/javascript" src="script.js">

  </script>
</body>

</html>
