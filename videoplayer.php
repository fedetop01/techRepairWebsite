<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Set the character encoding for the HTML document -->
  <meta charset="UTF-8">
  <!-- Configure the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Indicate the name of the page's author or the organization responsible for its creation -->
  <meta name="author" content="TechFixExperts">
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="videoplayer.css">
  <link rel="icon" href="images/apple-whole-solid.png" type="img/png">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>How it's done</title>
</head>

<body id="home">


  <?php
  include('header.php');

  // Recupera l'URL del video dalla query string
  $video = $_GET['url'];

  ?>

  <div class="player">
    <script type="text/javascript">
      var videoURL = "<?php echo $video; ?>";
      var iframe = document.createElement("iframe");
      iframe.src = videoURL;
      iframe.width = "700";
      iframe.height = "700";
      document.querySelector(".player").appendChild(iframe);
    </script>
  </div>


  <?php include('footer.html'); ?>

</body>

</html>
