<?php
include('includes/head.php');
include('includes/bdd.php');


echo "
<nav>
  <div class='lien'>
  <a href=accueil.php >
    <input type='button' value='Retour Accueil'>
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
</nav>
<br/>";


echo "<img class='logo' src='images/logo.png'/>";

echo "<h1>Tout les tutos :</h1>" ;

$read = $bdd->query('SELECT titreVideo, descriptionVideo, lienVideo, miniatureVideo, embedVideo
FROM tuto ORDER BY id DESC');
while ($data = $read->fetch())
{
  echo "
  <div class='tuto-content'>
    <h3> Titre : " .$data['titreVideo']. "</h3>
      <div class='video-content'>
        <img class='miniature' src='" .$data['miniatureVideo']. "'/>
        <br/>
      <div class='video'> " .$data['embedVideo']. "</div></div>
        <p>" .substr($data['descriptionVideo'], 0, 100). "[...] <a href='#'> Voir plus</a></p>
  </div>";
}

/*

 echo "<p>Titre : Pas de titre <br/></p>";
 echo "<p>Description : <br/> Pas de description </p>";
 echo "<p>Video : <br/>" .$requestDecode->embed_html. "</p>";
 echo "<p>Miniature Video : <br/><img src='" .$requestDecode->thumbnail_url. "'></p>";
 echo "<p>Tags : <br/>";
 echo "</p>";
 echo "<p>URL : <br/>" .$requestDecode->url. "</p>";
 echo "<p>Total View : <br/>" .$requestDecode->views_total. "</p>";

PUIS QUAND ON CLIQUE SUR LA MINIATURE CA REDIRIGE VERS :

 //   _________________________
 //  | le titre de la vidéo    |
 //  | la vidéo                |
 //  | la description          |
 //  | embed video             |
 //  | tags                    |
 //  |_________________________|

 IL VA FALLOIR :
 SELECTIONNER TOUT LES CHAMPS ET TOUT LES ID CONFONDUS
 AFFICHER LE TITRE
 AFFICHER LA VIDEO
 AFFICHER LA DESCRIPTION
 AFFICHER LE LIEN Dailymotion
 AFFICHER LES TAGS (option)


*/

?>
