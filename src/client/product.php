<?php session_start();?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE Product Ex</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/product.css">
</head>

<body>

    <?php include 'include/header.php';?>

    <main>

        <div class="columnContainer">

            <!-- Sidebar code -->
            <?php//include "include/sidesearch.php"; ?>
            <!-- Page code -->

            <section class="mainView">
              <h1>Product Listing</h1>

              <?php
                include 'include/db_credentials.php';
                $connection = mysqli_connect($host, $user, $password, $database);
                $error      = mysqli_connect_error();
                $vehicleID = $_GET['id'];
                // $sql = "SELECT year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description, (SELECT SUM(amount) as amount FROM Vehicle, Inventories WHERE Vehicle.vehicleID = Inventories.vehicleID AND Vehicle.vehicleID = 2) AS amount FROM Vehicle WHERE Vehicle.vehicleID =";
                // $sql = "SELECT year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description, (SELECT SUM(amount) as amount FROM Vehicle, Inventories WHERE Vehicle.vehicleID = Inventories.vehicleID AND Vehicle.vehicleID =";
                // $sql = "SELECT year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description, (SELECT SUM(amount) as amount FROM Vehicle, Inventories WHERE Vehicle.vehicleID = Inventories.vehicleID AND Vehicle.vehicleID =";
                // $sql = $sql.$vehicleID;
                $sql = "SELECT year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description, (SELECT SUM(amount) as amount FROM Vehicle, Inventories WHERE Vehicle.vehicleID = Inventories.vehicleID AND Vehicle.vehicleID =";
                $sql = $sql.$vehicleID;
                $sql = $sql.") AS amount FROM Vehicle WHERE Vehicle.vehicleID =";
                $sql = $sql.$vehicleID;
                // $statement = mysqli_prepare($connection, $sql);
                // mysqli_stmt_bindm($statement, 'i', $vehicleID);
                // mysqli_stmt_bindm($statement, 'i', $vehicleID);


                if ($connection -> connect_error) {
                  die("Connection failed: " . $connection -> connect_error);
                }
                // echo "Connected to Server.";
                if ($error != null) {
                  $output = "<p>Unable to connect to database!</p>";
                  exit($output);
                } else {
                  // $vehicleID = $_GET['id'];
                  // $sql = $sql.$vehicleID;
                  // echo "outside of results";
                  if ($results = mysqli_query($connection, $sql)) {
                    // echo "in results";
                    // if($results->num_rows === 0) {
                    //   echo "Cart is Empty. SKRRRRT on over to our vehicle fleet.";
                    // }
                    // while ($row = mysqli_fetch_row($results)) {
                    $row = mysqli_fetch_row($results);
                      $year = $row[0];
                      $make = $row[1];
                      $model = $row[2];
                      $price = $row[3];
                      $bodyType = $row[4];
                      $transmission = $row[5];
                      $drivetrain = $row[6];
                      $engine = $row[7];
                      $fuel = $row[8];
                      $exterior = $row[9];
                      $seats = $row[10];
                      $description = $row[11];
                      $amount = $row[12];
                      $vehiclePicStr = $year."-".$make."-".$model;
                      // $vehicleName = $year." ".$make." ".$model;
                      // $productLink = "product.php?id='".$vehicleID."'";

                      // echo $year;

                      // echo '<div class="cartEntry"><div class="cartCol leftCol"><div class="thumbContainer">';
                      // echo '<a href="'.$productLink.'"><img src="images/'.$vehiclePicStr.'.jpg"></a></div></div>';
                      // echo '<div class="cartCol middleCol"><div class="cartProductName">';
                      // echo '<a href="'.$productLink.'" class="searchLink">'.$vehicleName.'</a></div></div>';
                      // echo '<div class="cartCol rightCol"><div class="cartPrice"><p>Unit Price:</p>';
                      // echo '<p>'.str_replace("USD","$",money_format('%i',$price)).'</p></div>';
                      // echo '<div class="cartPrice"><p>Quantity:</p>';
                      // echo '<p>'.$quantity.'</p></div>';
                      // echo '<div class="cartDeleteContainer"><a class="formatButton" href="action/removeFromCart.php?id='.$vehicleID.'">Remove Item</a></div></div></div>';
                    // }

                //     mysqli_free_result($results);
                //   }
                //   mysqli_close($connection);
                // }
              ?>

              <div class="cartEntry">
                <div class="cartCol leftCol">
                  <div class="thumbContainer noHover">
                    <?php echo '<img src="images/'.$vehiclePicStr.'.jpg">'; ?>
                  </div>
                <!-- <a href="product.php" class="searchLink">2018 Bentley Continental GT3</a> -->
                </div>
                <div class="cartCol middleCol">
                  <!-- <div class="midFlex"> -->
                    <div class="productName">
                      <p><?php echo $year; ?></p>
                      <p><?php echo $make; ?></p>
                      <p><?php echo $model; ?></p>
                    </div>
                    <table>
                      <tr>
                        <td class="attributeType">Body Type:</td>
                        <td class="attributeValue"><?php echo $bodyType; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Transmission:</td>
                        <td class="attributeValue"><?php echo $transmission; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Drivetrain:</td>
                        <td class="attributeValue"><?php echo $drivetrain; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Engine:</td>
                        <td class="attributeValue"><?php echo $engine; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Fuel:</td>
                        <td class="attributeValue"><?php echo $fuel; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Colour:</td>
                        <td class="attributeValue"><?php echo $exterior; ?></td>
                      </tr>
                      <tr>
                        <td class="attributeType">Seats:</td>
                        <td class="attributeValue"><?php echo $seats; ?></td>
                      </tr>
                    </table>
                  <!-- </div> -->
                </div>
                <div class="cartCol rightCol">
                  <div class="productPrice">
                    <p>Price:</p>
                    <?php echo '<p>'.str_replace("USD","$",money_format('%i',$price)).'</p>'; ?>
                  </div>
                  <div class="productPrice">
                    <p>Quantity:</p>
                    <select class="quantityCount">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                    </select>
                  </div>
                  <div class="productPrice">
                    <input type="button" class="formatButton" value="Add to Cart">
                  </div>
                </div>
              </div>
              <?php                     mysqli_free_result($results);
                                }
                                mysqli_close($connection);
                              }
                              ?>
              <div class="descriptionContainer">
                <p>Item description. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Pellentesque habitant morbi tristique senectus. Habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat.</p>
              </div>

                <div>
                    <h1 class="commentHeader">Comments</h1>


                    <ul id="commentList">
                        <li>
                            <div class="prodComment">
                                <div class="inlineEle username">
                                    <p>Bob Marsh</p>
                                </div>
                                <h3 class="inlineEle">We need Comments</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Pellentesque habitant morbi tristique senectus. Habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat.</p>
                                <button type="button" name="reply">Reply</button>
                            </div>
                        </li>
                        <li>
                            <div class="prodComment">
                                <div class="inlineEle username">
                                    <p>Some other Fella</p>
                                </div>
                                <h3 class="inlineEle">There aren't enough comments</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <button type="button" name="reply">Reply</button>
                            </div>
                        </li>

                        <?php if (isset($_SESSION['username'])) { ?>
                          <div id="newCommentBox">
                            <h3>New Comment:</h3>
                            <textarea id="newCommentTitle" name="newCommentTitle" rows="1" cols="80"></textarea>
                            <textarea id="newComment" name="newComment" rows="8" cols="80"></textarea>
                            <button type="button" id="commentSubmit" class="formatButton">Post</button>
                          </div>
                          <script type="text/javascript" src="js/addComment.js"></script>
                        <?php } else { ?>
                          <i>Please login to post a comment.</i>
                        <?php } ?>
                    </ul>

                </div>
            </section>
        </div>

        <?php include "include/footer.php" ?>

    </main>

</body>

</html>
