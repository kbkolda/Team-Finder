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
					<li><a href="logout.php"><font style="font-family: Overwatch;"> Logout </font></a></li>
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
			$hero="";
			$sr=0;
			$platform="";
			if(isset($_SESSION["username"])){
				$username = mysqli_real_escape_string($con,($_SESSION["username"]));
			}
			if(isset($_POST["hero"])){
				$hero = mysqli_real_escape_string($con,($_POST["hero"]));
			}
			if(isset($_POST["sr"])){
				$sr = mysqli_real_escape_string($con,($_POST["sr"]));
			}
			if(isset($_POST["platform"])){
				$platform = mysqli_real_escape_string($con,($_POST["platform"]));
			}
			$checkusername2 = mysqli_query($con, "SELECT * FROM queue WHERE Username = '".$username."'");
			?>
			<div class="queueform">
				<form action="queue.php" name="queue-form" id="queue-form" method="POST" onsubmit="submit();">
					<label for="hero">Choose your Hero</label><br>
						<h1>Attackers</h1>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Doomfist"/>
							<img src="images/doomfist.png" title="Doomfist" alt="Doomfist">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Genji"/>
							<img src="images/genji.png" title="Genji">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Mccree"/>
							<img src="images/mccree.png" title="Mccree">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Pharah"/>
							<img src="images/pharah.png" title="Pharah">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Reaper"/>
							<img src="images/reaper.png" title="Reaper">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Soldier"/>
							<img src="images/soldier.png" title="Soldier">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Sombra"/>
							<img src="images/sombra.png" title="Sombra">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Tracer"/>
							<img src="images/tracer.png" title="Tracer">
						</label><br>
						<h1>Defenders</h1>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Bastion"/>
							<img src="images/bastion.png" title="Bastion">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Hanzo"/>
							<img src="images/hanzo.png" title="Hanzo">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Junkrat"/>
							<img src="images/junkrat.png" title="Junkrat">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Mei"/>
							<img src="images/mei.png" title="Mei">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Torb"/>
							<img src="images/torb.png" title="Torb">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Widowmaker"/>
							<img src="images/widowmaker.png" title="Widowmaker">
						</label><br>
						<h1>Tanks</h1>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Dva"/>
							<img src="images/dva.png" title="Dva">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Orisa"/>
							<img src="images/orisa.png" title="Orisa">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Reinhardt"/>
							<img src="images/reinhardt.png" title="Reinhardt">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Roadhog"/>
							<img src="images/roadhog.png" title="Roadhog">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Winston"/>
							<img src="images/winston.png" title="Winston">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Zarya"/>
							<img src="images/zarya.png" title="Zarya">
						</label><br>
						<h1>Supports</h1>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Ana"/>
							<img src="images/ana.png" title="Ana">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Lucio"/>
							<img src="images/lucio.png" title="Lucio">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Mercy"/>
							<img src="images/mercy.png" title="Mercy">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Moira"/>
							<img src="images/moira.png" title="Moira">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Symmetra"/>
							<img src="images/symmetra.png" title="Symmetra">
						</label>
						<label class="radio-hero">
							<input type="radio" name="hero" value="Zenyatta"/>
							<img src="images/zenyatta.png" title="Zenyatta">
						</label>

					<br><br>
					<label for="sr">Current Sr</label><br>
					<input type="int" id="sr" name="sr">
					
						<br><br>
					<button name="submit" type="submit">Submit</button>		<br>			
				<?php
				if(isset($_POST['submit'])){
					if(mysqli_num_rows($checkusername2) === 0 )
					{
						$registerquery2= mysqli_query($con, "INSERT INTO queue (Username, Hero, Sr, Platform) VALUES('".$username."', '".$hero."', '".$sr."', '".$platform."')");
						if($registerquery2)
						{ 
							echo "Success"; 
						}
					}
					else
						echo "Failure";
				}
				?>
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