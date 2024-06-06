<?php
require_once('core/config.php');
require_once('core/function.php');

$conn = connect();
$data = select($conn);

close($conn);

if(isset($_COOKIE['bd_success']) AND $_COOKIE['bd_success'] !== '') {
    if($_COOKIE['bd_success'] == '1') {
        setcookie('bd_success', 1, time()-20);
        echo "New record created successfully";
    }
}

echo '<h2>Admin-panel</h2>';
echo '<div><a href="/admin_create.php"><button>Add new</button></a></div>';

$out = '<table>';
$out .='<tr><th>ID</th><th>Title</th><th>Description min</th><th>Image</th></tr>';
for ($i=0; $i < count($data); $i++){
    $out .="<tr><td>{$data[$i]['id']}</td><td>{$data[$i]['title']}</td><td>{$data[$i]['descr_min']}</td><td><img src='/images/{$data[$i]['image']}' width='40'></td><td><a href='/admin_delete.php?id={$data[$i]['id']}'><button>Delete</button></a></td></tr>";
}
$out .='</table>';

echo $out;
?>