<!DOCTYPE HTML>
<html>
<head>
  <title>Association Bani</title>
  <meta name="description" content="site pour association bani" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css"  href="style2/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="../index.html">Association<span class="logo_colour">BANI</span></a></h1>
          <h2>association reconnue d'utilité publique</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li class="selected"><a href="../cpanel/site.php">Acceuil</a></li>
          <li><a href="../cpanel/propo.php">à propos de nous</a></li>
          <li><a href="../cpanel/projet.php">Nos projets</a></li>
          <li><a href="../cpanel/part.php">Nos partenaires</a></li>
          <li><a href="../cpanel/contact.php">Contactez-nous</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
    <img id='banner' src='style2/banner.jpg' height='212px' width='986px'/>	
    <div id="sidebar_container">
        <div class="sidebar">
          <div class="sidebar_top"></div>
          <div class="sidebar_item">
            <!-- insert your sidebar items here -->
          <?php
			$db="bani";
          mysql_connect("localhost","root","");
          if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          mysql_select_db($db);
		  mysql_query("SET NAMES 'utf8';");

		  
		//function to truncate text and show read more link  
function truncate($mytext,$link,$var,$id) 
{  
$words = explode(" ",$mytext);
$mytext=implode(" ",array_splice($words,0,5));
$mytext = $mytext . " <a href='$link?$var=$id'>Lire la Suite...</a>";  
return $mytext;  
}

$sql = "SELECT * FROM articlee WHERE id IN (SELECT max(id) FROM articlee) ORDER BY date DESC";  
$row = mysql_query($sql);

while($result = mysql_fetch_array($row))  
{
$tex=strip_tags($result['aricle']);
            echo"<h3>Dernières Nouvelles</h3>";
            echo"<h4 id='h'>".$result['titre']."</h4>";
            echo"<h5>".$result['date']."</h5>";
echo "<p id='p'>".truncate($tex,"affiche.php","article_id",$result['id'])."</p>";
}
			 mysql_close();
		  ?> 
                     </div>

          <div class="sidebar_base"></div>
        </div>
        
      </div>
      <div id="content">
        <?php
		
		  $db="bani";
          mysql_connect("localhost","root","");
          if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          mysql_select_db($db);
		  mysql_query("SET NAMES 'utf8';");



$messagesParPage=5; //Nous allons afficher 5 messages par page.
 
//Une connexion SQL doit être ouverte avant cette ligne...
$retour_total=mysql_query('SELECT COUNT(*) AS total FROM articlee'); //Nous récupérons le contenu de la requête dans $retour_total
$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
     {
          $pageActuelle=$nombreDePages;
     }
}
else // Sinon
{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage;
		  
		//function to truncate text and show read more link  
function truncatee($mytext,$link,$var,$id) 
{  
$words = explode(" ",$mytext);
$mytext=implode(" ",array_splice($words,0,30));
$mytext = $mytext . " <a href='$link?$var=$id'>Lire la Suite...</a>";  
return $mytext;  
}


/*if(!$page)
{
	$page=0;
}

$page=$_GET['page'];
*/


$sql = "SELECT * FROM articlee ORDER BY date DESC limit ".$premiereEntree.", ".$messagesParPage."";  
$result = mysql_query($sql);


while($row = mysql_fetch_array($result))  
{ 
$tex=strip_tags($row['aricle']);
//$tex=$row['aricle'];

$iid=$row['id'];
echo"<div id='post'>";
echo"<h3><a id='a' href='article.php?id=$iid'>".$row['titre']."</a></h3>";   
echo"<img src='gif/author.gif' /> <font id='F'>".$row['auteur_article']."</font> || ";
echo"<img src='gif/time.png' /> <font id='F'>".$row['date']."</font>";
echo"<div id='cadre'>";
echo"<img id='ig' src='img/".$row['image']."' height='140' width='200'/>";
echo"<table>";
echo "<tr><td ><p>".truncatee($tex,"affiche.php","article_id",$row['id'])."</p></td></tr>";
echo "</table>";
echo"</div>";
echo"</div>";
} 
 
/*$i=1;

for($x=0;$x<$numarticle;$x=$x+$numpage)
{
echo"";

$i++;	
}*/
 
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }	
     else //Sinon...
     {
          echo ' <a href="site.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';

mysql_close();
       ?> 
		
    </div>
        </div>

    <div id="content_footer"></div>
    <div id="footer">
     
      <p id='pp'>Tous droits réservés, Association BANI - Conception et design <a href="wwww.mosayirwebdesign.com">Mosayir Webdesign</a></p>
    </div>
  </div>
</body>
</html>
