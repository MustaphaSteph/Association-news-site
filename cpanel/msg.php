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
<title>Messages</title>
</head>

<body>
<div id="dr">Messages</div>

<?php
include("config.php");
mysql_query("SET NAMES 'utf8';");

	if(isset($_REQUEST['do']))
{
if($_REQUEST['do']=='suppr')
    {
	$ar_id=intval($_GET['id']);
	
	$delete=mysql_query("DELETE FROM contact WHERE id_contact=".$ar_id);
	
	if($delete)
	{   
	echo "<script language='JavaScript'>alert(' Le message a été supprimé ! ')</script>"; 
	}
	else 
	{
		echo "javascript:alert('votre message n'a pas été supprimé :( '".mysql_error().")"; 
		exit;
	}

    
	}
	
	if($_REQUEST['do']=='lire')
    { 
	echo "<table id='table'>" ;
	$ar_id=intval($_GET['id']);
	$lire=mysql_query('select message from contact where id_contact='.$ar_id);
	while($res = mysql_fetch_array($lire))  
{
	echo "<tr ><td  colspan='2'>".$res['message']."</td></tr>";
	echo "<tr >
	<td ><a href='../cpanel/msg.php' >Return</a> </td>
	<td ><a href='?do=suppr&id=$ar_id'  >Supprimer</a></td>
	</tr>
	"; }
echo"</table>";
exit();
	}

}


echo"<table id='table'>";
echo"<tr> 
<th>#</th>
<th>Nom</th>
<th>Voir</th>
<th>Supprimer</th>
</tr>";

$se=mysql_query("select * from contact ORDER BY id_contact DESC ");
$N=1;
while($res = mysql_fetch_array($se))  
{
	$id=$res['id_contact'];
	$name=$res['nom'];
	
	echo"
	<tr>
	<td><a href='#' >$N</a></td> 
	<td><a href='#' >$name</a></td>
	<td><a href='?do=lire&id=$id' >Lire</a> </td>
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