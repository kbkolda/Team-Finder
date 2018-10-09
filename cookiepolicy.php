
<?php include "base.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="images/favicon.ico" type="image/ico">
		<title>Overwatch Team Finder</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div class="main">
			<nav>
				<ul>
					<li><a href="index.php"><font style="font-family: Overwatch;"> Overwatch Team Finder </font></a></li>
					<li><a href="players.html"><font style="font-family: Overwatch;"> Players </font></a></li>
					<?php 
						if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true):
					?>
							<li><a href="logout.php"><font style="font-family: Overwatch;"> Logout </font></a></li>
					<?php else: ?>
							<li><a href="login2.php"><font style="font-family: Overwatch;"> Sign In </font></a></li>
							<li><a href="signup.php"><font style="font-family: Overwatch;"color="#218ffe"> Sign Up </font></a></li>
					<?php endif;?>
				</ul>
			</nav>
			<div class="agreement">
				<p>Cookie policy goes here</p>
			</div>
		</div>
		<div class="sidebar">
			<h2><font style="font-family: Overwatch;"> 0 </font></h2>
			<h3><font style="font-family: Overwatch;"> Users searching for a team </font></h3>
			<h3>Find a player</h3>
			<button class="attack">Attack<i class="fa fa-caret-down"></i></button>
				<div class="attack-dropdown">
					<a href="#" class="doomfist">Doomfist</a>
					<a href="#" class="doomfist">Genji</a>
					<a href="#" class="doomfist">McCree</a>
					<a href="#" class="doomfist">Pharah</a>
					<a href="#" class="doomfist">Reaper</a>
					<a href="#" class="soldier">Soldier: 76</a>
					<a href="#" class="doomfist">Sombra</a>
					<a href="#" class="doomfist">Tracer</a>
				</div>
			<button class="attack">Defense<i class="fa fa-caret-down"></i></button>
				<div class="attack-dropdown">
					<a href="#" class="doomfist">Bastion</a>
					<a href="#" class="doomfist">Hanzo</a>
					<a href="#" class="doomfist">Junkrat</a>
					<a href="#" class="doomfist">Mei</a>
					<a href="#" class="doomfist">Torb</a>
					<a href="#" class="soldier">Widowmaker</a>
				</div>
			<button class="attack">Tank<i class="fa fa-caret-down"></i></button>
				<div class="attack-dropdown">
					<a href="#" class="doomfist">D.Va</a>
					<a href="#" class="doomfist">Orisa</a>
					<a href="#" class="doomfist">Reinhardt</a>
					<a href="#" class="doomfist">Roadhog</a>
					<a href="#" class="doomfist">Winston</a>
					<a href="#" class="soldier">Zarya</a>
				</div>
			<button class="attack">Support<i class="fa fa-caret-down"></i></button>
				<div class="attack-dropdown">
					<a href="#" class="doomfist">Ana</a>
					<a href="#" class="doomfist">Brigitte</a>
					<a href="#" class="doomfist">Lucio</a>
					<a href="#" class="doomfist">Mercy</a>
					<a href="#" class="doomfist">Moira</a>
					<a href="#" class="soldier">Symmetra</a>
					<a href="#" class="soldier">Zenyatta</a>
				</div>
		</div>
		<?php 
			if(isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == true){
			?>
			<div class="profile-sidebar">
				<h1>Welcome, <?=$_SESSION['username']?></h1>
				<h1>Genji#1124</h1>
				<div class="character-icon">
					<img src="images/genji.png"  alt="character-icon">
				</div>
				<h2>2600</h2>
				<div class="rank-icon">
					<img src="images/rank-icons/platinum.png" height=20 width=20  alt="rank-icon">
				</div>
			</div>
			<?php 
			} 
			?>
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