<?php
     // Initialiser la session
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
         
                <form action="formations.php" method="post" name="rechercheFormation" enctype="multipart/form-data" class="formA">
                    <b>Ville:</b>	
                    <select name="ville">
                        <option value="" selected disabled hidden>Choisissez une ville</option>
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

                            $stmt = $pdo->query('select distinct Ville from formations');
                        
                            foreach ($stmt as $row) {
                                $Ville = $row['Ville'];
                                echo "<option value=".$Ville.">".$Ville."<option/>";	
                            }
                        ?>

                    <select/><br/><br/>		
            
                    <b>Cout min:</b>
                    <input type="text" name="cout_min" placeholder="Coût minimal de la formation" title="(50 caractères maximum)" maxlength="50"
                    />
                    <b> Cout max:</b>
                    <input type="text" name="cout_max" placeholder="Coût maximal de la formation" title="(50 caractères maximum)" maxlength="50"
                    /><br/><br/>

                    <b>Niveau après formation:</b>
                    <select name="Niveau">
                        <option value="" selected disabled hidden>Choisissez le niveau à avoir après la formation</option>
                        <?php
                            $stmt2 = $pdo->query('select distinct Niveau from formations');
                        
                            foreach ($stmt2 as $row) {
                                $Niveau = $row['Niveau'];
                                echo "<option value=".$Niveau.">".$Niveau."<option/>";	
                            }
                        ?>

                    <select/><br/><br/>		

                    <b>Discipline enseignée:</b>
                    <select name="Discipline">
                        <option value="" selected disabled hidden>Choisissez une discipline</option>
                        <?php
                            $stmt3 = $pdo->query('select distinct Discipline from formations');
                        
                            foreach ($stmt3 as $row) {
                                $Discipline = $row['Discipline'];
                                echo "<option value=".$Discipline.">".$Discipline."<option/>";	
                            }
                        ?>

                    <select/><br/><br/>

                    <b><input type="submit" name="submit" value="Rechercher"/></b>
                    <b><input type="submit" name="delete" value="Delete"/></b>

                </form>

                <?php
       
                    if(isset($_POST["ville"]) || isset($_POST["cout_min"]) ||isset($_POST["cout_max"]) || isset($_POST["Niveau"]) ||
                        isset($_POST["Discipline"])) { 
                        $ville = isset($_POST["ville"]) ? 'and Ville = "'.$_POST["ville"].'" ' : "";
                        $cout_min = (isset($_POST["cout_min"]) && $_POST["cout_min"] !== "") ? 'and Cout >  "'.$_POST["cout_min"].'" ' : "";
                        $cout_max = (isset($_POST["cout_max"]) && $_POST["cout_max"] !== "") ? 'and Cout <  "'.$_POST["cout_max"].'" ' : "";
                        $Discipline = (isset($_POST["Discipline"]) && $_POST["Discipline"] !== null) ? 'and Discipline LIKE "'.$_POST["Discipline"].'%" ' : "";
                        $Niveau = isset($_POST["Niveau"]) ? 'and Niveau = "'.$_POST["Niveau"].'" ' : "";

                        $sql2 = 'select * from formations where id_formation is not null '.$ville.$cout_min.$cout_max.$Discipline.$Niveau ;
                        $stmt2 = $pdo->prepare($sql2);
                        $stmt2->execute([]);
                        echo $sql2;
                        
                        while ($row = $stmt2->fetch()) {
                            $Nom = $row['Nom'];
                            $Ville = $row['Ville'];
                            $Etablissement = $row['Etablissement'];
                            $Cout = $row['Cout'];
                            $Discipline = $row['Discipline'];
                            $Niveau = $row['Niveau'];
                ?> 

                            <button type="button" class="collapsible"><?php echo $Nom.' - '.$Ville; ?></button> 
                            <div class="content">
                                Ville: <?php echo $Ville; ?></br>
                                
                                Etablissement:  <?php echo $Etablissement; ?></br>

                                Discipline:  <?php echo $Discipline; ?></br>

                                Niveau visé par la formation:  <?php echo $Niveau; ?></br>

                                Coût:  <?php echo $Cout; ?> €</br>

                                                                                        
                            </div></br></br>
                        <?php }} ?>

                <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", 
                        
                        function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.display === "block") {
                                content.style.display = "none";
                            } else {
                                content.style.display = "block";
                            }
                        
                        });
                    }
                </script>  
            
        </body>
    </html>