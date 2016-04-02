<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=tutobrain', 'root', 'root');
  $bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}

catch (Exception $exept)
{
  die('Une erreur est survenue, veuillez raffraichir la page : ' . $exept->getMessage());
}
?>
