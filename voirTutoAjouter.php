<?php
include('includes/head.php');
include('includes/bdd.php');

/*
 IL FAUT QUE J'UTILISE LES DONNEES QUI SE TROUVE SUR LA BDD ET FAIRE AFFICHER EN FONCTION D'ELLES :

 //   _________________________
 //  | le titre de la vidéo    |
 //  | la miniature            |
 //  | la description          |
 //  | tags                    |
 //  |_________________________|


 IL VA FALLOIR :
 SELECTIONNER TOUT LES CHAMPS AVEC L'ID PRECIS GENERER PAR LA CREATION QUI LA PRECEDE
 AFFICHER LE TITRE
 AFFICHER LA DESCRIPTION
 AFFICHER LA MINIATURE

*/

$read = $bdd->query('SELECT titreVideo, descriptionVideo, lienVideo, miniatureVideo, embedVideo
FROM tuto ORDER BY id DESC');
while ($data = $read->fetch())
{
  echo "
  <div>
    <h3> Titre : " .$data['titreVideo']. "</h3>
      <img src='" .$data['miniatureVideo']. "'/><br/>
      <p>" .substr($data['descriptionVideo'], 0, 100). "<a href='#'>Voir plus</a></p>
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
