<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <!-- Set the character encoding for the HTML document -->
  <meta charset="UTF-8">
  <!-- Configure the viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Indicate the name of the page's author or the organization responsible for its creation -->
  <meta name="author" content="TechFixExperts">
  <title>TechFixExperts Account</title>
  <link rel="icon" href="images/apple-whole-solid.png" type="img/png">
  <link rel="stylesheet" href="account_page.css">
  <link rel="stylesheet" type="text/css" href="header.css">
  <link rel="stylesheet" type="text/css" href="footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <?php include 'db_connection.php'; /*connessione al database*/ ?>

  <script>


    function delete_row(code) {
      var confirmation = confirm("Are you sure you want to delete this booking?"); // Mostra un messaggio di conferma all'utente

      if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_booking.php?code=" + code, true);
        xhr.send(); // Invia il codice della prenotazione al server

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Rimuovi la riga dalla tabella dopo aver eliminato i dati dal database
            var row = document.getElementById("current_table_row");
            row.parentNode.removeChild(row);
          }
        };

      }
    }
  </script>
</head>

<body id="account">
  <?php include 'header.php'; ?>
  <?php
  $user = $_SESSION['email'];
  $past_elem = "SELECT * FROM booking, tech WHERE user_email =" . "'$user'" . "AND booking_date < CURRENT_DATE AND tech.code = booking.tech_code;";
  $curr_elem = "SELECT * FROM booking, tech WHERE user_email =" . "'$user'" . "AND booking_date >= CURRENT_DATE AND tech.code = booking.tech_code;";
  $pers_info = "SELECT * FROM users WHERE email =" . "'$user';";


  $request1 = pg_query($db, $past_elem);
  $request2 = pg_query($db, $curr_elem);
  $request3 = pg_query($db, $pers_info);


  ?>
  <div class="external-container">
    <div class="personal-info">
      <h4 class="header-info">YOUR PERSONAL INFO</h4>
      <ul class="top-info">

        <?php

        $row = pg_fetch_array($request3);
        $email = $row['email'];
        $username = $row['username'];
        $number = $row['cell_number'];
        $name = $row['name'];
        $surname = $row['surname'];

        $address = $row['address'] . ' ' . $row['civic_number'];
        $birth = $row['date_of_birth'];

        echo <<<_HTML
             <li class="info"><span class="elem-info">Username:&nbsp </span><span>$username</span></li>
             <li class="info"><span class="elem-info">Name:&nbsp </span> <span>$name</span></li>
             <li class="info"><span class="elem-info">Surname:&nbsp </span> <span>$surname</span></li>
             <li class="info"><span class="elem-info">Date of birth:&nbsp </span> <span>$birth</span></li>
             <li class="info"><span class="elem-info">Address:&nbsp </span><span>$address</span></li>
             <li class="info"><span class="elem-info">Email:&nbsp </span> <span>$email</span></li>
             <li class="info"><span class="elem-info">Phone number:&nbsp </span><span>$number</span></li>

            _HTML;
        ?>
      </ul>
    </div>



    <div class="booking-container">
      <div class="current-booking" id=current-booking>
        <table class="responsive-table">
          <caption>Your current bookings</caption>
          <thead>
            <tr class="table-header">
              <th class="col">Code</th>
              <th class="col">Problem description</th>
              <th class="col">Date</th>
              <th class="col">Technician</th>
              <th class="col">Product</th>
            </tr>
          </thead>
          <tbody>
            <!-- popola la tabella Archivio se l'utente ha vecchie prenotazioni-->
            <?php
            $row = pg_fetch_array($request2);
            if (!$row) {
              echo <<<_HTML
          <tr class="table-row">
              <td class="col">--</td>
              <td class="col">--</td>
              <td class="col">--</td>
              <td class="col">--</td>
              <td class="col">--</td>
          </tr>
        _HTML;
            } else {
              do {
                $code = $row[0];
                $problem = $row['problem_description'];
                $date = $row['booking_date'];
                $prod = $row['product_name'] . ' ' . $row['product_model'];

                $tech = $row['name'] . ' ' . $row['surname'];



                echo <<<_HTML
                      <tr class="table-row" id="current_table_row" ondblclick="delete_row($code)">
                          <td class="col">$code</td>
                          <td class="col">$problem</td>
                          <td class="col">$date</td>
                          <td class="col">$tech</td>
                          <td class="col">$prod</td>
                      </tr>
            _HTML;
              } while ($row = pg_fetch_array($request2));
            }
            ?>
          </tbody>
        </table>
      </div>

      <div class="past-booking" id="past-booking">
        <table class="responsive-table">
          <caption>Your bookings history</caption>
          <thead>
            <tr class="table-header">
              <th class="col">Code</th>
              <th class="col">Problem description</th>
              <th class="col">Date</th>
              <th class="col">Technician</th>
              <th class="col">Product</th>
            </tr>
          </thead>
          <tbody>
            <!-- popola la tabella Archivio se l'utente ha vecchie prenotazioni-->
            <?php
            $row = pg_fetch_array($request1);
            if (!$row) {
              echo <<<_HTML
              <tr class="table-row">
                  <td class="col">--</td>
                  <td class="col">--</td>
                  <td class="col">--</td>
                  <td class="col">--</td>
                  <td class="col">--</td>
              </tr>

          _HTML;
            } else {
              do {
                $code = $row[0];
                $problem = $row['problem_description'];
                $date = $row['booking_date'];
                $prod = $row['product_name'] . ' ' . $row['product_model'];
                $tech = $row['name'] . ' ' . $row['surname'];


                echo <<<_HTML
                        <tr class="table-row">
                            <td class="col">$code</td>
                            <td class="col">$problem</td>
                            <td class="col">$date</td>
                            <td class="col">$tech</td>
                            <td class="col">$prod</td>
                        </tr>
              _HTML;
              } while ($row = pg_fetch_array($request1));
            }


            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



  <?php include 'footer.html'; ?>

  <script type="text/javascript" src="script.js">

  </script>
</body>

</html>
