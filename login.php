<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Set the character encoding for the HTML document -->
  <meta charset="UTF-8">
  <!-- Configure the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Indicate the name of the page's author or the organization responsible for its creation -->
  <meta name="author" content="TechFixExperts">
  <title>Login/Register</title>
  <link rel="icon" href="images/apple-whole-solid.png" type="img/png">
  <link rel="stylesheet" href="login.css">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-Mr7iONd1tJLqAaL2QToSSEgNMs8zpfwNUgjCGOJ5I5Xpok48dxtovjE0LBVexL8Q" crossorigin="anonymous">


  <?php
  include("db_connection.php");
  include 'header.php';
  ?>

  <script src="login.js"></script>

</head>

<body onload="EventHandler()" id="login">
  <?php

  if (isset($_POST["EmailSignIn"])) {
    $email = pg_escape_string($db, $_POST['EmailSignIn']);
    $request = "SELECT email,password,name FROM users WHERE email='$email';";
    $elem = pg_query($db, $request);
    $row = pg_fetch_row($elem);



    if (!$row || $row[0] != $email) {
      echo '<script>alert("Email not valid")</script>';
    } else if (!password_verify($_POST["PasswordSignIn"], $row[1])) {
      echo '<script>alert("Password not valid")</script>';
    } else {

      $_SESSION['email'] = $email;
      $_SESSION['name'] = $row[2];
      $_SESSION['authorized'] = True;

      header("Location: homepage1.php");
    }
  }
  ?>
  <?php

  function getDomainFromEmail($email, $atPosition)
  {
    $domain = substr($email, $atPosition + 1);
    return $domain . '.';
  }
  function isValidDomain($domain)
  {
    return checkdnsrr($domain, 'ANY');
  }


  if (
    isset($_POST["Name"]) || isset($_POST["Surname"]) || isset($_POST["Telephone_Number"]) || isset($_POST["Address"]) || isset($_POST["Civic_Number"]) || isset($_POST["Birth_Date"]) || isset($_POST["Username"])
    || isset($_POST["Email"]) || isset($_POST["Password"]) || isset($_POST["Select"]) && isset($_POST["Answer"])
  ) {
    $name =  pg_escape_string($db, $_POST["Name"]);
    $surname =  pg_escape_string($db, $_POST["Surname"]);
    $telephone_number =  pg_escape_string($db, $_POST["Telephone_Number"]);
    $address =  pg_escape_string($db, $_POST["Address"]);
    $civic_number =  pg_escape_string($db, $_POST["Civic_Number"]);
    $birth_date =  pg_escape_string($db, $_POST["Birth_Date"]);
    $username =  pg_escape_string($db, $_POST["Username"]);
    $email =  pg_escape_string($db, $_POST["Email"]);
    $password_in_chiaro =  pg_escape_string($db, $_POST["Password"]);
    $password = password_hash($password_in_chiaro, PASSWORD_DEFAULT);

    $selects =  pg_escape_string($db, $_POST["Select"]);
    $answer =  pg_escape_string($db, $_POST["Answer"]);
    $request_1 = "SELECT email FROM users WHERE email = '$email';";
    $flag = false;

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

      $posat = mb_strpos($email, '@');
      $domain = getDomainFromEmail($email, $posat);

      if (isValidDomain($domain)) {
        $flag = true;
      }
    }
    $elem_1 = pg_query($db, $request_1);
    $row = pg_fetch_row($elem_1);
    if (!$row) {
      $request_2 = "INSERT INTO users (email, username, cell_number, name, surname, password, address, civic_number, date_of_birth, question_number, answer)
                  VALUES ('$email', '$username', '$telephone_number', '$name', '$surname', '$password', '$address', '$civic_number', '$birth_date', '$selects', '$answer');";
      $elem_2 = pg_query($db, $request_2);
      if (!$elem_2) {
        echo '<script>alert("Registration error");</script>';
      } elseif (!$flag) {
        echo '<script>alert("Email not valid")</script>';
      } else {
        echo '<script>alert("Registration done with success");</script>';

      }
    } else {
      echo '<script>alert("Email already present");</script>';
    }
  }
  ?>
  <div class="container" id="container">
    <div class="form-container sign-up-container">
      <form action=<?php echo $_SERVER["PHP_SELF"]; ?> name="signUp" method="post" id="signUp_form">
        <h1>Create Account</h1>
        <div class="social-container">
          <a href="https://www.facebook.com/profile.php?id=100092665429042" class="facebook"><img src="images/facebook-f.svg" style="width: 30%" id="facebook" class="fa-brands fa-facebook-f "></i></a>
          <a href="https://www.instagram.com/techfixexperts/" class="instagram"><img src="images/instagram.svg" id="instagram" style="width: 45%" </i></a>
          <a href="https://twitter.com/TechFixExperts" class="twitter"><img src="images/twitter.svg" id="twitter" style="width: 50%"></i></a>
        </div>
        <span>Follow this four steps for registration</span>
        <div class="signUp-steps">
          <span id="step1" class="step">Step 1</span>
          --
          <span id="step2" class="step">Step 2</span>
          --
          <span id="step3" class="step">Step 3</span>
          --
          <span id="step4" class="step">Step 4</span>
        </div>
        <div class="Generality" style="display:none;">
                <input type="text" placeholder="Username" name = "Username" maxlength="20" />
                <input type="email" placeholder="Email" name="Email" maxlength="30" />
                <input type="password" placeholder="Password" name="Password" minlenght="6" maxlength="30" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" id="passGenerality"/>
                <span id="toggle-password1" onclick="togglePasswordVisibility()">
                  <i class="far fa-eye"></i>
                </span>

        </div>
        <div class="Generality"style="display:none;">
                <input type="text" placeholder="Address" name="Address" maxlength="30"  />
                <input type="number" placeholder="Civic Number" name="Civic_Number" />
                <input type="date" placeholder="Birth Date" name= "Birth_Date" max="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="Generality"style="display:none;">
                <input type ="text" placeholder="Name" name="Name" maxlength="20"/>
                <input type="text" placeholder="Surname" name = "Surname" maxlength="20" />
                <input type="tel"  placeholder="Telephone Number" name="Telephone_Number"  />
        </div>
        <div class="Generality"style="display:none;">
                <select name="Select" id="selectField">
                  <?php
                        echo "<option value='' disabled selected hidden>Choose your security question</option>";
                        $request5 = "SELECT numberQ,textQ FROM question ;";
                        $elem5 = pg_query($db,$request5);
                        while ($row5 = pg_fetch_row($elem5)) {
                          echo "<option value=";
                          echo $row5[0];
                          echo "> ";
                          echo $row5[1];
                          echo "</option>";
                        }
                   ?>

               </select>
               <input type="text" placeholder="Insert the security answer" name="Answer" maxlength="20" />
        </div>
        <div class="ButtonNextPrevious">
          <button id="SignUp" type="submit" form="signUp_form" style="display:none;">Sign Up</button>
          <button id="nextBtn" type="button">Next</button>
          <button id="prevBtn" type="button">Previous</button>

        </div>

      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post" id="sign-in-form">
        <h1>Sign in</h1>
        <div class="social-container">
          <a href="https://www.facebook.com/profile.php?id=100092665429042" class="facebook"><img src="images/facebook-f.svg" id="facebook" style="width: 30%"></i></a>
          <a href="https://www.instagram.com/techfixexperts/" class="instagram"><img src="images/instagram.svg" style="width: 45%" id="instagram"></i></a>
          <a href="https://twitter.com/TechFixExperts" class="twitter"><img src="images/twitter.svg" style="width: 50%" id="twitter"></i></a>
        </div>
        <span>Use your account</span>
        <input type="email" placeholder="Email" name="EmailSignIn" id="EmailSignIn" />
        <input type="password" placeholder="Password" name="PasswordSignIn" id="PasswordSignIn"/>
        <span id="toggle-password2" onclick="togglePasswordVisibility()">
          <i class="far fa-eye"></i>
        </span>
        <a id="forgot_label" onclick="forgot_password()">Forgot your password?</a>
        <button type="submit" form="sign-in-form">Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us please login with your personal info</p>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start journey with us</p>
          <button class="ghost" id="signUp" onclick="setFirst()">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <div id="forgot_password" class="forgot_password">
    <h2 id="forgot_password_h2">Reset Password</h2>
    <form action="" method="post" id="verify_email">
      <p>Enter the E-mail and the answer to the security question</p>
      <input type="email" placeholder="Email" id="email_reset_password" name="email_reset_password" />
      <div class="button_central">
        <button type="submit" onclick="change_email_question()">Send Email</button>
        <button type="button" onclick="turnBack()">Turn Back</button>
      </div>

    </form>
  </div>
  <div id="check_change">
    <form action="" method="post" id="verify_security_answer">
      <h2 id="forgot_password_h2">Reset Password</h2>
      <p>Enter the answer to the following security question</p>
      <label for="security_answer" id="security_question_label"></label>
      <input type="text" placeholder="Answer" id="security_answer" />
      <div class="button_central">
        <button type="submit" onclick="verify_security_answer()">Send Answer</button>
        <button type="button" onclick="turnBack()">Turn Back</button>
      </div>
    </form>
    <form action="" method="post" id="new_password_form">
      <h2 id="forgot_password_h2">Reset Password</h2>
      <p>Enter the new password</p>
      <input type="password" placeholder="New Password" id="new_password" minlenght="6" maxlength="30" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters">
      <span id="toggle-password3" onclick="togglePasswordVisibility()">
        <i class="far fa-eye"></i>
      </span>
      <div class="button_central">
        <button type="submit" onclick="save_new_password()"> Change Password</button>
        <button type="button" onclick="turnBack()">Turn Back</button>
      </div>
    </form>
  </div>

  <script type="text/javascript" src="script.js">

  </script>

</body>

</html>
