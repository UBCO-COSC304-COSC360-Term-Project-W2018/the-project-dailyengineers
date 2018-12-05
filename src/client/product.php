<?php
  session_start();
  if (isset($_SESSION['userID'])) {
    $recView = $_SESSION['recentlyViewedArr'];
    if ($_GET['id'] == $recView[0] || $_GET['id'] == $recView[1] || $_GET['id'] == $recView[2]) {

    } else {
      array_unshift($_SESSION['recentlyViewedArr'], $_GET['id']);
    }
  }
?>
<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE Product Ex</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

    <?php include 'include/header.php';?>
    <?php include "include/money_format_windows.php" ?>

    <main>

        <div class="columnContainer">

            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->

            <section class="mainView">
              <h1>Product Listing</h1>

              <?php
                include 'include/db_credentials.php';
                $connection = mysqli_connect($host, $user, $password, $database);
                $error      = mysqli_connect_error();
                $vehicleID = $_GET['id'];
                $sql = "SELECT year, make, model, price, bodyType, transmission, drivetrain, engine, fuel, exterior, seats, description, (SELECT SUM(amount) as amount FROM Vehicle, Inventories WHERE Vehicle.vehicleID = Inventories.vehicleID AND Vehicle.vehicleID =";
                $sql = $sql.$vehicleID;
                $sql = $sql.") AS amount FROM Vehicle WHERE Vehicle.vehicleID =";
                $sql = $sql.$vehicleID;
                if ($connection -> connect_error) {
                  die("Connection failed: " . $connection -> connect_error);
                }
                if ($error != null) {
                  $output = "<p>Unable to connect to database!</p>";
                  exit($output);
                } else {
                  if ($results = mysqli_query($connection, $sql)) {
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
                // Closing bracket for IF STATEMENT on LINE 139.
                ?>

              <div class="cartEntry">
                <div class="cartCol leftCol">
                  <div class="thumbContainer noHover">
                    <?php echo '<img src="images/'.$vehiclePicStr.'.jpg">'; ?>
                  </div>
                </div>
                <div class="cartCol middleCol">
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
                </div>
                <div class="cartCol rightCol">
                  <div class="productPrice">
                    <p>Price:</p>
                    <?php echo '<p>$'.str_replace("USD","$",money_format('%i',$price)).'</p>'; ?>
                  </div>
                  <div class="productPrice">
                    <p>Quantity:</p>
                    <form method="get" name="selector" action="action/addToCart.php" class="selectorForm">
                    <select class="quantityCount" name="quantity">
                      <?php
                      $counter = 1;
                      while($counter < ($amount + 1)) {
                        echo '<option value='.$counter.'>'.$counter.'</option>';
                        $counter++;
                      }
                      ?>
                    </select>
                    <input value="<?php echo $vehicleID ?>" name="id" type="hidden">
                  </div>
                  <div class="productPrice">
                    <input type="submit" class="formatButton" value="Add to Cart">
                  </form>
                  </div>
                </div>
              </div>
              <div class="descriptionContainer">
                <p><?php echo $description ?></p>
              </div>

              <?php       // End of IF STATEMENT from LINE 46.
                          mysqli_free_result($results);
                        }
                        mysqli_close($connection);
                      } ?>

                <div>
                  <!-- template for reply fields -->
                    <script id="replyFieldTemplate" type="text/HTML">
                      <div id="tempReplyBox">
                        <h3>New Reply:</h3>
                        <textarea id="replyTitleField" rows="1" cols="80"></textarea>
                        <textarea id="replyField" name="newComment" rows="8" cols="80"></textarea>
                        <button type="button" id="replySubmit" class="formatButton">Reply</button>
                      </div>
                    </script>

                    <!-- template for comments -->
                    <script id="commentTemplate" type="text/HTML">
                      <div class="prodComment" commentID="" depth="0">
                          <div class="inlineEle username">
                              <p>User</p>
                          </div>
                          <h3 class="inlineEle">Title</h3>
                          <p>content</p>
                          <button type="button" name="reply">Reply</button>

                          <!-- a list to contain child comments -->
                          <ul class="replyList">
                          </ul>
                      </div>
                    </script>

                    <h1 class="commentHeader">Comments</h1>

                    <!-- retrieve and display relevant comments -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script type="text/javascript">
                      function postComment(parent) {
                        // if the parent is null, assume this isn't a reply to anything
                        if (parent == null) {
                          parent = $('#commentList');
                        }

                        // create the comment
                        var comment = document.createElement('li');
                        comment.innerHTML = $('#commentTemplate').innerHTML;
                        parent.append(comment);

                        // set some variables for display and the db
                        var parentid;
                        var depth;

                        if (parent == $('#commentList')) {
                          parentid = null;
                          depth = 0;
                        } else {
                          parentid = Number(parent.commentID);
                          depth = Number(parent.depth + 1);
                          comment.style.marginRight = (depth * 5).toString() + " em";
                        }

                        // make ajax call
                        $.post("../action/addComment.php", {
                          title:    comment.children("h3"),
                          content:  comment.children("p"),
                          parentID: parentid,
                          depth:    depth
                        });
                      }
                    </script>

                    <?php if (isset($_SESSION['username'])) { ?>
                      <div id="newCommentBox">
                        <h3>New Comment:</h3>
                        <textarea id="newCommentTitle" name="newCommentTitle" rows="1" cols="80"></textarea>
                        <br>
                        <textarea id="newComment" name="newComment" rows="8" cols="80"></textarea>
                        <button type="button" id="commentSubmit" class="formatButton" onclick="postComment(null)">Post</button>
                      </div>
                    <?php } else { ?>
                      <i>Please login to post a comment.</i>
                    <?php } ?>

                    <ul id="commentList">

                    <?php // populate the list with comments from the database
                      include 'include/db_credentials.php';
                      $connection = mysqli_connect($host, $user, $password, $database);
                      $error      = mysqli_connect_error();

                      if ($connection -> connect_error) {
                          echo "Connection failed: " . $connection -> connect_error;
                      }

                      $sql_query = ""; // TODO add query
                    ?>

                    </ul>

                </div>
            </section>
        </div>
    </main>

</body>

</html>
