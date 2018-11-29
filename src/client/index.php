<?php session_start(); ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "sidesearch.php"; ?>
            <!-- Page code -->
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
                        <a class="prev" onclick="plusSlides(-1)"><</a>
                        <a class="next" onclick="plusSlides(1)">></a>
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
                        <h1 class="titlePara">Welcome to Vehicle Emporium!</h1>
                        <p class="para">
                            Spicy jalapeno bacon ipsum dolor amet eu short ribs adipisicing in ipsum ribeye, doner pork chop pariatur porchetta laborum id cupidatat beef ribs sint. Ipsum reprehenderit beef lorem culpa, labore pork picanha pancetta anim. Bacon cow strip steak shoulder porchetta nisi. Eiusmod sint biltong sunt, dolore in salami jerky fugiat rump turducken meatloaf lorem hamburger ut. Pancetta chuck alcatra sed excepteur voluptate.

                        </p>
                        <h2>Pre-shipment Quality Inspection</h2>
                        <table class="dataCrit">
                            <tr>
                                <th>Criteria</th>
                                <th>Inspection Level</th>
                                <th>AOL</th>
                            </tr>
                            <tr>
                                <td>1000ml Water Tight Test</td>
                                <td>G-1</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Visual Inspection</td>
                                <td>G-1</td>
                                <td>1.5</td>
                            </tr>
                            <tr>
                                <td>Visual Inspection</td>
                                <td>G-1</td>
                                <td>2.5</td>
                            </tr>
                            <tr>
                                <td>Dimension</td>
                                <td>S-2</td>
                                <td>4.0</td>
                            </tr>
                            <tr>
                                <td>Physical Properties</td>
                                <td>S-2</td>
                                <td>4.0</td>
                            </tr>
                        </table>
                        <p class="para">
                            Spicy jalapeno bacon ipsum dolor amet eu short ribs adipisicing in ipsum ribeye, doner pork chop pariatur porchetta laborum id cupidatat beef ribs sint. Ipsum reprehenderit beef lorem culpa, labore pork picanha pancetta anim. Bacon cow strip steak shoulder porchetta nisi. Eiusmod sint biltong sunt, dolore in salami jerky fugiat rump turducken meatloaf lorem hamburger ut. Pancetta chuck alcatra sed excepteur voluptate.
                        </p>
                    </section>
                </section>
            </section>
        </div>

        <?php include "include/footer.php"; ?>

    </main>

</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>
