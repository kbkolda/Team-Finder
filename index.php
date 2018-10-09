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
					<?php 
						if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true):
					?>
							<li><a href="profile.php"><font style="font-family: Overwatch;"> Profile </font></a></li>
							<li><a href="queue.php"><font style="font-family: Overwatch;"> Queue </font></a></li>
							<li><a href="logout.php"><font style="font-family: Overwatch;"> Logout </font></a></li>
					<?php else: ?>
							<li><a href="login2.php"><font style="font-family: Overwatch;"> Sign In </font></a></li>
							<li><a href="signup.php"><font style="font-family: Overwatch;"color="#218ffe"> Sign Up </font></a></li>
					<?php endif;?>
				</ul>
			</nav>
			<?php 
			if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
			?>
			<div class="list">
				<list>
					<h3><font style="font-family: Overwatch;"> Overwatch Team Finder </font></h3>
					<ul>
						<li>Find a team based on your needs!</li>
						<li>Always play your main!</li>
						<li>No more sombra one tricks!</li>
					</ul>
				</list>
				<div class="button">
					<input type="submit" value="Sign Up" onclick="window.location='signup.php';"><br>
				</div>
			</div>
			<?php 
			} 
			?>

			
			<div class="player-table">
				<?php
				if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
				?>
				<div class="person">
				<table class="queue-table">
					<tr>
						<td>Username</td>
						<td>Hero</td>
						<td>Sr</td>
						<td>Battletag</td>
						<td>Overbuff stats</td>
					</tr>
					<?php
					$arr = mysqli_query($con, "SELECT * FROM queue");
					$row=mysqli_fetch_array($arr);
					while($row = mysqli_fetch_array($arr)){
					$arr2 = mysqli_query($con, "SELECT * FROM users WHERE Username = '".$row["Username"]."'");
					$row2=mysqli_fetch_array($arr2);

					if($row['Username'] == $_SESSION['username'])
					{}
					else{
					?>
					<tr>
						<td><code><?=$row['Username']?></code></td>
						<td><code><?=$row['Hero']?></code></td>
						<td><code><?=$row['Sr']?></code></td>
						<td><code><?=$row2['Battletag']?></code></td>
						<td><code><?php
									$btag = $row2['Battletag'];
									$btag = str_replace("#","-",$btag);
									$profile_link = "http://www.overbuff.com/players/pc/" . $btag;
									echo "<a href='" . $profile_link . "'target=\"_blank\" ><img src=\"images/arrow.png\" /></a>";
								?></code></td>
	
					</tr>
				<?php
					}
					}
				}
				?>
				</table>
				</div>
			</div>
			
		</div>
			<?php 
			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
				$arr = mysqli_query($con, "SELECT * FROM queue WHERE Username = '".$_SESSION['username']."'");
				$row=mysqli_fetch_array($arr);
				$arr2 = mysqli_query($con, "SELECT * FROM users WHERE Username = '".$_SESSION['username']."'");
				$row2=mysqli_fetch_array($arr2);
			?>
			<div class="profile-sidebar">
				<h1>Welcome, <?=$row['Username']?></h1>
				<h1><?=$row2['Battletag']?></h1>
				<div class="character-icon">
				<?php
					$heroImg =$row['Hero'];
					switch($heroImg){
					case "Doomfist":
						echo '<img src="images/doomfist.png"  alt="character-icon">';
						break;
					case "Genji":
						echo '<img src="images/genji.png"  alt="character-icon">';
						break;
					case "McCree":
						echo '<img src="images/mccree.png"  alt="character-icon">';
						break;
					case "Pharah":
						echo '<img src="images/pharah.png"  alt="character-icon">';
						break;
					case "Reaper":
						echo '<img src="images/reaper.png"  alt="character-icon">';
						break;
					case "Soldier":
						echo '<img src="images/soldier.png"  alt="character-icon">';
						break;
					case "Mercy":
						echo '<img src="images/mercy.png"  alt="character-icon">';
						break;
					}
				?>
					
				</div>
				<h2><?=$row['Sr']?></h2>
				<div class="rank-icon">
					<img src="images/rank-icons/platinum.png" height=20 width=20  alt="rank-icon">
				</div>
			</div>
			<?php 
			} 
			?>
		<div class="sidebar">
		<?php
			$count = mysqli_query($con, "SELECT COUNT(*) FROM queue");
			$rows = mysqli_fetch_array($count);
			$total = $rows[0];
		?>
			<h2><font style="font-family: Overwatch;"><code><?=$total - 1?></code></font></h2>
			<h3>Users searching for a team</h3>
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
		<footer>
			<ul>
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
		</footer>
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