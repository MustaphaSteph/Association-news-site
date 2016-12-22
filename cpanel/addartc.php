<html>
<head>
<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<script src="nicEdit/nicEdit.js" type="text/javascript"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({iconsPath : 'nicEdit/nicEditorIcons.gif'}).panelInstance('message');
});
</script>
</head>
<body>
<div id="dr"> Ajouter un article</div>
<?php
include("config.php");
mysql_query("SET NAMES 'utf8';");
if(isset($_POST['title']) or isset($_POST['auteurr']) or isset($_POST['articlee']) or isset($_POST['add']) )
{
	
$titre=$_POST["title"];
$auteur=$_POST["auteurr"];
$art=$_POST["articlee"];
$temp=date("Y-m-d H:i:s");
$name=$_FILES["image"]["name"];
$type=$_FILES["image"]["type"];
$size=$_FILES["image"]["size"];
$tomp=$_FILES["image"]["tmp_name"];
$error=$_FILES["image"]["error"];

if($name=='')
	{
	$img='no_image_bani_steph.jpg';
	}
	else
	{
		$img=$name;
	}
	

if($_POST["add"])
{
if($titre=="" or $auteur=="" or $art=="<br>")
{
	
echo"<div class='an'> Il faut remplir tous les champs </div>";
echo'<meta http-equiv="refresh"  content="2;addartc.php"/>';
}
else
{
	
	   $add=mysql_query("INSERT INTO articlee VALUES('','$titre','$temp','$auteur','$img','$art')");
     	//$add=mysql_query("INSERT INTO tab VALUES('$titre','$auteur')");

	if($add)
	{   
	
	    if($name!='')
	{
	$tomp=$_FILES["image"]["tmp_name"];
	$name=$_FILES["image"]["name"];
	move_uploaded_file($tomp,"img/".$name);
	}
		echo"<div class='ok'> L'article a été ajouter </div>";
		echo'<meta http-equiv="refresh" content="2;addartc.php"/>';
		exit;
	}
	else 
	{
		echo"<div class='an'> L'article a été rejeté </div>";
        echo'<meta http-equiv="refresh" content="2;addartc.php"/>';
		echo mysql_error();
		exit;
	}
}
}
}
?>

<form action="addartc.php" method="POST" enctype="multipart/form-data" class="elegant-aero">
    <h1>Nouveau Article 
    	<span>S'il vous plais remplir tous les champs</span>
    </h1>
    <label>
    	<span>Titre :</span>
        <input id="name" type="text" name="title"  autofocus required/>
    </label>
    
    <label>
    	<span>Auteur :</span>
        <input id="email" type="text" name="auteurr" placeholder='Votre nom' required/>
    </label>
    
    <label>
    	<span>Article :</span>
        <textarea id="message"  name="articlee" ></textarea>
        
    </label> 
    <label>
    	<span>Image :</span>
        <input id="email" type="file" name="image" />
    </label>
       
     <label>
    	<span>&nbsp;</span> 
        <input type="submit" name="add" class="button" value="Enregistrer" /> 
    </label>    
</form>


</body>
</html>