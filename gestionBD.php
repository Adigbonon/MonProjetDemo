<?php

	 $host = 'localhost';
	 $port = '3306';
	 $db = 'workshop';
	 $user = 'root';
	 $pass = '';
	 $charset = 'utf8mb4';

	 $dsn = "mysql:host=$host;port=$port;dbname=$db";
	 $options = [
		 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		 PDO::ATTR_EMULATE_PREPARES => false,
	 ];


	 /* renvoie le host de la base de données*/ 
	 function get_host(){
	 	return $GLOBALS["host"];
	 }

	 /* renvoie le port de la base de données*/ 
	 function get_port(){
	 	return  $GLOBALS["port"];
	 }

	 /* renvoie la db de la base de données*/ 
	 function get_db(){
	 	return  $GLOBALS["db"];
	 }

	  /* renvoie le nom d'un utilisateur de la base de données*/ 
	 function get_user(){
	 	return  $GLOBALS["user"];
	 }

	 /* renvoie le mots de passe de l'utilisateur*/ 
	 function get_pass(){
	 	return  $GLOBALS["pass"];
	 }

	 /* renvoie le charset de la base de données*/ 
	 function get_charset(){
	 	return  $GLOBALS["charset"];
	 }

	 /* renvoie le dsn de la base de données*/ 
	 function get_dsn(){
	 	return   $GLOBALS["dsn"];
	 }

	  /* renvoie les options de la base de données*/ 
	 function get_options(){
	 	return   $GLOBALS["options"];
	 }

	  /* renvoie les options de la base de données*/ 
	 function get_PDO(){

	 	try {
			$pdo = new PDO($GLOBALS["dsn"], $GLOBALS["user"], $GLOBALS["pass"], $GLOBALS["options"]);
		} catch (PDOException $e) {
			echo $e->getMessage() ;
			throw new PDOException($e->getMessage());
		}

	 	return   $pdo;
	 }


	/*
	 * Renvoie un ID utilisateur valide c'est a dire qui n'existe pas 
 	 */
	  function get_ID_Utilisateur(){

		$pdo = get_PDO();
	 	
		$resultat = $pdo->query('select MAX(idUtilisateur)
								from utilisateurs');

		return $resultat + 1;

	 }

	
?>
