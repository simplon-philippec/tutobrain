<?php
include('includes/head.php');
?>

<?php
// IL faut que je fasse une boucle pour generer les tableaux en fonction de la catégorie recherché

// Je veux afficher la list des vidéos en rapport avec le bricolage en FR
$apiLinkFavoris = 'https://api.dailymotion.com/user/Ricola95/favorites?fields=description,embed_url,embed_html,thumbnail_url,title,comments_total,views_total,&page=1&limit=10';
echo "<h1>Video généré :</h1>";
echo "<h3>" .$requestDecode->list['1']->title. "</h3><br/>";
echo "<p>" .$requestDecode->list['1']->description. "</p><br/>";
echo "<img src='" .$requestDecode->list['1']->thumbnail_url. "'><br/>";
echo "<div>" .$requestDecode->list['1']->embed_html. "</div><br/>";
echo "<p>Liens de la Vidéo :" .$requestDecode->list['1']->embed_url. "</p><br/>";
echo "<p>Nombre de Commentaire :" .$requestDecode->list['1']->comments_total. "</p><br/>";

?>
