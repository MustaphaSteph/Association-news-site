<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" />

</script>
<title>Gestion des articles</title>
</head>

<body>
<div id="dr"> Gestion des articles</div>

<?php
include("config.php");
mysql_query("SET NAMES 'utf8';");


if(isset($_POST["add"]))
	{
		
   	if($_POST["add"])
{
	if($_POST["pass"]==$_POST["pass2"])
	{
	
	
	$pass_n=$_POST["pass"];
	

	   $updat=mysql_query("UPDATE admin SET pass='$pass_n'");

	if($updat)
	{   
	
	    
		echo "<script language='JavaScript'>alert(' Le mot de passe a été modifier ')</script>";
				echo'<meta http-equiv="refresh" content="1;setting.php"/>';
				exit;

	}
	else 
	{
        echo "javascript:alert('Erreur :( '".mysql_error().")"; 
		exit;
    }
  
	}
	else
	{
	echo "<script language='JavaScript'>alert(' Les deux mot de passe ne condordent pas ')</script>";

	}
	
}
}
?>

<form name="form" action="Cp.php"  method="POST" enctype="multipart/form-data" class="elegant-aero">
    <h1>Changez le mot de passe
    	<span>S il vous plais remplir tous les champs</span>
    </h1>
    <label>
        <input id='pass' type="password" name="pass" placeholder="Nouveau mot de passe"   required/>
    </label>
    
    <label>
        <input  id='pass' type="password" name="pass2" placeholder="Confirmer le mot de passe" required/>
    </label>
    
     <label>
    	<span>&nbsp;</span> 
        <input type="submit" name="add" class="button" value="changer" /> 
    </label>
</form>



</body>
</html>