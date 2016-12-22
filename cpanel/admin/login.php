<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<title>Admin login</title>

</head>

<body>


<div id="login">
  <div id="triangle"></div>
  <h1>Connexion</h1>
  <form action='connexion.php' method='POST'>
    <input type="text" name="login" placeholder="Nom" required />
    <input type="password" name="pass" placeholder="Mot de passe" required/>
    <input type="submit" value="Envoyer" />
  </form>
</div>
</body>
</html>