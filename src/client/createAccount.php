<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Vehicle Emporium - Create Account</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/mad.css">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/createAccount.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <?php include 'include/header.php';?>
    <main>
        <div class="columnContainer">
            <!-- Sidebar code -->
            <?php include "include/sidesearch.php"; ?>
            <!-- Page code -->
            <section class="mainView">
              <h1>Create Account</h1>
                <form id="createAccount" method="POST" action="action/newUser.php">
                <!--  enctype="multipart/form-data" -->
                  <fieldset>
                    <legend>Account Information</legend>
                    <!-- <div id="imgInput">
                        <img src="images/profilePlaceholder.png">
                        <input type="file" name="profile" accept="image/*">
                    </div> -->
                    <p>Username:</p>
                    <input id="username" class="required" name="user" type="text">
                    <p>Email:</p>
                    <input id="accountEmail" class="required" name="email" type="email">
                    <p>First name:</p>
                    <input id="accountFirstName" class="required" name="firstName" type="text">
                    <p>Last name:</p>
                    <input id="accountLastName"class="required" name="lastName" type="text">
                    <p>Password:</p>
                    <input id="accountPassword" class="required" name="pass" type="password">
                    <p>Confirm Password:</p>
                    <input id="confirmPassword" class="required" type="password">
                    <br />
                    <input id="createButton" type="button" value="Create Account">
                    <p id="errorP"></p>
                  </fieldset>
                  <script>

                  $(document).ready(function() {


                  document.getElementById("createButton").addEventListener("click", function(){
                    validateAccountForm();
                  });


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
                      document.getElementById("createAccount").submit();
                    }

                  };
                });
                  </script>
                </form>
            </section>
        </div>
        <footer>
            <?php include "include/footer.php"; ?>
        </footer>
    </main>
</body>
</html>
