<?php
include('includes/head.php');
?>

<?php
$apiLinkBrico = 'https://api.dailymotion.com/videos?fields=description,embed_url,embed_html,thumbnail_url,title,comments_total,views_total,&detected_language=fr&tags=bricolage+tuto+tutoriel&limit=10';
$request = file_get_contents($apiLinkBrico);
$requestDecode = json_decode($request);

// IL faut que je fasse une boucle pour generer les tableaux en fonction de la catégorie recherché

// Je veux afficher la list des vidéos en rapport avec le bricolage en FR
echo "<h1>Video Brico :</h1>";

for ($i=0; $i<10; $i++){
echo "<h3>" .$requestDecode->list[$i]->title. "</h3>";
echo "<p>" .substr($requestDecode->list[$i]->description, 0, 100). "[...] <a href='#'>Voir plus</a></p>";
echo "<img src='" .$requestDecode->list[$i]->thumbnail_url. "'>";
echo "<div>" .$requestDecode->list[$i]->embed_html. "</div>";
echo "<p>Liens de la Vidéo : <a href='" .$requestDecode->list[$i]->embed_url. "'>" .$requestDecode->list[$i]->embed_url. "</a></p>";
echo "<p>Nombre de Commentaire : " .$requestDecode->list[$i]->comments_total. "</p><br/>";
}

// PROBLEMATIQUE

//Quand on copie colle un lien Dailymotion
//Je recupere l'id dans l'URL
//Je crée un nouveau div grace a l'URL en affichant :
//   _________________________
//  | le titre de la vidéo    |
//  | la vidéo                |
//  | la description          |
//  | l'auteur de la vidéo    |
//  | tags                    |
//  |_________________________|

// SOLUTION

// formulaire
// Il faut que je créer un input pour le lien
// Il faut un input textarea pour le Commentaire de description
// Il faut un input submit pour submit le formulaire

// PROBLEMATIQUE

// faut que je regarde comment faire une recherche de vidéo grace à son id
// il faut que je récupere le lien embed_html
// il faut que j'integre le lien embed_html
// il faut que j'integre la description que l'user à mcrypt_get_iv_size
// il faut que j'integre l'auteur de la vidéo
// il faut que j'affiche les tags de la vidéos

// SOLUTION

// quand j'ai un lien dailymotion ex : http://www.dailymotion.com/video/x3wl5rc_iker-casillas-rate-sa-sortie_sport
// il faut que je récupere l'id qui se trouve entre "vidéo/" et "_" soit l'id : "x3wl5rc"
/* une fois l'id récuperer je le fou dans une variable et je l'integre à l'url de l'API ex :
https://api.dailymotion.com/video/$varID?fields=title,description,embed_html,embed_url,thumbnail_url,*/
// ce lien va me permettre d'afficher le titre, la descritpion, la video, le liens externe de la vidéo la miniature,
// ça génere la page HTML avec tout le contenu


?>
