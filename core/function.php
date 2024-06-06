<?php

function connect() {
	$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
	mysqli_set_charset($conn, "utf8");
	if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
	}

	return $conn;
}

function select($conn) {
	$sql = "SELECT * FROM info";
	$result = mysqli_query($conn, $sql);

	$a = array();

	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$a[] = $row;
	}
	}

	return $a;
}

function close($conn) {
	mysqli_close($conn);
}
