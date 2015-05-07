<?php 
require_once('login.php');
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pokemondeals | Welcome</title>
	<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
	<link type="text/css" rel="stylesheet" href="css/loginbox.css" />
	<script type="text/javascript" id="snipcart" src="https://app.snipcart.com/scripts/snipcart.js"
    data-api-key="ZTIyNzAwMTYtOThjZC00NDcxLThlYjYtOGVmNmYzYjIwMTk5"></script>
	<link id="snipcart-theme" type="text/css" href="https://app.snipcart.com/themes/base/snipcart.css" rel="stylesheet">
	<script type="text/javascript" id="facebooklogin" src="js/facebooklogin.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </head>
  
  <body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php">Pokemondeals</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li><a href="products.php">Products</a></li>
		  </ul>
		  <form class="navbar-form navbar-left" role="search" action="Elukat/Hakutulos.php">
			<div class="form-group">
			  <input type="text" class="form-control" size="100" name="searchText" placeholder="Search by name or type">
			</div>
			<button type="submit" name="submit" class="btn btn-default">Submit</button>
		  </form>
		  <ul class="nav navbar-nav navbar-right">
			<?php if ($_SESSION['kirjautunut'] == 'juujuu'): ?>
				  <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=logout" data-auto-logout-link="true">Logout</a></li>
				  <?php else: ?>
				  <li><a id="modal_trigger" href="#modal" action="loginpopup.php">Log In</a></li>
				  <?php endif;?>
				  <li><a href="#" class="snipcart-checkout">Checkout</a></li>
				  <li><span class="snipcart-summary">
				  <p>Number of items: <span class="snipcart-total-items"></span><br />
				  Total price: <span class="snipcart-total-price"></span></p>
				  </span></li>	  
		  </ul>
		  
			<div id="modal" class="popupContainer" style="display:none;">
				<header class="popupHeader">
					<span class="header_title">Login</span>
					<span class="modal_close"><i class="fa fa-times"></i></span>
				</header>	
				<section class="popupBody">
				<!-- Social Login -->
					<div class="social_login">
						<div class="centeredText">
							<div class="fb-login-button" data-size="xlarge" data-show-faces="false" data-auto-logout-link="true"></div>
						</div>

						<div class="centeredText">
							<span>Or use your Email address</span>
						</div>

						<div class="action_btns">
							<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
							<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
						</div>
					</div>

				<!-- Username & Password Login form -->
					<div class="user_login">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<label>Email</label>
							<input type="text" name="email" /><br />
							<label>Password</label>
							<input type="password" name="pwd" /><br />
							<div class="checkbox">
								<input id="remember" type="checkbox" />
								<label for="remember">Remember me on this computer</label>
							</div>
							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><input type="submit" name="login" value="Login" class="btn btn_red" /></div>		
							</div>
						</form>

						<a href="#" class="forgot_password">Forgot password?</a>
					</div>

				<!-- Register Form -->
					<div class="user_register">
						<form method="POST" action="save.php">
							<label>Full Name</label>
							<input type="text" name="fullName" /><br />
							<label>Email Address</label>
							<input type="email" name="newEmail"/><br />
							<label>Password</label>
							<input type="password" name="newPwd"/><br />
							<div class="checkbox">
								<input id="send_updates" type="checkbox" />
								<label for="send_updates">Send me occasional email updates</label>
							</div>
							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><input type="submit" class="btn btn_red" value="Register"></div>
							</div>
						</form>
					</div>
				</section>
			</div>	
			<script type="text/javascript" src="js/login.js"></script>	  
		</div>
	  </div>
	</nav>
	
	<?php 
  
$sql = "SELECT 
Pokemon.Nimi,
Pokemon.SivuUrl,
Kuva.URL 
FROM 
	Pokemon, 
    Kuva, 
    PokemonKuva
 WHERE 
	Kuva.ID = PokemonKuva.KuvaID   AND
	(Pokemon.Nimi = \"Bulbasaur\" OR 
    Pokemon.Nimi = \"Squirtle\" OR
    Pokemon.Nimi = \"Charmander\") AND
	PokemonKuva.PokemonID = Pokemon.ID;";
		
	$STH = @$DBH->query($sql);
	$STH->setFetchMode(PDO::FETCH_ASSOC);
	$row = $STH->fetch();
	

	?>
	
		<div  id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->

		  
		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" role="listbox">
		  
		  <?php 
				$STH = @$DBH->query($sql);
				
				while ($row = $STH->fetch(PDO::FETCH_ASSOC)): ?>
				
				<div class="item active">
					<center><img height="100" width="100" src="<?php echo $row['URL']; ?>" alt="kuva"></img></a></center>
				</div>
								
				
				<?php endwhile; ?>
				<div class="item">
					<center><a  href="<?php echo $row['SivuUrl'];?>"><img height="500" width="100" src="<?php echo $row['Charmander.URL']; ?>" alt="<?php echo $row['Nimi']; ?>"></img></a></center>
				</div>
				<div class="item">
				  <center><a  href="<?php echo $row['SivuUrl'];?>"><img height="100" width="100" src="<?php echo $row['Bulbasaur.URL']; ?>" alt="<?php echo $row['Bulbasaur.Nimi']; ?>"></img></a></center>
				</div>
				<div class="item">
				  <center><a  href="<?php echo $row['SivuUrl'];?>"><img height="100" width="100" src="<?php echo $row['Squirtle.URL']; ?>" alt="<?php echo $row['Squirle.Nimi']; ?>"></img></a></center>
				</div>			

		  </div>
		   <!-- Left and right controls -->
		  	<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		 </div> 
		 
		  

		
		
			<div id="modal" class="popupContainer" style="display:none;">
				<header class="popupHeader">
					<span class="header_title">Login</span>
					<span class="modal_close"><i class="fa fa-times"></i></span>
				</header>	
				<section class="popupBody">
				<!-- Social Login -->
					<div class="social_login">
						<div class="centeredText">
							<div class="fb-login-button" data-size="xlarge" data-show-faces="false" data-auto-logout-link="true"></div>
						</div>

						<div class="centeredText">
							<span>Or use your Email address</span>
						</div>

						<div class="action_btns">
							<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
							<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
						</div>
					</div>

				<!-- Username & Password Login form -->
					<div class="user_login">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
							<label>Email</label>
							<input type="text" name="email" /><br />
							<label>Password</label>
							<input type="password" name="pwd" /><br />
							<div class="checkbox">
								<input id="remember" type="checkbox" />
								<label for="remember">Remember me on this computer</label>
							</div>
							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><input type="submit" name="login" value="Login" class="btn btn_red" /></div>		
							</div>
						</form>

						<a href="#" class="forgot_password">Forgot password?</a>
					</div>

				<!-- Register Form -->
					<div class="user_register">
						<form method="POST" action="save.php">
							<label>Full Name</label>
							<input type="text" name="fullName" /><br />
							<label>Email Address</label>
							<input type="email" name="newEmail"/><br />
							<label>Password</label>
							<input type="password" name="newPwd"/><br />
							<div class="checkbox">
								<input id="send_updates" type="checkbox" />
								<label for="send_updates">Send me occasional email updates</label>
							</div>
							<div class="action_btns">
								<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
								<div class="one_half last"><input type="submit" class="btn btn_red" value="Register"></div>
							</div>
						</form>
					</div>
				</section>
			</div>	
			<script type="text/javascript" src="js/login.js"></script>	  
		</div>
	  </div>
	</nav>

    <div class="neighborhood-guides">
        <div class="container">
            <h2>Typetypetype</h2>
            <p>THE most popular pokemons that you will want to buy</p>
            <div class="row">
                <div class = "col-md-4">
                    <div>
                        <img id='frontPagepic' src="https://lh6.googleusercontent.com/-F3XMnJb0YsU/USlbnOls2YI/AAAAAAAADFY/1OVC0IOnvR4/w800-h800/sticker,375x360.png">
                    </div>
                      <div>
                        <img id='frontPagepic' src="http://wordofgame.com/wp-content/uploads/2014/07/pokemon-water-type-symbol-mjz5sgae.png">
                    </div>
                </div>
                <div class = "col-md-4">
                    <div>
                        <img id='frontPagepic' src="http://firetypepokemon.weebly.com/uploads/3/2/0/5/32050987/160983187.png">
                    </div>
                      <div>
                        <img id='frontPagepic' src="http://cdn.playbuzz.com/cdn/4868eddb-fff5-41ba-8482-8436cdccf810/20f6c5af-1281-4327-988d-9b19999100a3.png">
                    </div>
                </div>
                <div class = "col-md-4">
                    <div>
                        <img src="http://i.imgur.com/Ls6gd.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<?php if ($_SESSION['kirjautunut'] == 'juujuu'): ?>
		<div class="container">
			<div class="row">
				<div class='col-md-4'>
					<h1>Admin</h1>
					<p>You don't have any rights</p>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="learn-more">
		  <div class="container">
			<div class="row">
			  <div class="col-md-4">
				<h3>About Us</h3>
				<address>
				  <strong>Pokedealers</strong><br>
				  123 Poke Ave, Suite 666<br>
				  Pokeville, CA 12345<br>
				  <abbr title="Phone">P:</abbr> (123) 456-7890
				</address>		
				<p><a href="#">Contact Us</a></p>
			  </div>
			  <div class="col-md-4">
				<h3>Terms & Conditions</h3>
				<p>You don't have any</p>
				<p><a href="#">Don't read these</a></p>
			  </div>
			  <div class="col-md-4">
				<h3>Trust and Safety</h3>
				<p>We will steal all your money</p>
				<p><a href="#">Why are you still here?</a></p>
			  </div>
			</div>
		  </div>
		</div>
	<?php endif;?>
	


  </body>
</html>