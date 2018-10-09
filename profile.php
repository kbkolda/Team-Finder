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
			$battletag="";
			$platform="";
			if(isset($_POST["battletag"])){
				$battletag = mysqli_real_escape_string($con,($_POST["battletag"]));
			}
			if(isset($_POST["platform"])){
				$platform = mysqli_real_escape_string($con,($_POST["platform"]));
			}

			?> 
			
			<div class="change-profile">
				<form action="profile.php" name="change-username" id="change-username" method="POST">
					<label for="battletag">Edit Battletag</label><br>
					<input type="text" id="battletag" name="battletag"><br>
					<label for="platform">Edit Platform</label><br>
						<label class="radio-platform">
							<input type="radio" name="platform" value="pc">PC
						</label>
						<label class="radio-platform">
							<input type="radio" name="platform" value="ps4">PS4
						</label>
						<label class="radio-platform">
							<input type="radio" id="platform" name="platform" value="xbox">XBOX
						</label>
						<br>
					<button name="submit" type="submit">Submit</button><br>
				</form>
				<?php
					$registerquery = mysqli_query($con, "Update users SET Platform = '$platform', Battletag = '$battletag' WHERE Username = '".$_SESSION["username"]."'");
				?>
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