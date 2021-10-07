<?php
     require('config.php');
	 session_start();
    
     try{
        $conn = new PDO('mysql:host=localhost;dbname=workshop;charset=utf8', 'bitnami', 'mdpdebian');
    }catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
    }
    // Connexion à la base de données MySQL 
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    $stmt = $conn->query('select distinct ville from formations');

    if(isset($_POST["ville"]) || isset($_POST["cout_min"]) ||isset($_POST["cout_max"]) || isset($_POST["niveau"]) ||
        isset($_POST["discipline"])) { 
        try {
			// begin transaction
			$conn->beginTransaction();

            $ville = isset($_POST["ville"]) ? 'and ville = "'.$_POST["ville"].'" ' : "";
            $cout_min = (isset($_POST["cout_min"]) && $_POST["cout_min"] !== "") ? 'and cout >  "'.$_POST["cout_min"].'" ' : "";
            $cout_max = (isset($_POST["cout_max"]) && $_POST["cout_max"] !== "") ? 'and cout <  "'.$_POST["cout_max"].'" ' : "";
            $discipline = (isset($_POST["discipline"]) && $_POST["discipline"] !== null) ? 'and discipline LIKE "'.$_POST["discipline"].'%" ' : "";
            $niveau = isset($_POST["niveau"]) ? 'and niveau = "'.$_POST["niveau"].'" ' : "";

            $sql2 = 'select * from formations where id is not null '.$ville.$cout_min.$cout_max.$discipline.$niveau;
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([]);

            

            if($stmt2->fetch()){
				header('Location: formations.php?resultats=null');	
			} else {
                $rows = [];
                foreach ($exec_nom as $row) {
                    $rows[] = $row;
                }

				header('Location: formations.php?resultats='.$rows.' ');
			}  

        } catch (PDOException $e) {
			$conn->rollBack();
			echo $e->getMessage();

		}

    }
?>