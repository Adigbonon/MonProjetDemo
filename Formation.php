<?php
     // Initialiser la session
     //require('config.php');
     require('config.php');
	 session_start();

	//$_SESSION['adresseMail'] = 'rodica@gmail.com'
	//$_SESSION['adresseMail'] = ''
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="device=width-device">
	<meta name="description" content="Affordable Web Development, Professional Web Development">
	<meta name="keyword" content="Wev Development, Web Design">
	<meta name="author" content="Yahya Qaddouri, Programmer and Developer">
	<title>Dys-cover</title>
	<link rel="stylesheet" type="text/css" href="Dyscovery.css">
	<script type="text/javascript" src="index.js"></script>

	<style>
		#FormationListe{
			margin-top: px;
		}
	</style>
</head>
<body>
<section id="banner2">
		<header>
			<div class="shape">
				<div class="logo">
					<a href="Dyscovery.html">
					<img src="Images/logo.png"></a>
				</div>
				<nav>
					<ul>
						<li><a href="Dyscovery.html#ancre-quisommesnous">Qui sommes Nous?</a></li>
						<li><a href="#">Nos Services</a>
							<ul class="nav-has-dropdown">
							  <li><a href="Formation.php">Formation</a></li>
							  <li><a href="#">Logement</a></li>
							  <li><a href="#">Aide Financières</a></li>
							</ul>
						  </li> 
						<li><a href="#ancre-contact">Nous Contactez</a></li>
						<li><a href="#">Sign In</a></li>
					</ul>
				</nav>
			</div>
		</header>
		<div class="shape">
			<div class="content">
			
			</div>
		</div>
	</section>
       
	<section id="Formationliste">
		<div class="shape">
		<?php
			if($_SESSION ['adresseMail'] == null || $_SESSION ['adresseMail'] == ''){
		?>

				<article id="Thrends">
				<h1 ><u>Liste des formations :</u></h1>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa<br>semper aliquam quis mattis quam.</p>-->
				
				<div class="box">
					<img class="middle" src="BDD/school_commerce/forma1/kedge_logo.png">
					<div class="titles">
						<h3>Formation de Commercial</h3>
						<p>Kedge business school</p>
						<a href="connexion.php">More</a>
					</div>
				</div>
				<div class="box">
					<img class="middle" src="BDD/school_informatique/forma2/ynov_logo.jpg">
					<div class="titles">
						<h3>Informatique</h3>
						<p>YNOV BORDEAUX</p>
						<a href="connexion.php">More</a>
					</div>
				</div>
				<div class="box">
					<img class="middle" src="BDD/school_journalisme/forma3/ijba_logo.jpg">
					<div class="titles">
						<h3>Journalisme</h3>
						<p>IJBA Institut de Journalisme Bordeaux Aquitaine</p>
						<a href="connexion.php">More</a>
					</div>
				</div>

		<?php
			} else {
		?>
				<br/>
				<form action="traitementRechercheFormation.php" method="post" name="rechercheFormation" enctype="multipart/form-data" class="formA">
					<b>Ville:</b>	
					<select name="ville">
						<option value="" selected disabled hidden>Choisissez une ville</option>
						<?php
							// Informations d'identification
							/*
							try{
								$conn = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
							}catch (Exception $e){
									die('Erreur : ' . $e->getMessage());
							}
							// Connexion à la base de données MySQL 
							$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
							
							// Vérifier la connexion
							if($conn === false){
								die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
							}
							
							$stmt = $conn->query('select distinct ville from formations');
						
							foreach ($stmt as $row) {
								$ville = $row['ville'];
								echo "<option value=".$ville.">".$ville."<option/>";	
							}*/
						?>
					<select/><br/><br/>		
		
					<b>Coût min:</b>
					<input type="text" name="cout_min" placeholder="Coût minimal de la formation" title="(50 caractères maximum)" maxlength="50"
					/>
					<b>Coût max:</b>
					<input type="text" name="cout_max" placeholder="Coût maximal de la formation" title="(50 caractères maximum)" maxlength="50"
					/><br/><br/>

					<b>Niveau après formation:</b>
					<select name="Niveau">
						<option value="" selected disabled hidden>Choisissez le niveau à avoir après la formation</option>
						<?php
							/*$stmt2 = $conn->query('select distinct niveau from formations');
						
							foreach ($stmt2 as $row) {
								$niveau = $row['niveau'];
								echo "<option value=".$niveau.">".$niveau."<option/>";	
							}*/
						?>

					<select/><br/><br/>		

					<b>Discipline enseignée:</b>
					<select name="Discipline">
						<option value="" selected disabled hidden>Choisissez une discipline</option>
						<?php
							/*$stmt3 = $conn->query('select distinct discipline from formations');
						
							foreach ($stmt3 as $row) {
								$discipline = $row['discipline'];
								echo "<option value=".$discipline.">".$discipline."<option/>";	
							}*/
						?>

					<select/><br/><br/>

					<b><input type="submit" name="submit" value="Rechercher"/></b>
					<b><input type="submit" name="delete" value="Delete"/></b>

            </form>

			<?php
				if (isset($_GET['results'])) {
					$results = $_GET['results'];
					foreach ($results as $row) {
						$nom = $row['nom'];
						$ville = $row['ville'];
						$nomEtablissement = $row['nomEtablisment'];
						$adresse = $row['adresse'];
						$discipline = $row['discipline'];
						$niveau = $row['niveau'];
						$cout = $row['cout'];
            ?> 
						<div class="box">
							<div class="titles">
								<h3><?php echo $nom.' - '.$ville; ?></br></h3>
								<p>
									Etablissement de formation : <?php echo $nomEtablissement; ?></br>
									Adresse de l'Etablissement : <?php echo $adresse; ?></br>
									Discipline : <?php echo $discipline; ?><br>
    								Niveau de la formation : <?php echo $niveau; ?><br>
    								Coût de la formation : <?php echo $cout; ?><br>
								</p>
							</div>
						</div>

		<?php
					}
				}
			} 
		?>
	</section>
	

	
	<footer>
		<div class="shape">
			<div class="flex">
			</div>
			<p>Copyright &copy; 2019 www.Dys-covery.com all right reserved || Design By <span style="color: #e81f6b;">Qaddouri Yahya</span></p>
		</div>
	</footer>
</body>

</html>