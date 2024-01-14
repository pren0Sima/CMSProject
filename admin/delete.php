<?php
$id = htmlspecialchars( $_GET["id"]);
include("../connectDB.php");
$sqlDeletePost = "DELETE FROM recipes
                        WHERE id = $id";
try {
    mysqli_query($conn, $sqlDeletePost);
    session_start();
    $_SESSION["delete"] = "Recipe deleted successfully";
    header("Location: index.php");
} catch (mysqli_sql_exception) {
    die("An error during deletion occurred.<br>");
}

