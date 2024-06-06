<?php
require_once('core/config.php');
require_once('core/function.php');
?>

<?php
if (isset($_POST['title']) AND $_POST['title'] !='') {
	$title = $_POST['title'];
	$descrMin = $_POST['descr-min'];
	$description = $_POST['description'];

	move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
	$conn = connect();
	$sql = "INSERT INTO info (title, descr_min, description, image) VALUES ('".$title."', '".$descrMin."', '".$description."', '".$_FILES['image']['name']."')";

	if (mysqli_query($conn, $sql)) {
		setcookie('bd_success', 1, time()+20);
		header('Location: /admin.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	close($conn);
}
?>

<h2>Create post</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <p>Title: <input type="text" name="title"></p>
    <p>Min description:</p>
    <textarea name="descr-min"></textarea>
    <p>Description:</p>
    <textarea name="description"></textarea>

    <p>Photo: <input type="file" name="image"></p>
    
    <p><input type="submit" value="add"></p>
</form>