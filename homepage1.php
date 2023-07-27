<?php
include("manageCookie.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Set the character encoding for the HTML document -->
  <meta charset="UTF-8">
  <!-- Configure the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Provide a concise description of the web page's content -->
  <meta name="description" content="Book skilled repairmen for tech device repairs. We offer expert repair services for various devices, including smartphones, laptops, and more.">
  <!-- Specify relevant keywords or phrases related to the web page's content -->
  <meta name="keywords" content="repairman, tech repair, device repair, smartphone repair, laptop repair">
  <!-- Indicate the name of the page's author or the organization responsible for its creation -->
  <meta name="author" content="TechFixExperts">
  <title>Homepage TechFix Experts</title>
  <link rel="icon" href="images/apple-whole-solid.png" type="img/png">
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="cookie.css">

  <!-- Collegamento al file CSS per l'intestazione -->

  <!-- Collegamento al font Google "Quicksand" -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
  <script type="text/javascript" src="homepage.js">

  </script>

</head>

<body id="home">

  <?php include 'header.php'; ?>


  <div class="topPartCard">
    <div class="topPart">
      <h1 class="title">TechFixExperts</h1>
      <p class="topbody">Welcome to our premier platform exclusively designed for booking top-notch repair and maintenance services for your Apple devices, including iPhone, iPad, and Mac. Our website is your ultimate destination for scheduling appointments with skilled technicians who specialize in Apple product repairs. We offer a wide range of services to ensure your Apple devices perform flawlessly.</p>

    </div>
  </div>

  <hr>
  <div class="container">
    <h2>Apple Device Repair and Maintenance Services</h2>
    <section class="services">
      <div class="card" onclick="openVideo('https://www.youtube.com/embed/8s7NmMl_-yg?autoplay=1&mute=1')">
        <div class="content">
          <p class="heading">iPhone Repairs
          </p>
          <p class="para">
            Our skilled technicians are trained to handle various iPhone issues, including screen replacements, battery replacements, camera repairs, charging port repairs, and software troubleshooting. We use genuine Apple parts to ensure the highest quality repairs.
          </p>

        </div>
      </div>
      <div class="card" onclick="openVideo('https://www.youtube.com/embed/Aw1DTUM2Yp0?autoplay=1&mute=1')">
        <div class="content">
          <p class="heading">iPad Repairs
          </p>
          <p class="para">
            Whether your iPad has a cracked screen, a malfunctioning battery, or connectivity problems, our experts have the knowledge and expertise to fix it. We provide services such as screen repairs, battery replacements, water damage restoration, and software updates for all iPad models.
          </p>

        </div>
      </div>
      <div class="card" onclick="openVideo('https://www.youtube.com/embed/2njf-yr3oMs?autoplay=1&mute=1')">
        <div class="content">
          <p class="heading">MacBook Repairs
          </p>
          <p class="para">
            If your Mac is running slowly, experiencing software issues, or suffering from hardware problems, our Apple-certified technicians can help. We offer services such as logic board repairs, keyboard replacements, data recovery, RAM upgrades, and macOS troubleshooting for all Mac models.
          </p>

        </div>
      </div>
      <div class="card" onclick="openVideo('https://www.youtube.com/embed/3urQ6hJFP5s?autoplay=1&mute=1')">
        <div class="content">
          <p class="heading">Software Updates and Optimization
          </p>
          <p class="para">
            Stay up to date with the latest features and enhancements by scheduling software updates for your Apple devices. Our technicians will ensure that your devices are running the most recent versions of iOS, iPadOS, and macOS. We can also optimize your devices' performance and remove any unnecessary files or applications.
          </p>

        </div>
      </div>
      <div class="card" onclick="openVideo('https://www.youtube.com/embed/jZntcyGkmEw?autoplay=1&mute=1')">
        <div class="content">
          <p class="heading">Data Recovery and Backup Solutions
          </p>
          <p class="para">
            Accidental data loss can be devastating, but our experts can assist you in recovering your important files and documents. Additionally, we can set up reliable backup solutions for your Apple devices, ensuring that your data is safe and secure.
          </p>

        </div>
      </div>


      <!-- altro -->
    </section>
  </div>
  <hr>

  <div class="container-booking">
    <h2>Booking steps</h2>
    <section class="container-steps">


      <ul class="booking-steps">
        <li>
          <span class="step-number">1</span>
          Insert the product giving you troubles
        </li>
        <li>
          <span class="step-number">2</span>
          Insert a short description of the problem
        </li>
        <li>
          <span class="step-number">3</span>
          Choose your favourite technician
        </li>
        <li>
          <span class="step-number">4</span>
          Choose the most suitable day and hour for you
        </li>
        <li>
          <span class="step-number">5</span>
          Confirm
        </li>
      </ul>
    </section>
  </div>



  <?php include 'technicians.php'; ?>

  <?php include 'footer.html'; ?>

  <?php include 'cookie.html'; ?>

  <script type="text/javascript" src="script.js">

  </script>

</body>

</html>
