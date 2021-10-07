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
</head>
<body>
	<section id="banner">
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
							  <li><a href="Formation.html">Formation</a></li>
							  <li><a href="#">Logement</a></li>
							  <li><a href="#">Aide Financières</a></li>
							</ul>
						  </li> 
						<!--<li><a href="#">Contacts</a></li>-->
						<li><a href="#ancre-contact">Nous Contactez</a></li>
						<li><a href="#">Sign In</a></li>
					</ul>
				</nav>
			</div>
		</header>

       

	   <?php
        if [$_session == null] {
        
			?>
		 	<section id="Formationliste">
		<div class="shape">
			<article id="Thrends">
				<h1 ><u>Liste des formations :</u></h1>
				<!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa<br>semper aliquam quis mattis quam.</p>-->
				
				<div class="box">
					<img class="middle" src="blog/article 2/TroublesDeDys.jpg">
					<div class="titles">
						<h3>Quels sont les différents troubles de dys ?</h3>
						<p>On regroupe sous “troubles Dys” les troubles cognitifs spécifiques et les troubles des apprentissages qu’ils induisent. Retrouvez toutes les informations utiles ici !</p>
						<a href="https://www.ffdys.com/troubles-dys">More</a>
					</div>
				</div>
				<div class="box">
					<img class="middle" src="blog/article 1/illu.png">
					<div class="titles">
						<h3>Qu'est-ce que la dyslexie ?</h3>
						<p>La dislexie touche 5 à 10% de la population mondiale, mais comment se manfiste-elle ?</p>
						<a href="https://dysmoi.fr/la-dyslexie-qu-est-ce-que-c-est/">More</a>
					</div>
				</div>
				<div class="box">
					<img class="middle" src="blog/article 3/aide_emploi.jpg">
					<div class="titles">
						<h3>Comment aider un employé dyslexique ?</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
						<a href="https://www.kellyservices.ca/ca/services-aux-entreprises/centre-de-ressources-pour-les-entreprises/gestion-des-employes/comment-aider-un-employe-dyslexique/">More</a>
					</div>
				</div>
			</article>
		</div>
	</section>

		<?php
		
	    }
		
        else {
		require('../config.php');
		session_start();
		
		
		$form = $bdd->query('SELECT * FROM formation');
		
		
		while($formDonnees = $form->fetch()){
			?>
			<p>
			Nom formation : <?php echo $formDonnees['nom']; ?> <br>
			Nom établissement : <?php echo $formDonnees['nomEtablissement']; ?><br>
			Cout de la formation : <?php echo $formDonnees['adresse']; ?><br>
			Discipline : <?php echo $formDonnees['discipline']; ?><br>
			Niveau de la formation : <?php echo $formDonnees['niveau']; ?><br>
			Capacit&eacute d'accueil : <?php echo $formDonnees['cout']; ?><br>
			Cout du loyer : <?php echo $formDonnees['loyer']; ?><br>
			</p>
		<?php
		}
		$form->closeCursor();
	  }
		?> 
	


	<section id="Contact">
		<div id="ancre-contact" class="shape">
			<div class="contact-header">
				<h1 >Nous Contacter</h1>
				<p>Tu as des questions pour nous ? N'hésite pas à nous envoyer un message, et on te répondra rapidement.</p>
			</div>
			<div class="Form">
				<form>
					<div class="inp">
						<input type="text" spellcheck="true" placeholder="Votre Nom" required="">
					</div>
					<div class="inp">
						<input type="text" spellcheck="true" placeholder="Votre Prénom" required="">
					</div>
					<div class="inp">
						<input type="email" spellcheck="true" placeholder="Votre Email" required="">
					</div>
					<div class="inp">
						<textarea type="text" spellcheck="true" placeholder="Votre Message" required=""></textarea>
					</div>
				</br>
					<div class="">
						<input type="checkbox" id="Newsle" name="newsletter"
							   checked>
						<label for="Newsle">J'accepte de recevoir vos e-mails et confirme avoir pris connaissance de votre politique de confidentialité et mentions légales.
						</label>
					  </div>
					<div class="btn">
						<input type="submit" value="send">
					</div>
				</form>
			</div>
		</div>
	</section>

	<section id="upgrade">
		<div class="shape">
			<div class="upgrade-content">
				<h1>Upgrade your learning plan</h1>
				<p>TEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXTTTTTT</p>
				<a class="anchor" href="#">details</a>

				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>

					<li><a href="#"><i class="fa fa-instagram"></i></a></li>

					<li><a href="#"><i class="fa fa-behance"></i></a></li>

					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>

					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</section>
	
	<footer>
		<div class="shape">
			<div class="flex">
				<div class="flexbox">
					<h3>Our Collections</h3>
					<ul>
						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Men's Fashion</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Women's Fashion</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Kid's Fashion</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Winter Collections</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Summer Collections</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Western Dresses</a></li>

						<li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i> Classical Dresses</a></li>
					</ul>
				</div>

				<div class="flexbox">
					<h3>Quick Links</h3>
					<ul>
						<li><a href="#"><i class="fa fa-chevron-right"></i> video gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> photo gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> clothes gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> men's wearing gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> women's wearing gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> kid's wearing gallery</a></li>

						<li><a href="#"><i class="fa fa-chevron-right"></i> shoes gallery</a></li>
					</ul>
				</div>
				
				<div class="vrt"></div>

				<div class="flexbox">
					<h4>sign up for our <span>newsletter<span></h4>
					<form>
						<input class="email" type="email" placeholder="email@exampl.com" required="">
						<input class="btn" type="submit" value="Submit">
					<form>
					<ul class="UL">
						<li class="LI"><a class="A" href="#"><i class="fa fa-facebook"></i></a></li>

						<li class="LI"><a class="A" href="#"><i class="fa fa-instagram"></i></a></li>

						<li class="LI"><a class="A" href="#"><i class="fa fa-behance"></i></a></li>

						<li class="LI"><a class="A" href="#"><i class="fa fa-pinterest"></i></a></li>

						<li class="LI"><a class="A" href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>

				<div class="vrt"></div>
				
				<div class="flexbox">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.8510030465463!2d91.89378981464543!3d24.9030634496826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054b0ba3bfc31%3A0x440e26129f288571!2sBaluchar%20Point!5e0!3m2!1sen!2sbd!4v1577212160587!5m2!1sen!2sbd" width="300" height="300" frameborder="0" style="border:0; opacity: 0.8;" allowfullscreen=""></iframe>
				</div>
			</div>
			<p>Copyright &copy; 2019 www.helpDysWorld.com all right reserved || Design By <span style="color: #e81f6b;">Qaddouri Yahya</span></p>
		</div>
	</footer>
</body>

</html>


<!--<article id="Features">
				<h1>Features</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa<br>semper aliquam quis mattis quam.</p>

				<div class="bx">
					<i class="fa fa-heart-o" aria-hidden="true"></i>
					<div class="innerbx">
						<h1>Money Back</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
					</div>
				</div>

				<div class="bx">
					<i class="fa fa-gift" aria-hidden="true"></i>
					<div class="innerbx">
						<h1>Gift Coupon</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
					</div>
				</div>

				<div class="bx">
					<i class="fa fa-mobile" aria-hidden="true"></i>
					<div class="innerbx">
						<h1>Free Shipping</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
					</div>
				</div>
			</article>-->