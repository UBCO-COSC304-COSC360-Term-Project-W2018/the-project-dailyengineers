<?php
    include 'include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error      = mysqli_connect_error();
    if ($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    }
?>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<section class="leftSidebar">
  <div class="custom-select">

    <form action="#" method="POST">
      <p id="testOut">
      </p>
      <div>
        <label for="make_sel">Make: </label>
        <select id="make_sel" name="make">
          <option value="0" selected="selected">All</option>
          <?php
                      $sql_make = "SELECT DISTINCT make FROM Vehicle ORDER BY make";
                      if ($results = mysqli_query($connection, $sql_make)) {
                          //$counter = 0;
                          while ($row = mysqli_fetch_row($results)) {
                              //$counter++;
                              echo "<option value='$row[0]'>$row[0]</option>";
                          }
                      } mysqli_free_result($results);
                  ?>
        </select>
      </div>

      <div><label for="model_sel">Model: </label>
        <select id="model_sel" name="model">
          <option value="0">All</option>
          <?php
                        $sql_model = "SELECT DISTINCT model FROM Vehicle ORDER BY model";
                    if ($results = mysqli_query($connection, $sql_model)) {
                        //$counter = 0;
                        while ($row = mysqli_fetch_row($results)) {
                            //$counter++;
                            echo "<option value='$row[0]'>$row[0]</option>";
                        }
                    } mysqli_free_result($results);
                  ?>
        </select></div>

      <div><label for="type_sel">Body Type: </label>
        <select id="type_sel" name="bodyType">
          <option value="0" selected="selected">All</option>
          <?php
                              $sql_type = "SELECT DISTINCT bodyType FROM Vehicle ORDER BY bodyType";

                         if ($results = mysqli_query($connection, $sql_type)) {
                             //$counter = 0;
                             while ($row = mysqli_fetch_row($results)) {
                                 //$counter++;
                                 echo "<option value='$row[0]'>$row[0]</option>";
                             }
                         } mysqli_free_result($results);
                  ?>
        </select>
      </div>

      <div> <label for="year_sel">Year: </label>
        <select id="year_sel" name="year">
          <option value="0" selected="selected">All</option>
          <?php
                                $sql_year = "SELECT DISTINCT year FROM Vehicle ORDER BY year";

                             if ($results = mysqli_query($connection, $sql_year)) {
                                 //$counter = 0;
                                 while ($row = mysqli_fetch_row($results)) {
                                     //$counter++;
                                     echo "<option value='$row[0]'>$row[0]</option>";
                                 }
                             } mysqli_free_result($results);
                      ?>
        </select>
      </div>

      <div><label for="engine_sel">Engine: </label>
        <select id="engine_sel" name="engine">
          <option value="0" selected="selected">All</option>
          <?php
                              $sql_eng = "SELECT DISTINCT engine FROM Vehicle ORDER BY engine";
                                 if ($results = mysqli_query($connection, $sql_eng)) {
                                     //$counter = 0;
                                     while ($row = mysqli_fetch_row($results)) {
                                         //$counter++;
                                         echo "<option value='$row[0]'>$row[0]</option>";
                                     }
                                 } mysqli_free_result($results);
                          ?>
        </select>
      </div>

      <div><label for="drivetrain_sel">Drivetrain: </label>
        <select id="drivetrain_sel" name="drivetrain">
          <option value="0" selected="selected">All</option>
          <?php
                                  $sql_drive = "SELECT DISTINCT drivetrain FROM Vehicle ORDER BY drivetrain";

                           if ($results = mysqli_query($connection, $sql_drive)) {
                               //$counter = 0;
                               while ($row = mysqli_fetch_row($results)) {
                                   //$counter++;
                                   echo "<option value='$row[0]'>$row[0]</option>";
                               }
                           } mysqli_free_result($results);
                      ?>
        </select></div>

      <div><label for="trans_sel">Transmission: </label>
        <select id="trans_sel" name="transmission">
          <option value="0" selected="selected">All</option>
          <?php
                              $sql_trans = "SELECT DISTINCT transmission FROM Vehicle ORDER BY transmission";
                              if ($results = mysqli_query($connection, $sql_trans)) {
                                  //$counter = 0;
                                  while ($row = mysqli_fetch_row($results)) {
                                      //$counter++;
                                      echo "<option value='$row[0]'>$row[0]</option>";
                                  }
                              } mysqli_free_result($results);
                          ?>
        </select></div>

      <div><label for="colour_sel">Colour: </label>
        <select id="colour_sel" name="exterior">
          <option value="0" selected="selected">All</option>
          <?php
                                    $sql_colour = "SELECT DISTINCT exterior FROM Vehicle ORDER BY exterior";
                                    if ($results = mysqli_query($connection, $sql_colour)) {
                                        //$counter = 0;
                                        while ($row = mysqli_fetch_row($results)) {
                                            //$counter++;
                                            echo "<option value='$row[0]'>$row[0]</option>";
                                        }
                                    } mysqli_free_result($results);
                                ?>
        </select></div>

      <div><label for="seats_sel">Seats: </label>
        <select id="seats_sel" name="seats">
          <option value="0" selected="selected">All</option>
          <?php
                                          $sql_seats = "SELECT DISTINCT seats FROM Vehicle order by seats";
                                          if ($results = mysqli_query($connection, $sql_seats)) {
                                              //$counter = 0;
                                              while ($row = mysqli_fetch_row($results)) {
                                                  //$counter++;
                                                  echo "<option value='$row[0]'>$row[0]</option>";
                                              }
                                          } mysqli_free_result($results);
                                      ?>
        </select></div>

      <div><label for="fuel_sel">Fuel: </label>
        <select id="fuel_sel" name="fuel">
          <option value="0" selected="selected">All</option>
          <?php
                                                $sql_fuel = "SELECT DISTINCT fuel FROM Vehicle order by fuel";
                                                if ($results = mysqli_query($connection, $sql_fuel)) {
                                                    //$counter = 0;
                                                    while ($row = mysqli_fetch_row($results)) {
                                                        //$counter++;
                                                        echo "<option value='$row[0]'>$row[0]</option>";
                                                    }
                                                } mysqli_free_result($results);
                                            ?>
        </select></div>

      <input type="button" class="formatButton" id="filter_b" value="Find Products">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
        //$(document).ready(function() {
        //var selects = ["#make_sel", "#make_sel", "#model_sel", "#type_sel",
        //  "#year_sel", "#engine_sel", "#drivetrain_sel", "#trans_sel",
        //  "#color_sel", "#seats_sel", "#fuel_sel"
        //];

        $("#make_sel").change(function() {
          var selects = ["#make_sel", "#model_sel", "#type_sel",
            "#year_sel", "#engine_sel", "#drivetrain_sel", "#trans_sel",
            "#color_sel", "#seats_sel", "#fuel_sel"
          ];
          var val = $(this).val();
          $("testOut").html(val);
          for (i = 1; i < selects.length; i++) {
            $.post("./action/loadSideOptions.php", {
              field: $(selects[i]).attr("name"),
              make: $("#make_sel").val()
            }, function(data) {
              $(selects[i]).html("<option value='0' selected='selected'>All</option>" + data);
            });
          }
        });
        $("#model_sel").change(function() {
          $()
          var selects = ["#make_sel", "#model_sel", "#type_sel",
            "#year_sel", "#engine_sel", "#drivetrain_sel", "#trans_sel",
            "#color_sel", "#seats_sel", "#fuel_sel"
          ];
          var val = $(this).val();
          $("testOut").html(val);
          for (i = 2; i < selects.length; i++) {
            $.post("./action/loadSideOptions.php", {
                field: $(selects[i]).attr("name"),
                make: $("#make_sel").val(),
                model: $("#model_sel").val()
              },
              function(data) {
                $(selects[i]).html("<option value='0' selected='selected'>All</option>" + data);
              });
          }
        });

        //});
      </script>
    </form>
  </div>
</section>
