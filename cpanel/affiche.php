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
echo "<p id='p'>".truncate($tex,"article.php","article_id",$result['id'])."</p>";
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


 
if(isset($_GET['article_id'])) // Si la variable $_GET['page'] existe...
{
     $pageActuelle=intval($_GET['article_id']);
 

}



$sql = "SELECT * FROM articlee where id=".$pageActuelle."";  
$result = mysql_query($sql);


while($row = mysql_fetch_array($result))  
{ 
//$tex=strip_tags($row['aricle']);
$tex=$row['aricle'];

$iid=$row['id'];
echo"<h3><a id='a' href='article.php?id=$iid'>".$row['titre']."</a></h3>";   
echo"<img src='gif/author.gif' /> <font id='F'>".$row['auteur_article']."</font> || ";
echo"<img src='gif/time.png' /> <font id='F'>".$row['date']."</font>";
echo"</br>";
echo"<img id='ig' src='img/".$row['image']."' height='140' width='200'/>";
echo"</br>";
echo "<p>".$tex."</p>";
} 
 


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
