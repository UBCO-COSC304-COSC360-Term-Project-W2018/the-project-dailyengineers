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

              <div class="cartEntry">
                <div class="cartCol leftCol">
                  <div class="thumbContainer">
                    <a href="product.php"><img src="images/bentleyThumb.jpg"></a>
                  </div>
                <!-- <a href="product.php" class="searchLink">2018 Bentley Continental GT3</a> -->
                </div>
                <div class="cartCol middleCol">
                  <!-- <div class="midFlex"> -->
                    <div class="productName">
                      <p>Year</p>
                      <p>Make</p>
                      <p>Model</p>
                    </div>
                    <table>
                      <tr>
                        <td class="attributeType">Body Type:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Transmission:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Drivetrain:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Engine:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Fuel:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Colour:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                      <tr>
                        <td class="attributeType">Seats:</td>
                        <td class="attributeValue">VALUE</td>
                      </tr>
                    </table>
                  <!-- </div> -->
                </div>
                <div class="cartCol rightCol">
                  <div class="productPrice">
                    <p>Price:</p>
                    <p>$1,000,000</p>
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
