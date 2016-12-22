<?php 


$nom=$_FILES["file"]["name"]; 
$taille=$_FILES["file"]["size"]; 


    list($name, $ext) = explode(".", $nom);   // on separe le nom de l'image de son extension    
  
    $ext=".".$ext; // on rajoute un . devant l'extention

    $chemin = "./image/".$nom; // ici c'est l'endroit ou va etre stocker le chemin de votre texte ou image ou autre  ici c'est dans ==> répertoire.

    move_uploaded_file($HTTP_POST_FILES["file"]["tmp_name"],$chemin); // on envoie le fichier a l'endroit voulu

    mysql_query("INSERT INTO image VALUES('','$nom','$name','$taille');"); 

mysql_close();

?>