<?php session_start(); ?>
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

    <?php include 'header.php';?>

    <main>

        <div class="columnContainer">

            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->

            <section class="mainView">
              <h1>Product Listing</h1>
                <span class="half prodLeft">
                    <div>
                        <p>20XX-Zeppelin-Carousel</p>
                    </div>
                    <img class="containedImg" src="images/bentley.jpg">
                    <div>
                        <div id="qty" class="inlineEle">
                            <p>3 remaining</p>
                        </div>
                        <button id="cartButton" class="inlineEle prodRight">Add to cart</button>
                    </div>
                </span>
                <span class="half prodRight">
                    <div class="inlineEle">
                        <p>$1,000,000.00</p>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum varius sit amet mattis vulputate enim nulla. Mauris nunc congue nisi vitae suscipit tellus. Duis ultricies lacus sed turpis tincidunt id aliquet. Tellus at urna condimentum mattis pellentesque.</p>
                    </div>
                </span>

                <div id="flavourText">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum varius sit amet mattis vulputate enim nulla. Mauris nunc congue nisi vitae suscipit tellus. Duis ultricies lacus sed turpis tincidunt id aliquet. Tellus at urna condimentum mattis pellentesque.</p>
                </div>
                <div>
                    <h2>Comments</h2>
                    <ul>
                        <li>
                            <div class="prodComment">
                                <div class="inlineEle username">
                                    <p>Bob Marsh</p>
                                </div>
                                <h3 class="inlineEle">We need Comments</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc sed. Pellentesque habitant morbi tristique senectus. Habitant morbi tristique senectus et netus et malesuada. Ullamcorper malesuada proin libero nunc consequat.</p>
                            </div>
                        </li>
                        <li>
                            <div class="prodComment">
                                <div class="inlineEle username">
                                    <p>Some other Fella</p>
                                </div>
                                <h3 class="inlineEle">There aren't enough comments</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </li>
                    </ul>

                </div>
            </section>
        </div>

        <?php include "footer.php" ?>

    </main>

</body>

</html>