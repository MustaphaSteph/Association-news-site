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

	if(isset($_REQUEST['do']))
{
if($_REQUEST['do']=='modifier')
{
	$ar_id=intval($_GET['id']);
	
	$last=mysql_query("select * from articlee where id=".$ar_id);
	
	while($last4= mysql_fetch_array($last))  
{
	$titrel=$last4['titre'];
    $auteurl=$last4['auteur_article'];
    $artl=$last4['aricle']; 
	$img=$last4['image'];
}
	




if(isset($_POST["add"]))
	{
   	if($_POST["add"])
{
	$titre=$_POST["title"];
    $auteur=$_POST["auteurr"];
    $art=$_POST["articlee"];
    $name=$_FILES["image"]["name"];
	if($name!='')
	{
	$tomp=$_FILES["image"]["tmp_name"];
	$img=$name;
	}
	
	$ar_id=intval($_GET['id']);
if($titre=="" or $auteur=="" or $art=="<br>")
{
	
echo"<div class='an'> Il faut remplir tous les champs </div>";
echo'<meta http-equiv="refresh"  content="2;addartc.php"/>';
}
else
{
	
	   $updat=mysql_query("UPDATE articlee SET titre='$titre',auteur_article='$auteur' , aricle='$art' ,image='$img' WHERE id=$ar_id");
     	//$add=mysql_query("INSERT INTO tab VALUES('$titre','$auteur')");

	if($updat)
	{   
	
	if($name!='')
	{
	$tomp=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	move_uploaded_file($tomp,"img/".$name);
	}
	    
		echo "<script language='JavaScript'>alert(' L'article a été modifier ')</script>";
	}
	else 
	{
        echo "javascript:alert('L'article a été rejeté :( '".mysql_error().")"; 
		exit;
	}
}
}
	
	}
	
echo'<form action="gestion_article.php?do=modifier&id='.$ar_id.'" method="POST" enctype="multipart/form-data" class="elegant-aero">
    <h1>Nouveau Article 
    	<span>S il vous plais remplir tous les champs</span>
    </h1>
    <label>
    	<span>Titre :</span>
        <input id="name" type="text" name="title"  value='.$titrel.' required/>
    </label>
    
    <label>
    	<span>Auteur :</span>
        <input id="email" type="text" name="auteurr" value="'.$auteurl.'"/>
    </label>
    
    <label>
    	<span>Article :</span>
        <textarea id="message"  name="articlee" >'.$artl.'</textarea>
        
    </label> 
    <label>
    	<span>Image :</span>
        <input id="email" type="file" name="image"  />
    </label>
       
     <label>
    	<span>&nbsp;</span> 
        <input type="submit" name="add" class="button" value="Enregistrer" /> 
    </label>    
</form>';
exit();

}
if($_REQUEST['do']=='suppr')
    {
	$ar_id=intval($_GET['id']);
	
	$delete=mysql_query("DELETE FROM articlee WHERE id=".$ar_id);
	
	if($delete)
	{   
	echo "<script language='JavaScript'>alert(' L'article a été supprimé ! ')</script>"; 
	}
	else 
	{
		echo "javascript:alert('l'article n'a pas été supprimé :( .. erreur : '".mysql_error().")"; 
		exit;
	}

    
	}
	}





echo"<table id='table'>";
echo"<tr> 
<th>#</th>
<th>Titre</th>
<th>Modifier</th>
<th>Supprimer</th>
</tr>";

$se=mysql_query("select * from articlee ORDER BY date DESC ");
$N=1;
while($res = mysql_fetch_array($se))  
{
	$id=$res['id'];
	$name=$res['titre'];
	
	echo"
	<tr>
	<td><a href='../article.php?id=$id' >$N</a></td> 
	<td><a href='../article.php?id=$id' >$name</a></td>
	<td><a href='?do=modifier&id=$id' >Modifier</a> </td>
	<td><a href='?do=suppr&id=$id'  >Supprimer</a></td>
	</tr>
	";
	$N++;
}
echo"</table>";
exit();


?>

</body>
</html>