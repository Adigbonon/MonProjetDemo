<?php
     // Initialiser la session
     require('config.php');
     session_start();
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
            <!-- Bootstrap -->
		    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">

        </head>
        <body>
                <header>
                    <div class="shape">
                        <div class="logo">
                            <a href="Dyscovery.html"><img src="Images/logo.png"></a>
                        </div>
                        <nav>
                            <ul>
                                <li><a href="#ancre-quisommesnous">Qui sommes Nous?</a></li>
                                <li><a href="#">Nos Services</a>
                                    <ul class="nav-has-dropdown">
                                    <li><a href="formations.php">Formation</a></li>
                                    <li><a href="#">Logement</a></li>
                                    <li><a href="#">Aide</a></li>
                                    </ul>
                                </li> 
                                <li><a href="#ancre-contact">Nous Contacter</a></li>
                                <li><a href="#">Sign In</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
         
                <form action="monProfil.php" method="post" name="mesInfos" enctype="multipart/form-data" class="formA">
                    
                    <?php
                        include 'gestionBD.php';
                        
                        // Informations d'identification
                        define('DB_SERVER', 'localhost');
                        define('DB_USERNAME', 'bitnani');
                        define('DB_PASSWORD', 'mdpdebian');
                        define('DB_NAME', 'workshop');
                        
                        // Connexion à la base de données MySQL 
                        $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                        
                        // Vérifier la connexion
                        if($conn === false){
                            die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
                        }
                        
                        $stmt = $conn->query('select * from users where  adresseMail ='.$_SESSION['adresseMail'].'');
                    
                        foreach ($stmt as $row) {
                            $monNom =  $row['Nom'];
                            $monPrenom =  $row['Prenom'];
                            $monAdresse =  $row['adresseMail'];

                        }
                    ?>
                    
                    Mon nom:
                    <input type="text" name="Nom" value="<?php echo $monNom ?>" title="(50 caractères maximum)" maxlength="50" required />

                    Mon/mes prénom(s)
                    <input type="text" name="Prenom" value="<?php echo $monPrenom ?>" title="(50 caractères maximum)" maxlength="50" required />

                    Mon adresse mail:
                    <input type="email" name="adresseMail" value="<?php echo $monAdresse ?>" 
                    style="width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;" maxlength="50" required />

                    <input type="submit"  value="Modifier" name="submit"/>
                
                </form>
                
        </body>
    </html>