<?php
include('includes/head.php');

echo "<nav>
  <div class='lien'>
  <a href=accueil.php >
    <input type='button' value='Retour Accueil'/>
  </a>
  <a href='animaux.php' >
    <input type='button' value='ANIMAUX'/>
  </a>
  <a href='beaute.php' >
    <input type='button' value='BEAUTE'/>
  </a>
  <a href='brico.php' >
    <input type='button' value='BRICO'/>
  </a>
  <a href='jardinage.php' >
    <input type='button' value='JARDINAGE'/>
  </a>
  <a href='cuisine.php' >
    <input type='button' value='CUISINE'/>
  </a>
  <a href='apiFormAjout.php' >
    <input type='button' value='Ajouter un Tuto'/>
  </a>
  <a href='voirTutoAjouter.php' >
    <input type='button' value='Voir les Tutos'/>
  </a>
</div>
</nav><br/>";

echo "<img class='logo' src='images/logo.png'/>";


$apiLinkAnimaux = 'https://api.dailymotion.com/videos?fields=description,embed_url,embed_html,thumbnail_url,title,comments_total,views_total,&channel=lifestyle&detected_language=fr&tags=animaux+tuto+tutoriel&limit=10';
$request = file_get_contents($apiLinkAnimaux);
$requestDecode = json_decode($request);

echo "<h1>Tuto Animaux :</h1>";

foreach ($requestDecode->list as $key => $value) {
  echo "<div class='tuto-content'><h3>" .$requestDecode->list[$key]->title. "</h3><hr>";
  echo "<div class='video-content'><img class='miniature' src='" .$requestDecode->list[$key]->thumbnail_url. "'>";
  echo "<div class='video'>" .$requestDecode->list[$key]->embed_html. "</div></div>";
  echo "<p>" .substr($requestDecode->list[$key]->description, 0, 100). "[...] <a href='#'>Voir plus</a></p>";
  echo "<p class='bottom-text-content'>Liens de la Vidéo : <a href='" .$requestDecode->list[$key]->embed_url. "'>" .$requestDecode->list[$key]->embed_url. "</a></p>";
  echo "<p class='bottom-text-content'>Nombre de Commentaire : " .$requestDecode->list[$key]->comments_total. "</p><br/></div>";
}
?>
