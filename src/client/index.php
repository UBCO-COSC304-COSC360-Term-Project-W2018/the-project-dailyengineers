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
  <?php include 'header.php';?>
  <main>
    <div class="columnContainer">
      <section class="leftSidebar">
        <div class="custom-select">
          <select>
            <option value="0">Make:</option>
            <option value="1">Acura:</option>
            <option value="2">Aston Martin</option>
            <option value="3">Audi</option>
            <option value="4">Bentley</option>
            <option value="5">BMW</option>
            <option value="6">Bugatti</option>
            <option value="7">Buick</option>
            <option value="8">Cadillac</option>
            <option value="9">Chevrolet</option>
            <option value="10">Chrystler</option>
            <option value="11">Citroen</option>
            <option value="12">Dodge</option>
            <option value="13">Ferarri</option>
            <option value="14">Fiat</option>
            <option value="15">Ford</option>
            <option value="16">GMC</option>
            <option value="17">Honda</option>
            <option value="18">Hyundai</option>
            <option value="19">Infiniti</option>
            <option value="20">Jaguar</option>
            <option value="21">Jeep</option>
            <option value="22">Kia</option>
            <option value="23">Koenigsegg</option>
            <option value="24">Lamborghini</option>
            <option value="25">Land Rover</option>
            <option value="26">Lexus</option>
            <option value="27">Maserati</option>
            <option value="28">Mazda</option>
            <option value="29">McLaren</option>
            <option value="30">Mercedes-Benz</option>
            <option value="31">Mini</option>
            <option value="32">Mitsubishi</option>
            <option value="33">Nissan</option>
            <option value="34">Pagani</option>
            <option value="35">Peugeot</option>
            <option value="36">Porsche</option>
            <option value="37">Ram</option>
            <option value="38">Renault</option>
            <option value="39">Rolls Royce</option>
            <option value="40">Saab</option>
            <option value="41">Subaru</option>
            <option value="42">Suzuki</option>
            <option value="43">Tesla</option>
            <option value="44">Toyota</option>
            <option value="45">Volkswagen</option>
            <option value="46">Volvo</option>
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
            <option value="5">6+  seats</option>
          </select>
          <select>
            <option value="0">Doors:</option>
            <option value="1">2-Door</option>
            <option value="2">3-Door</option>
            <option value="3">4-Door</option>
            <option value="4">Other</option>
          </select>
        </div>
      </section>
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
                        <h1 class="titlePara">Welcome to Insert Car Group Company Here</h1>
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

        <?php include "footer.php" ?>

    </main>

</body>
<script type="text/javascript" src="js/lad.js"></script>

</html>
