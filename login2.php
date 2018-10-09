<?php include "base.php"; ?>
<?php 
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
?>
	<meta http-equiv="refresh" content="0; url=index.php" />
<?php
}
?>
<?php
$errorMsg = "";

if((isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn']==true) && !empty($_SESSION['username']))
{
     ?>
 
     <h1>Member Area</h1>
     <pThanks for logging in! You are <code><?=$_SESSION['username']?></code> and your email address is <code><?=$_SESSION["email"]?></code>.</p>
      
     <?php
}
elseif(isset($_POST['username']) && isset($_POST['password']))
{
	$errorMsg = "";
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = md5(mysqli_real_escape_string($con, $_POST['password']));
     
    $checklogin = mysqli_query($con, "SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
     
    if(mysqli_num_rows($checklogin) == 1)
    {
        $row = mysqli_fetch_array($checklogin);
        $email = $row["EmailAddress"];
         
        $_SESSION['username'] = $username;
        $_SESSION["email"] = $email;
        $_SESSION['loggedIn'] = 1;
         
		 if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
	
        header("Location: index.php"); die();
    }
    else
    {
        $errorMsg = "Invalid username or password.";
		$_POST = array();
    }
}
else
{

}
?>
			<!DOCTYPE html>
<html lang = "en">
   
   <head>
		<link rel="icon" href="images/favicon.ico" type="image/ico">
		<title>Overwatch Team Finder</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	
	<body>    
      <div id="main">
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
			<!--<div class="sidebar">
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
			</div>-->
			<div class="loginform">
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
					<label for="username">Username</label><br>
					<input type="text" value="<?= isset($_POST["username"]) ?>" id="username" name="username" /><br>
					<label for="password">Password</label><br>
					<input type="password" value="" id="password" name="password" /><br>
					<input type="submit" name="sub" value="Sign In"><br>
					<div class="agree">
						<p><?php echo $errorMsg; ?></p>
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
		<!--<div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username = tutorialspoint" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password = 1234" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         Click here to clean <a href = "logout.php" tite = "Logout">Session.
         
      </div> 
      
   </body>
</html>