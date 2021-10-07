<?php
	include 'gestionBD.php';

    $host = get_host();
	$port = get_port();
	$db = get_db();
	$user = get_user();
	$pass = get_pass();
	$charset = get_charset();

	$dsn = get_dsn();
	$options = get_options();
			
	$pdo = get_PDO();
	
	//On récupère les infos du formulaire
	$Nom = 3;
    $Identifiant = $row["id_formation"];
    $Etablissement = $row["Etablissement"];
    $Adresse_Etab = $row["Adresse_Etab"];
    $Cours = $row["Cours"];
    $Top_Logement = $row["Top_Logement"];
    $Bonne_pratique = $row["Bonne_pratique"];
	
	
    if($idGestionnaire !== ""  && $idCopro != ""){ 
	
		try {
			
			// begin transaction
			$pdo->beginTransaction();
									
			$requete = "UPDATE utilisateurs SET idCopropriété = ?  WHERE idUtilisateur = ?";
			$exec_requete = $pdo->prepare($requete);
			$exec_requete->execute([$idCopro, $idGestionnaire]);
				
			// commit transaction
			$pdo->commit();
			if(!($exec_requete->fetch())){
					header('Location: ../listeGestionnaires.php?idCopro='.$idCopro.'&NomCopro='.$NomCopro.'');	
			} else {
					header('Location: ../ajoutGestionnaire.php?idCopro='.$idCopro.'&NomCopro='.$NomCopro.' ');
			} 

		} catch (PDOException $e) {
				$pdo->rollBack();
				echo $e->getMessage();
		}
		
	} else { //certains champs sont vides
       header('Location: ../ajoutGestionnaire.php?idCopro='.$idCopro.'&NomCopro='.$NomCopro.'&erreur=1 '); 
    }
	

// fermer la connexion
$requete = null;
$pdo = null; 

?>