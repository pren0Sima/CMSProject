<?php
// or "127.0.0.1.3307"
$db_server = "localhost:3307";
$db_user = "root";
$db_pass = "";
$db_name = "cms";
// will be an object; made it global so that it is recognised in all files in compiler
global $conn;


// way 1:
try {
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name
    );
} catch (mysqli_sql_exception) {
    echo "Could not connect<br>";
}

// if ($conn) echo "Connected<br>";
// else echo "Not connected<br>";
