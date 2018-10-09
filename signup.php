<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/favicon.ico" type="image/ico">
		<title>Sign-Up</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body id="background">
		<div id="main">
			<nav>
				<ul>
					<li><a href="index.php"><font style="font-family: Overwatch;"> Overwatch Team Finder </font></a></li>
					<li><a href="players.html"><font style="font-family: Overwatch;"> Players </font></a></li>
					<?php 
					if(!isset($_SESSION)) 
					{ 
						session_start(); 
					}
					$validUser = isset($_SESSION["login"]) === true;
					
						if($validUser):?>
							<li><a href="logout.php"><font style="font-family: Overwatch;"> Logout </font></a></li>
					<?php else: ?>
							<li><a href="login2.php"><font style="font-family: Overwatch;"> Sign In </font></a></li>
							<li><a href="signup.php"><font style="font-family: Overwatch;" color="#218ffe"> Sign Up </font></a></li>
					<?php endif;?>
				</ul>
			</nav> 
			<div class="sidebar">
				<h2><font style="font-family: Overwatch;"> 0 </font></h2>
				<h3> Users searching for a team </h3>
				<h3>Find a player</h3>
				<button class="attack">Attack<i class="fa fa-caret-down"></i></button>
					<div class="attack-dropdown">
						<a href="#">Doomfist</a>
						<a href="#">Genji</a>
						<a href="#">McCree</a>
						<a href="#">Pharah</a>
						<a href="#">Reaper</a>
						<a href="#">Soldier: 76</a>
						<a href="#">Sombra</a>
						<a href="#">Tracer</a>
					</div>
				<button class="attack">Defense<i class="fa fa-caret-down"></i></button>
					<div class="attack-dropdown">
						<a href="#">Bastion</a>
						<a href="#">Hanzo</a>
						<a href="#">Junkrat</a>
						<a href="#">Mei</a>
						<a href="#">Torb</a>
						<a href="#">Widowmaker</a>
					</div>
				<button class="attack">Tank<i class="fa fa-caret-down"></i></button>
					<div class="attack-dropdown">
						<a href="#">D.Va</a>
						<a href="#">Orisa</a>
						<a href="#">Reinhardt</a>
						<a href="#">Roadhog</a>
						<a href="#">Winston</a>
						<a href="#">Zarya</a>
					</div>
				<button class="attack">Support<i class="fa fa-caret-down"></i></button>
					<div class="attack-dropdown">
						<a href="#">Ana</a>
						<a href="#">Brigitte</a>
						<a href="#">Lucio</a>
						<a href="#">Mercy</a>
						<a href="#">Moira</a>
						<a href="#">Symmetra</a>
						<a href="#">Zenyatta</a>
					</div>
			</div>
			<?php
			$username="";
			$password="";
			$email="";
			$md5 = 'd67c5cbf5b01c9f91932e3b8def5e5f8';
			if(isset($_POST["username"])){
				$username = mysqli_real_escape_string($con,($_POST["username"]));
			}
			if(isset($_POST["password"])){
				if(empty($password)){
					$errmsg = "Please enter a password";
				}
				$password = md5(mysqli_real_escape_string($con,($_POST["password"])));
			}
			if(isset($_POST["email"])){
				$email = mysqli_real_escape_string($con,($_POST['email']));
			}
			$checkusername = mysqli_query($con, "SELECT * FROM users WHERE Username = '".$username."'");

			?> 
				 
			<div class="loginform">
				<form action="signup.php" name="registerform" id="registerform" method="POST">
					<label for="username">Username</label><br>
					<input type="text" id="username" name="username"><br>
				<?php 	
						if(($username == "") && (isset($_POST["username"]))){ 
				?>
							<div class="wrong">
								<p>Sorry, that is not a valid username</p><br>
							</div>
				<?php 	} 
						elseif(mysqli_num_rows($checkusername) == 1 && (isset($_POST["username"])))
						{ 
				?>
						<div class="wrong">
							<p>Sorry, that username is taken</p><br>
						</div>
				<?php
						} 
				?>
					
					

					
					<label for="password">Password (6 or more characters)</label><br>
					<input type="password" id="password" name="password"><br>
				<?php 	
						if($password == $md5){ 
				?>
							<div class="wrong-password">
								<p>Please enter a password</p><br>
							</div>
				<?php
				}
				?>
					<label for="email">Email</label><br>
					<input type="text" id="email" name="email"><br>
				<?php 	
						if(empty($email)){ 
				?>
							<div class="wrong">
								<p>Please enter a valid email</p><br>
							</div>
				<?php
				}
				?>
					<input type="submit" name="register" id="register" value="Sign Up">
					<div class="agree">
						<p>By signing up, you agree to our</p>
						<a href="useragreement.html">User Agreement,</a><br>
						<a href="privacypolicy.html">Privacy Policy,</a>
						<p>and </p>
						<a href="cookiepolicy.html">Cookie Policy</a>.<br>
					<?php
					if(mysqli_num_rows($checkusername) == 0 && ($username !== ""))
					{
						$registerquery = mysqli_query($con, "INSERT INTO users (Username, Password, EmailAddress) VALUES('".$username."', '".$password."', '".$email."')");
						if($registerquery)
						{ 
					?>
								<br><br><p>Your account was successfully created.</p><br>
								<p>Please <a href="login2.php">click here to login</a>.</p>
					<?php 
						}
							else
							{
								echo "<p>Sorry, registration failed. Please go back and try again.</p>";    
							}       
					}
					?>
						</div>
				</form>
			</div>
			
		</div>
		<div class="footer">
			<ul>
				<li>logo</li><br><br>
				<div class="media">
					<li><a href="https://discord.gg/xpm3KcY"><img src="images/discord3.png" width=40 height=40 alt="Discord"></a></li>
					<li><a href="https://twitter.com/?lang=en"><img src="images/twitter3.png" width=40 height=40 alt="Twitter"></a></li>
					<li><a href="https://www.facebook.com/"><img src="images/facebook3.png" width=40 height=40 alt="Facebook"></a></li><br><br>
				</div>
				<div class="agreements">
					<li><a href="useragreement.php">User Agreement</a></li>
					<li><a href="privacypolicy.php">Privacy Policy</a></li>
					<li><a href="cookiepolicy.php">Cookie Policy</a></li>
				</div>
			</ul>
		</div>
		<script>
			//* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
			var dropdown = document.getElementsByClassName("attack");
			var i;

			for (i = 0; i < dropdown.length; i++) {
			  dropdown[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var dropdownContent = this.nextElementSibling;
				if (dropdownContent.style.display === "block") {
				  dropdownContent.style.display = "none";
				} else {
				  dropdownContent.style.display = "block";
				}
			  });
			}
		</script>
	</body>
</html>