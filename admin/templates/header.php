<?php
session_start();
if(!isset($_SESSION["user"])){
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="dashboard d-flex justify-content-between">
        <div class="sidebar bg-dark vh-100">
            <h1 class="bg-secondary bg-gradient p-4"><a href="./index.php" class="text-light text-decoration-none">Admin panel</a></h1>
            <div class="menus p-3 mt-4">
                <div class="menu">
                    <a href="create.php" class="text-light text-decoration-none"><strong>Add new recipe</strong></a>
                </div>
                <div class="menu mt-4">
                    <a href="../index.php" class="text-light text-decoration-none"><strong>View website</strong></a>
                </div>
                <div class="menu mt-4">
                    <a href="logout.php" class="btn btn-info">Log out</a>
                </div>
            </div>
        </div>