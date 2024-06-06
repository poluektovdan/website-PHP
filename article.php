<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$data = selectArticle($conn);
$tag = getArticleTags($conn);
close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
</head>

<?php
$out = '';
$out .="<h1>{$data['title']}</h1>";
$out .="<img src='/images/{$data['image']}'>";
$out .="<div>{$data['description']}</div>";
echo $out;

echo '<hr>';
for ($i=0; $i < count($tag); $i++){
    echo "<a href='/tag.php?tag={$tag[$i]['tag']}' style='padding: 5px;'>{$tag[$i]['tag']}</a>";
}
?>