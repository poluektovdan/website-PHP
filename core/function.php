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

function selectMain($conn) {
	$offset = 0;
    if (isset($_GET['page']) AND trim($_GET['page'])!=''){
        $offset = trim($_GET['page']);
    }
	$sql = "SELECT * FROM info ORDER BY id DESC LIMIT 3 OFFSET ".$offset*3;
	$result = mysqli_query($conn, $sql);

	$a = array();

	if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$a[] = $row;
	}
	}

	return $a;
}

function paginationCount($conn){
    $sql = "SELECT * FROM info";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return ceil($result/3);
}

function close($conn) {
	mysqli_close($conn);
}
