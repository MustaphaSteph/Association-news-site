<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" />

<title>connexion</title>
</head>

<body>

<?php
$hostname_dbprotect = "localhost";
$username_dbprotect = "root";      
$password_dbprotect = "";        
$database_dbprotect = "BANI";     
$tablename_dbprotect= "admin";    
$dbprotect = mysql_connect($hostname_dbprotect, $username_dbprotect, $password_dbprotect) or trigger_error(mysql_err(),E_USER_ERROR); 

session_start(); 

if (isset($_POST['login'])){ // execution apres envoi du formulaire
	$login = $_POST['login']; // mise en variable du nom d'utilisateur
	$pass = $_POST['pass']; 
	
    // requete sur la table administrateurs (on récupère les infos de la personne)
    mysql_select_db($database_dbprotect, $dbprotect);
    $verif_query = sprintf("SELECT * FROM $tablename_dbprotect WHERE login='$login' AND pass='$pass'"); // requête sur la base administrateurs
    $verif = mysql_query($verif_query, $dbprotect) or die(mysql_error());
    $row_verif = mysql_fetch_assoc($verif);
    $utilisateur = mysql_num_rows($verif);

	
	if ($utilisateur) {	// On test s'il y a un utilisateur correspondant
	    $_SESSION['authentification'] = 1; // enregistrement de la session
		
		// déclaration des variables de session
		
		$_SESSION['login'] = $row_verif['login']; // Son Login
		$_SESSION['pass'] = $row_verif['pass']; // Son mot de passe (à éviter)
		
		header("Location: /BANI/cpanel/index.php"); // redirection si OK
		exit;
}
	else {
	  
	  echo '<span color="red" >Echec d\'authentification !!! &gt; login ou mot de passe incorrect</span>';
	  		echo'<meta http-equiv="refresh" content="2;login.php"/>';
 
	  exit;
	}
}


// GESTION DE LA Déconnexion
//session_unset();


?>



</body>
</html>