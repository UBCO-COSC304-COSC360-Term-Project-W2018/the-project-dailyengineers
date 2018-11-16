<!DOCTYPE HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>COSC VE Login</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/account.css">
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
                        <option value="5">6+ seats</option>
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
                <form method="GET" action="#">
                    <div class="left">
                        <fieldset id="imgInput">
                            <img src="images/220px-Darth_Vader.jpg">
                            <input type="file" name="profile" accept="image/*">
                        </fieldset>
                        <button>Payment Method</button>
                        <button>Order History</button>
                        <button>Comment History</button>
                    </div>
                    <fieldset class="acRight">
                        <h3>Username:</h3>
                        <input name="user" type="text">
                        <p>Lord_Vader</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Email:</h3>
                        <input name="email" type="email">
                        <p>darksider@hotmail.com</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Password:</h3>
                        <input name="pass" type="password">
                        <h3 class="passConfirmh3">Confirm Password:</h3>
                        <input id="passConfirm" type="password">
                        <div></div>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>First name:</h3>
                        <input name="firstname" type="text">
                        <p>Anakin</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Last name:</h3>
                        <input name="lastname" type="text">
                        <p>Skywalker</p>
                        <button>Edit</button>
                    </fieldset>
                    <fieldset class="acRight">
                        <h3>Address:</h3>
                        <input name="addr" type="text">
                        <p>423 Lava Rd. Mustafar</p>
                        <button>Edit</button>
                    </fieldset>
                    <input id="saveBt" class="acRight" type="submit" value="Save Changes">
                </form>
            </section>
        </div>

        <?php include "footer.php" ?>

    </main>

</body>

</html>