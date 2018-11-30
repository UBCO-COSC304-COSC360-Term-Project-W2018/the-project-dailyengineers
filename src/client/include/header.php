<header>
	<div class="headerContainer">
	  <div class="flexHeaderTop">
		<a href="index.php"><img src="images/placeholder-logo.png" id="headerLogo"></a>
		<form action="search.php" class="searchForm">
		  <input type="text" placeholder="Search our database..." name="search" id="searchField">
		  <button type="submit"></button>
		</form>
	  </div>
	  <div class="flexHeaderBottom">
		<div class="flexBottomLeft">
		  <nav class="navHeader">
			<ul class="inlineNav">
			  <li><a href="#">Root</a></li>
			  <li><a href="#">Category 1</a></li>
			  <li><a href="#">Category 3</a></li>
			  <li><a href="#">Category 4</a></li>
			</ul>
		  </nav>
		</div>
		<div class="flexBottomRight">
		  <ul class="headerRightLinks">
			<li><a href="#" id="trending">Trending</a></li>
			<li><a href="#" id="deals">Deals</a></li>
			<?php
			if(isset($_SESSION['username'])) {
				//Logged in
				?><li><a href="../action/logout.php" id="loginSignup">Logout</a>
				<li><a href="account.php" id="account">Account</a><?php
			} else {
				//guest
				?><li><a href="login.php" id="loginSignup">Login/Signup</a></li><?php
			}?>
			<li><a href="cart.php" id="cart">Cart</a></li>
		  </ul>
		</div>
	  </div>
	</div>
</header>
