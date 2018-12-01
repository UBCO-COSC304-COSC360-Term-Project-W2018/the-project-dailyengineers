<?php
include 'include/db_credentials.php';
$connection = mysqli_connect($host, $user, $password, $database);
$error      = mysqli_connect_error();
if($connection -> connect_error) {
die("Connection failed: " . $connection -> connect_error);
    }
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
        } else {
              // echo "Connected to Database.";
        }
?>
  <section class="leftSidebar">
      <div class="custom-select">
      <form>
			<label for="make_sel">Make: </label>
            <select id="make_sel">
                  <option value="0" selected="selected">All</option>
                  <?php
                      $sql_make = "SELECT DISTINCT make FROM Vehicle";
                      if ($results = mysqli_query($connection, $sql_make)) {
						  //$counter = 0;
                          while ($row = mysqli_fetch_row($results)) {
                              //$counter++;
                              echo "<option value='$row[0]'>$row[0]</option>";
                          }
                      } mysqli_free_result($results);
                  ?>
            </select>

		<label for="model_sel">Model: </label>
        <select id="model_sel">
            <option value="0">All</option>
				<?php
					if($_POST['make_sel']!=0){
						$sql_model = "SELECT DISTINCT model FROM Vehicle WHERE make='$_POST['make_sel']';";
					} else {
						$sql_model = "SELECT DISTINCT model FROM Vehicle;";
					}
                    if ($results = mysqli_query($connection, $sql_make)) {
						//$counter = 0;
						while ($row = mysqli_fetch_row($results)) {
							//$counter++;
                            echo "<option value='$row[0]'>$row[0]</option>";
                          }
                      } mysqli_free_result($results);
                  ?>
        </select>

        <label for="year_sel">Year: </label>
            <select id="year_sel">
                  <option value="0" selected="selected">All</option>
                  <?php
					if($_POST['make_sel']!=0){
						$sql_year = "SELECT DISTINCT year FROM Vehicle WHERE make='$_POST[\'make_sel\']'";
						if($_POST['model_sel']!=0){
								$sql_year = $sql_year . " AND model='$_POST[\'model_sel\']'";
							}
					} else {
						if($_POST['model_sel']!=0){
						$sql_year = "SELECT DISTINCT year FROM Vehicle WHERE make='$_POST['model_sel']''";
						} else {
						$sql_model = "SELECT DISTINCT year FROM Vehicle;";
						}
					}
                      $sql_make = "SELECT DISTINCT year FROM Vehicle";
                      if ($results = mysqli_query($connection, $sql_make)) {
						  //$counter = 0;
                          while ($row = mysqli_fetch_row($results)) {
                              //$counter++;
                              echo "<option value='$row[0]'>$row[0]</option>";
                          }
                      } mysqli_free_result($results);
                  ?>
            </select>

        <select>
            <option value="0">Type:</option>
            <option value="1">Coupe</option>
            <option value="2">Hatchback</option>
            <option value="3">Sedan</option>
            <option value="4">SUV</option>
            <option value="5">Truck</option>
            <option value="6">Other</option>
        </select>

        <select>
            <option value="0">Engine:</option>
            <option value="1">3-Cylinder</option>
            <option value="1">4-Cylinder</option>
            <option value="1">6-Cylinder</option>
            <option value="1">8-Cylinder</option>
            <option value="1">10-Cylinder</option>
            <option value="1">12-Cylinder</option>
            <option value="1">Electric</option>
            <option value="1">Rotary</option>
            <option value="1">Other</option>
        </select>

        <select>
            <option value="0">Drivetrain:</option>
            <option value="0">All-Wheel Drive</option>
            <option value="0">Four-Wheel Drive</option>
            <option value="0">Front-Wheel Drive</option>
            <option value="0">Read-Wheel Drive</option>
        </select>

        <select>
            <option value="0">Transmission:</option>
            <option value="1">Automatic</option>
            <option value="2">Manual</option>
        </select>

        <select>
            <option value="0">Colour:</option>
            <option value="1">Black</option>
            <option value="2">Blue</option>
            <option value="3">Brown</option>
            <option value="4">Green</option>
            <option value="5">Grey</option>
            <option value="6">Orange</option>
            <option value="7">Red</option>
            <option value="8">Silver</option>
            <option value="9">White</option>
            <option value="10">Yellow</option>
            <option value="11">Other</option>
        </select>

        <select>
            <option value="0">Seats:</option>
            <option value="1">2 seats</option>
            <option value="2">3 seats</option>
            <option value="3">4 seats</option>
            <option value="4">5 seats</option>
            <option value="5">6+ seats</option>
        </select>

		<input type="button" id="filter_b" value="Filter Products">
    </form>
    </div>
</section>
