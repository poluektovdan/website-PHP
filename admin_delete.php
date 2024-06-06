<?php
require_once('core/config.php');
require_once('core/function.php');
?>

<?php
	$conn = connect();
	$sql = "DELETE FROM info WHERE id=$_GET[id]";

	if (mysqli_query($conn, $sql)) {
		setcookie('bd_success', 1, time()+20);
		header('Location: /admin.php');
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	close($conn);
?>