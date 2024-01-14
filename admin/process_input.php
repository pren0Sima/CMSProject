<?php
// if the submit button is pressed:
if (isset($_POST["create"])) {
    include("../connectDB.php");
    if (isset($_POST["title"]))
        $title = htmlspecialchars($_POST["title"]);
    if (isset($_POST["ingredients"]))
        $ingredients = htmlspecialchars($_POST["ingredients"]);
    if (isset($_POST["instructions"]))
        $instructions = htmlspecialchars($_POST["instructions"]);
    // the date is automatically saved
    if (isset($_POST["date"]))
        $date = htmlspecialchars($_POST["date"]);
    // inserions:
    // Check if the recipe already exists
    $sqlCheckExisting = "SELECT * FROM recipes
                         WHERE title = '$title'
                         AND ingredients = '$ingredients'
                         AND instructions = '$instructions';";
    try {
        $resultExisting = mysqli_query($conn, $sqlCheckExisting);
        if (mysqli_num_rows($resultExisting) > 0) {
            echo "Recipe already exists.<br>";
        } else {
            $sqlInsert = "INSERT INTO recipes(title, ingredients, instructions)
                          VALUES ('$title', '$ingredients', '$instructions');";
            mysqli_query($conn, $sqlInsert);
            session_start();
            $_SESSION["create"] = "Recipe added successfully";
            header("Location: index.php");
            // echo "Data inserted successfully.<br>";
        }
    } catch (mysqli_sql_exception) {
        die("An error with db data insertion occured.<br>");
    }
}
    // if the update button is pressed:
    if (isset($_POST["update"])) {
        include("../connectDB.php");
        if (isset($_POST["id"]))
            $id = htmlspecialchars($_POST["id"]);
        if (isset($_POST["title"]))
            $title = htmlspecialchars($_POST["title"]);
        if (isset($_POST["ingredients"]))
            $ingredients = htmlspecialchars($_POST["ingredients"]);
        if (isset($_POST["instructions"]))
            $instructions = htmlspecialchars($_POST["instructions"]);
        if (isset($_POST["date"]))
            $date = htmlspecialchars($_POST["date"]);
        // inserions:
        // Check if the recipe already exists
        try {
            $sqlUpdate = "UPDATE recipes SET title='$title',
                                  ingredients='$ingredients',
                                  instructions = '$instructions',
                                  date='$date'
                                  WHERE id='$id';";
            mysqli_query($conn, $sqlUpdate);
            session_start();
            $_SESSION["update"] = "Recipe updated successfully";
            header("Location: index.php");
        } catch (mysqli_sql_exception) {
            echo "An error with db data updating occured.<br>";
        }
    }
