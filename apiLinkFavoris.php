<?php
include('includes/head.php');
?>

<?php
echo "
<nav>
  <div class='lien'>
    <a href=accueil.php target='_blank'>
      <input type='button' value='Retour Accueil'>
    </a>
    <a href='animaux.php' target='_blank'>
      <input type='button' value='ANIMAUX'>
    </a>
    <a href='beaute.php' target='_blank'>
      <input type='button' value='BEAUTE'>
    </a>
    <a href='brico.php' target='_blank'>
      <input type='button' value='BRICO'>
    </a>
    <a href='jardinage.php' target='_blank'>
      <input type='button' value='JARDINAGE'>
    </a>
    <a href='cuisine.php' target='_blank'>
      <input type='button' value='CUISINE'>
    </a>
    <a href='apiFormAjout.php' target='_blank'>
      <input type='button' value='Ajouter un Tuto'>
    </a>
    <a href='voirTutoAjouter.php' target='_blank'>
      <input type='button' value='Voir les Tutos'/>
    </a>
  </div>
</nav>
<br/>

<article>
  <div class='divLogoAccueil'>
    <img class='imgLogoAccueil' src='images/logo.png'>
  </div>
</article>";

$apiLinkFavoris = 'https://api.dailymotion.com/user/Ricola95/favorites?fields=description,embed_url,embed_html,thumbnail_url,title,comments_total,views_total,&page=1&limit=10';
$request = file_get_contents($apiLinkFavoris);
$requestDecode = json_decode($request);
echo "<h1> Video généré :</h1>";
foreach ($requestDecode as $key => $value) {
  foreach ($value as $newkey => $newValue) {
    echo "<div class='tuto-content'><h3>" .$newValue->title. "</h3><hr/>";
    echo "<p>" .substr($newValue->description, 0, 100). "[...]</p>";
    echo "<div class='video-content'><img class='miniature' src='" .$newValue->thumbnail_url. "'/>";
    echo "<div class='video'>" .$newValue->embed_html. "</div></div>";
    echo "<p class='bottom-text-content'> Liens de la Vidéo : <a href=" .$newValue->embed_url. "></a>";
    echo "<p class='bottom-text-content'> Nombre de Commentaire : " .$newValue->comments_total. "</p><br/></div>";
  }
}

?>
