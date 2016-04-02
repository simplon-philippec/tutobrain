<?php
include('includes/head.php');
include('includes/bdd.php');
?>

<form method="POST" action="apiFormAjout.php">
  <input type="text" name="titleLinks" id="titleLinks" placeholder="Titre de la vidéo"/><br/>
  <input type="text" name="dailyLinks" id="dailyLinks" placeholder="http://www.dailymotion.com/video/x3wl5rc_iker-casillas-rate-sa-sortie_sport"/><br/>
  <textarea rows="4" cols="50" name="describeLinks" id="describeLinks" placeholder="Description"></textarea><br/>
  <input type="submit" name="submitVerifLinks" id="submitVerifLinks"/>
</form>

<?php

$url = $_POST['dailyLinks'];
$title = $_POST['titleLinks'];
$describe = $_POST['describeLinks'];
$parseInfo = pathinfo($url);
$idMovie = $parseInfo['basename'];
$apiLinkMovie = "https://api.dailymotion.com/video/".$idMovie."?fields=channel.name,description,embed_html,embed_url,genre,owner,owner.avatar_120_url,tags,created_time,thumbnail_url,title,url,views_total,";
$request = file_get_contents($apiLinkMovie);
$requestDecode = json_decode($request);

echo "<h3> Voici le tuto que vous allez ajouter ! </h3>";

// TITRE VIDEO
echo "<p><strong>Titre : </strong><br/>";
if ($title == ""){
  if ($requestDecode->title == ""){
    echo "Pas de titre pour le moment";
  }
  else {
    echo $requestDecode->title;
  }
}
else {
  echo $title;
}
echo "</p>";
// FIN TITRE VIDEO

// DESCRIPTION
echo "<p><strong>Description : </strong><br/>";
if ($describe == ""){
  if ($requestDecode->description == ""){
    echo "Pas de description pour le moment";
  }
  else{
    echo $requestDecode->description;
  }
}
else {
  echo $describe;
}
echo "</p>";
// FIN DESCRIPTION

// VIDEO
echo "<p><strong>Video : </strong><br/>";
if (empty($requestDecode->embed_html)){
  echo "Pas de vidéo pour le moment";
}
else{
  echo $requestDecode->embed_html;
}
echo "</p>";
// FIN VIDEO

// MINIATURE
echo "<p><strong>Miniature Video : </strong><br/>";
if (empty($requestDecode->thumbnail_url)){
  echo "Pas de miniature pour le moment";
}
else{
echo "<img src='" .$requestDecode->thumbnail_url. "'>";
}
echo "</p>";
// FIN MINIATURE

// TAGS
echo "<p><strong>Tags : </strong><br/>";
 if (empty($requestDecode->tags)){
   echo "Pas de tags pour le moment";
 }
 else{
   foreach ($requestDecode->tags as $key => $value) {
   echo $value. " ";
  }
 }
echo "</p>";
// FIN TAGS

// URL
echo "<p><strong> URL : </strong></br>";
if (empty($requestDecode->url)){
  echo "Pas d'URL pour le moment";
}
else{
echo $requestDecode->url;
}
echo "</p>";
// FIN URL



// SI $title EST VIDE ALORS UTILISE $requestDecode->title
// SI $requestDecode->title EST VIDE ECRIT DANS LA VARIABLE LA CHAINE DE CARACTERE "SANS TITRE"
?>

<form method="POST" action="apiFormAjout.php">
<input type="submit" name="submitVerifLinks" id="submitVerifLinks" value="Envoyer à coup sur ?"/>
</form>

<?php
$prepare = $bdd->prepare('INSERT INTO tuto (titreVideo, descriptionVideo, idVideo, lienVideo, miniatureVideo, embedVideo)
VALUES (:titreVideo, :descriptionVideo, :idVideo, :lienVideo, :miniatureVideo, :embedVideo)');
$prepare->execute(array(
  'titreVideo' => $requestDecode->title,
  'descriptionVideo' => $requestDecode->description,
  'idVideo' => $parseInfo['basename'],
  'lienVideo' => $requestDecode->url,
  'miniatureVideo' => $requestDecode->thumbnail_url,
  'embedVideo' => $requestDecode->embed_html
));
header('Location:voirTutoAjouter.php');
?>
