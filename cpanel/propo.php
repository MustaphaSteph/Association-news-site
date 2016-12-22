<!DOCTYPE HTML>
<html>
<head>
  <title>Association Bani</title>
  <meta name="description" content="site pour association bani" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="style2/style.css" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="../../index.html">Association<span class="logo_colour">BANI</span></a></h1>
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
        <!-- insert the page content here -->
        <h1>Association Bani Tiznit</h1>
        <p class="siz"> Notre vocation est de contribuer au développement sanitaire durable et intégré de 
		la province de Tiznit, en soutenant les patients, les professionnels et les établissements de santé.</p>
		<hr>
		<br>
		<h2>Objectifs:</h2>
		<font size='4px' color='blue'>BANI:</font>
		<p class="siiz">Association du droit marocain à but humanitaire, non lucratif, reconnue d’utilité publique, issue d’un collectif regroupant 
		18 associations de la province de Tiznit, créée le 8 mars 1998, notre objectif est :</p>
         <ul>
		 <li>Soutenir les organismes en charge de la santé avec notamment la construction et l’équipement des établissements de santé</li>
		 <li>Aider financièrement et moralement les patients.</li>
		 <li>Contribuer à l’élargissement des prestations assurées par les services médicaux.</li>
         <li>Contribuer à l’éducation sanitaire de la population.</li>
		 <li>Contribuer à la formation des professionnels de la santé.</li>
		 </ul>
  
         <font size='4px' color='blue'>BAyNI Europe: </font>

         <p class="siiz"><font color='red'>BAyNI</font> Europe est le bureau de représentation de l’association BANI en Europe, fondée par les membres de BANI résidant en France.
         C’est une association de solidarité internationale à but humanitaire régie par la loi française 1901, 
         créée le 18 juillet 2003  à Paris, son objectif est :</p>
		
		
		
		
        <p>This template is a fully functional 5 page website, with an <a href="../examples.html">examples</a> page that gives examples of all the styles available with this design.</p>
        <h2>Browser Compatibility</h2>
        <p>This template has been tested in the following browsers:</p>
        <ul>
          <li>Internet Explorer 9</li>
          <li>FireFox 25</li>
          <li>Google Chrome 31</li>
        </ul>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p id='pp'>Tous droits réservés, Association BANI - Conception et design <a href="wwww.mosayirwebdesign.com">Mosayir Webdesign</a></p>
    </div>
  </div>
</body>
</html>
