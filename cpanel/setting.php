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

var fieldalias="mot de passe"
function verify(element1, element2)
 {
  var passed=false
  
   if (element1.value=='')
   {
    alert("Veuillez entrer votre "+fieldalias+" dans le premier champ!")
    element1.focus()
   }

   else if (element2.value=='')
   {
    alert("Veuillez confirmer votre "+fieldalias+" dans le second champ!")
    element2.focus()
   }

   else if (element1.value!=element2.value)
   {
    alert("Les deux "+fieldalias+" ne condordent pas")
    element1.select()
   }

   else
   passed=true
   return passed
 }

</script>
<title>Gestion des articles</title>
</head>

<body>
<div id="dr"> Gestion des articles</div>

<?php
include("config.php");
mysql_query("SET NAMES 'utf8';");

	if(isset($_REQUEST['do']))
{
if($_REQUEST['do']=='pass')
{
	
	
	$last=mysql_query("select pass from admin");
	
	while($last4= mysql_fetch_array($last))  
{
	$pass=$last4['pass'];
}
	

if(isset($_POST["add"]))
	{
   	if($_POST["add"])
{
	$pass_n=$_POST["pass"];
	$pass=intval($_GET['pass']);
	

	   $updat=mysql_query("UPDATE admin SET titre='$pass_n' WHERE pass=$pass");

	if($updat)
	{   
	
	    
		echo "<script language='JavaScript'>alert(' Le Nom a été modifier ')</script>";
				echo'<meta http-equiv="refresh" content="1;setting.php"/>';
				exit;

	}
	else 
	{
        echo "javascript:alert('Erreur :( '".mysql_error().")"; 
		exit;
    }
  }
}
	
	
	
echo'<form action="gestion_article.php?do=pass&pass='.$pass.'" onSubmit="return verify(this.pass, this.pass2)  method="POST" enctype="multipart/form-data" class="elegant-aero">
    <h1>Changez le mot de passe
    	<span>S il vous plais remplir tous les champs</span>
    </h1>
    <label>
    	<span>Nouveau mot de passe :</span>
		<br/>
        <input id="pass" type="text" name="pass"   required/>
    </label>
    
    <label>
    	<span>Confirmez le mot de passe :</span>
				<br/>

        <input id="pass" type="text" name="pass2" required/>
    </label>
    
     <label>
    	<span>&nbsp;</span> 
        <input type="submit" name="add" class="button" value="changer" /> 
    </label>    
</form>';
exit();

}


	}





echo"<table id='table'>";
echo"<tr> 
<th>Nom</th>
<th>mot de passe</th>
</tr>";

	
	echo"
	<tr>
	<td><a href='Cn.php' >Modifier</a> </td>
	<td><a href='Cp.php'  >Modifier</a></td>
	</tr>
	";

echo"</table>";
exit();


?>

</body>
</html>