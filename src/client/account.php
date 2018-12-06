<?php session_start();
if (!isset($_SESSION['username'])) {
    //not logged in (Guest) GET OUT
    header("Location: login.php");
    die();
} else {
    include 'include/db_credentials.php';
    $connection = mysqli_connect($host, $user, $password, $database);
    $error = mysqli_connect_error();
    $uid = $_SESSION['userID'];

    $sql = "SELECT * FROM Admin WHERE userID='$uid'";
    if ($connection -> connect_error) {
        die("Connection failed: " . $connection -> connect_error);
    }
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        if ($results = mysqli_query($connection, $sql)) {
            while ($returned = mysqli_fetch_row($results)) {
                echo "I'm an Admin!";
                echo $returned;
                header('Location: admin.php');
            }
        } mysqli_free_result($results);


        //echo "Error: " . $sql . " " . mysqli_error($connection);
    }

    $sql = "SELECT * FROM Customer WHERE userID='$uid';";
    // echo "Connected to Server.";
    if ($error != null) {
        $output = "<p>Unable to connect to database!</p>";
        exit($output);
    } else {
        if ($results = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_row($results)) {
                $first_name = $row[1];
                $last_name = $row[2];
                $address = $row[3];
                $username = $_SESSION['username'];
                $email = $_SESSION['email'];
                if ($row[4]==null) {
                    $img_src = "<img id='profilePic' src='images/profilePlaceholder.png'/>";
                } else {
                    $img_src = "<img id='profilePic' src='data:image/jpg;base64,".base64_encode($row[4])."'/>";
                    
                }
            }
        }
        mysqli_free_result($results);
    }
    mysqli_close($connection);
}
?>

<html>

<head>
  <meta charset="utf-8">
  <title>COSC VE Login</title>
  <link rel="stylesheet" href="css/reset.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/mad.css"> -->
  <link rel="stylesheet" href="css/general.css">
  <link rel="stylesheet" href="css/cart.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- <script src="js/editprofile.js"></script> -->
  <link rel="stylesheet" href="css/account.css">
</head>

<body>
  <?php include 'include/header.php'; ?>
  <main>
    <div class="columnContainer">
      <!-- Sidebar code -->
      <?php include "include/sidesearch.php"; ?>
      <!-- Page code -->
      <section class="mainView">
        <h1>User Control Panel</h1>


        <form id="updateInfo" name="updateInfo" method="POST" action="./action/modAccount.php"  enctype="multipart/form-data">
          <div class="shippingBilling">
            <div id="shippingForm">
              <fieldset>
                <legend>User Image</legend>
                <?php echo $img_src ?>
                <input class="accMod" type="file" name="profilePic" accept="image/x-png" disabled="disabled">
              </fieldset>
              <a class="formatButton" href="orderStatus.php">Order History</a>
              <a class="formatButton" href="commentHistory.php">Comment History</a>
            </div>
            <div id="billingForm">
              <fieldset>
                <legend>Profile</legend>
                <h2>Username:</h2>
                <p class=accountP>
                  <?php echo $username; ?>
                </p>
                <!-- <input type="text" name="billingFullName" class="required"> -->
                <h2>Email:</h2>
                <input type="email" id="accountEmail" name="accountEmail" class="required accMod" value="<?php echo $email; ?>" placeholder="<?php echo $email; ?>" disabled="true">
                <h2>Password:</h2>
                <input type="password" id="accountPassword" name="accountPassword" class="required accMod" value="" placeholder="" disabled="true">
                <h2 class="hide">Confirm Password:</h2>
                <input type="password" id="confirmPassword" class="required accMod hide" value="" placeholder="" disabled="true">
                <h2>First Name:</h2>
                <input type="text" id="accountFirstName" name="accountFirstName" class="required accMod" value="<?php echo $first_name; ?>" placeholder="<?php echo $first_name; ?>" disabled="true">
                <h2>Last Name:</h2>
                <input type="text" id="accountLastName" name="accountLastName" class="required accMod" value="<?php echo $last_name; ?>" placeholder="<?php echo $last_name; ?>" disabled="true">
              </fieldset>
              <!-- <a class="accountButton" id="editProfile" href="cart.php">Edit Profile</a>
                  <a class="accountButton" id="saveProfile" href="cart.php">Save Changes</a> -->
              <input type="button" id="editProfile" value="Edit Profile" class="formatButton">
              <input type="button" id="saveProfile" value="Save Changes" class="formatButton accMod hide">
              <input type="button" id="cancelEdit" value="Cancel" class="formatButton accMod" disabled="disabled">

              <p id="errorP"></p>


              <script type="text/javascript">
                $(document).ready(function() {

                  document.getElementById("editProfile").addEventListener("click", function() {
                    editProfile();
                  });

                  document.getElementById("cancelEdit").addEventListener("click", function(){
                    cancelClick()
                  });

                  document.getElementById("saveProfile").addEventListener("click", function(){
                    validateAccountForm();
                  });

                  function editProfile() {
                    $(".accMod").each(function(i, el) {
                      $(this).removeAttr("disabled");
                    });
                    $('.hide').each(function(i, el) {
                      $(this).css("display", "block");
                    });
                    document.getElementById("editProfile").style.display = "none";
                    $("#editProfile").attr("disabled", "disabled");
                    $("#cancelEdit").css("visibility", "visible");

                  };

                  function cancelClick(){
                    $(".accMod").each(function(i, el){
                      $(this).attr("disabled", "disabled");
                    });
                    $('.hide').each(function(i, el) {
                      $(this).css("display", "none");
                    });
                    $('input.accMod').each(function(i,e){
                      $(this).attr("value", $(this).attr("placeholder"));
                    });
                    document.getElementById("editProfile").style.display = "block";
                    $("#editProfile").removeAttr("disabled");
                    $("#cancelEdit").css("visibility", "hidden");
                  };

                  function validateAccountForm(){

                    var nameRe = /^[a-zA-Z]+$/;
                    var emailRe = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$/;
                    var passes = true;
                    $(".required").each(function(){
                      if($(this).val()==""){
                        $("#errorP").text("You must fill out all required fields.");
                        passes = false;
                        return false;
                      }
                    });
                    if(!(emailRe.test($("#accountEmail").val().toLowerCase()))){
                      $("#errorP").text("You have entered and invalid email.");
                      passes=false;
                      return false;
                    } else if(!(nameRe.test($("#accountFirstName").val())&&nameRe.test($("#accountLastName").val()))){
                      $("#errorP").text("Your first and last name must contain only letters.");
                      passes=false;
                      return false;
                    } else if($("#accountPassword").val()!=$("#confirmPassword").val()){
                      $("#errorP").text("The entered passwords do not match.");
                      passes=false;
                      return false;
                    } else if(passes==true){ //else submit form
                      document.getElementById("updateInfo").submit();
                    }

                  };

                });
              </script>
            </div>
          </div>
        </form>
      </section>
    </div>

    <?php include "include/footer.php" ?>

  </main>

</body>

</html>
