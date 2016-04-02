<?php
include('includes/head.php');
?>

<?php
$apiLinkJardinage = 'https://api.dailymotion.com/videos?fields=description,embed_url,embed_html,thumbnail_url,title,comments_total,views_total,&detected_language=fr&tags=jardin+tuto+tutoriel&limit=10';
$request = file_get_contents($apiLinkJardinage);
$requestDecode = json_decode($request);


echo "<h1>Video Jardinage :</h1>";

for ($i=0; $i<2; $i++){
echo "<h3>" .$requestDecode->list[$i]->title. "</h3>";
echo "<p>" .substr($requestDecode->list[$i]->description, 0, 100). "[...] <a href='#'>Voir plus</a></p>";
echo "<img src='" .$requestDecode->list[$i]->thumbnail_url. "'>";
echo "<div>" .$requestDecode->list[$i]->embed_html. "</div>";
echo "<p> Liens de la Vidéo : <a href='" .$requestDecode->list[$i]->embed_url. "'>" .$requestDecode->list[$i]->embed_url. "</a></p>";
echo "<p> Nombre de Commentaire : " .$requestDecode->list[$i]->comments_total. "</p><br/>";
}

?>
