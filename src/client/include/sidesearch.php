<?php
//session_start();
//include 'include/db_credentials.php';
//$connection = mysqli_connect($host, $user, $password, $database);
//$error      = mysqli_connect_error();
//$sql = $connection("SELECT * FROM Product WHERE ?=?;");
//	if($connection -> connect_error) {
//    die("Connection failed: " . $connection -> connect_error);
//    }
//    echo "Connected to Server.";
//    if ($error != null) {
//        $output = "<p>Unable to connect to database!</p>";
//        exit($output);
//        } else {
//              echo "Connected to Database.";
//        }

?>
<section class="leftSidebar">
    <div class="custom-select">
        <select name="make_sel">
            <option value="0">Make:</option>
			<?php
				//$sql_make = "SELECT DISTINCT make FROM Vehicle";
				//if ($results = mysqli_query($connection, $sql_make)) {
				//while ($row = mysqli_fetch_row($results)) {
				//	$counter = 0;
				//	echo "<option value='counter'>$row[0]</option>";
				//	}
				//} mysqli_free_result($results);

			?>
        </select>

        <select>
            <option value="0">Model:</option>
        </select>

        <select>
            <option value="0">Year:</option>
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
    </div>
</section>
