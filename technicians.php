<?php

if (isset($_SESSION['authorized'])) {

  $query = "Select * from tech;";

  $req = pg_query($db, $query);


?>

  <hr>
  <div class="container-tech">
    <h2>Our extremely skilled technicians</h2>

    <section class="tech-container">

      <?php
      while ($row = pg_fetch_array($req)) {
        $code = $row['code'];
        $name = $row['name'];
        $surname = $row['surname'];
        $photo = $row['photo'];
        $description = $row['description'];


        echo <<<_HTML
          <div class="tech-card">
            <div class="face front">
              <div class="content">
                <img src="$photo" alt="" />
              </div>
            </div>
            <div class="face back">
              <div class="content">
                <h3>$name $surname</h3>
                <p>
                  $description
                </p>

              </div>
            </div>
          </div>

          _HTML;
      }
      ?>
    </section>
  </div>
  </div>
<?php  } ?>