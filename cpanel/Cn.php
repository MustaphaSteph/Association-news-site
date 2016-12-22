<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="nicEdit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({iconsPath : 'nicEdit/nicEditorIcons.gif'}).panelInstance('message');
});

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
	if($_POST["nom"]==$_POST["nom2"])
	{
	
	
	$nom_n=$_POST["nom"];
	

	   $updat=mysql_query("UPDATE admin SET login='$nom_n'");

	if($updat)
	{   
	
	    
		echo "<script language='JavaScript'>alert(' Le nom a été modifier ')</script>";
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
	echo "<script language='JavaScript'>alert(' Les deux nom ne condordent pas ')</script>";

	}
	
}
}
?>

<form name="form" action="Cn.php"  method="POST" enctype="multipart/form-data" class="elegant-aero">
    <h1>Changez le nom d'utilisateur
    	<span>S il vous plais remplir tous les champs</span>
    </h1>
    <label>
        <input id='pass' type="text" name="nom" placeholder="Nouveau nom"   required/>
    </label>
    
    <label>
        <input  id='pass' type="text" name="nom2" placeholder="Confirmer le nom" required/>
    </label>
    
     <label>
    	<span>&nbsp;</span> 
        <input type="submit" name="add" class="button" value="changer" /> 
    </label>
</form>



</body>
</html>