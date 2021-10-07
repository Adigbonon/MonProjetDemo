<?php
     // Initialiser la session
     session_start();
	
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
	     
    </head>
  
    <body>
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

        $conn = get_PDO();
        
        $sql = "select * from formations";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $i = 1;
        while ($row = $stmt->fetch()) {
            $Nom = $row['Nom'];
            $Identifiant = $row["id_formation"];
            $Etablissement = $row["Etablissement"];
            $Adresse_Etab = $row["Adresse_Etab"];
            $Cours = $row["Cours"];
            $Top_Logement = $row["Top_Logement"];
            $Bonne_pratique = $row["Bonne_pratique"];
    ?>
	   
	     <div class="container">
            <h3>Id: <?php echo $Identifiant ?></h3>
            <h2>Nom: <?php echo $Nom ?></h2>
            <h3>Etablissement: <?php echo $Etablissement ?></h2>
            <h3>Adresse: <?php echo $Adresse_Etab ?></h2>
            <h3>Cours: <?php echo $Cours ?></h2>
            <h3>Top Logement: <?php echo $Top_Logement ?></h2></br>
         </div>	 
    <?php $i .= 1;} ?>
  </body>
  
</html>
			 

