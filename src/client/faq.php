<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <section class="mainView">
                <section class="mainPageBody">
                    <script type="text/javascript" src="js/lad.js"></script>
                    <div class="container">
                        <div class="mySlides fade">
                            <div class="numbertext">1 / 6</div>
                            <img src="images/amggt.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <div class="numbertext">2 / 6</div>
                            <img src="images/bentley.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <div class="numbertext">3 / 6</div>
                            <img src="images/edo.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <div class="numbertext">4 / 6</div>
                            <img src="images/mansory.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <div class="numbertext">5 / 6</div>
                            <img src="images/rs5.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <div class="numbertext">6 / 6</div>
                            <img src="images/singer.jpg" style="width:100%">
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>
                        <div class="caption-container">
                            <p id="caption"></p>
                        </div>
                        <div class="row">
                            <div class="column">
                                <img class="demo cursor" src="images/amggtThumb.jpg" style="width:100%" onclick="currentSlide(1)" alt="Mercedes-Benz AMG GT43 4-Door">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="images/bentleyThumb.jpg" style="width:100%" onclick="currentSlide(2)" alt="Bentley Continental GT3">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="images/edoThumb.jpg" style="width:100%" onclick="currentSlide(3)" alt="AMG GTR Edo Competition">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="images/mansoryThumb.jpg" style="width:100%" onclick="currentSlide(4)" alt="Mercedes AMG S63 Mansory Signature Edition">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="images/rs5Thumb.jpg" style="width:100%" onclick="currentSlide(5)" alt="Audi RS5 Coupe">
                            </div>
                            <div class="column">
                                <img class="demo cursor" src="images/singerThumb.jpg" style="width:100%" onclick="currentSlide(6)" alt="Porsche 911 Targa Reimagined by Singer">
                            </div>
                        </div>
                    </div>
                    <section class="mainContent">
                        <h1 class="titlePara">Vehicle Emporium FAQ</h1>
                        <p class="para">
                            We will answer your questions!
                        </p>
                        <p class="para">Why have I not received my car?</p>
                        <p class="para">You have a 1/300 chance of not receiving a car.</p>
                        <p class="para">How do I cancel my order?</p>
                        <p class="para">All cars sales are final.</p>
                        <p class="para">How do I delete my account?</p>
                        <p class="para">Go into your user settings and press the delete button.</p>
                        <p class="para"><a href="contact.php" class="email">Contact us</a> if you have any questions!</p>
                    </section>
                </section>
            </section>
        </div>
        <?php include "include/footer.php" ?>
    </main>
</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>
