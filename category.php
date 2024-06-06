<?php
require_once 'core/config.php';
require_once 'core/function.php';
$conn = connect();
$data = getPostFromCategory($conn);
$cat = getCatInfo($conn);
close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category</title>
</head>

<?php
echo "<h1>{$cat['category']}</h1>";
$out = '';
for ($i=0; $i < count($data); $i++){
    $out .="<img src='/images/{$data[$i]['image']}' width='100'>";
    $out .="<h2>{$data[$i]['title']}</h2>";
    $out .="<p>{$data[$i]['descr_min']}</p>";
    $out .='<p><a href="/article.php?id='.$data[$i]['id'].'">Read more...</a></p>';
    $out.='<hr>';
}
echo $out;
echo $cat['description'];
?>