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
            <h3>Latest News</h3>
            <h4>New Website Launched</h4>
            <h5>February 1st, 2014</h5>
            <p id='p'>2014 sees the redesign of our website. Take a look around and let us know what you thin<br /><a href="#">Read more</a></p>
          </div>
          <div class="sidebar_base"></div>
        </div>
        
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>Contactez-nous</h1>
        <p>Association BANI:</p>       
          <div class="form_settings">
          <?php
		  include("config.php");
mysql_query("SET NAMES 'utf8';");
if(isset($_POST['nom']) or isset($_POST['email']) or isset($_POST['message']) or isset($_POST['env']) )
{
	
$nom=$_POST["nom"];
$email=$_POST["email"];
$message=$_POST["message"];

	
if($_POST["env"])
{

	
	   $add=mysql_query("INSERT INTO contact VALUES('','$nom','$email','$message')");
     	//$add=mysql_query("INSERT INTO tab VALUES('$titre','$auteur')");

	if($add)
	{   

		echo "<script language='JavaScript'>alert('Merci pour nous contacter')</script>"; 

	}
	else 
	{
		echo "javascript:alert('votre message n'a pas été envoyé :( '".mysql_error().")"; 
		exit;
	}
}
}

		  
		  ?>
          <form action="contact.php" method="POST" enctype="multipart/form-data">

            <p><span>Nom</span><input class="contact" type="text" name="nom" value="" autofocus required/></p>
            <p><span>Email</span><input class="contact" type="text" name="email" value="" required/></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="message"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="env" value="Envoyer" /></p>
          </div>       
        
      </div>
    </div>
                  </form>

    <div id="content_footer"></div>
    <div id="footer">
      <p id='pp'>Tous droits réservés, Association BANI - Conception et design <a href="wwww.mosayirwebdesign.com">Mosayir Webdesign</a></p>
    </div>
  </div>
</body>
</html>
