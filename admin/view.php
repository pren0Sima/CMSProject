<?php
include("templates/header.php");
?>

<div class="post w-100 bg-light p-4">
    <?php
    $id = htmlspecialchars($_GET["id"]);
    include("../connectDB.php");
    $sqlSelectPost = "SELECT * FROM recipes
                      WHERE id = '$id';";
    try {
        $result = mysqli_query($conn, $sqlSelectPost);
        if (mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_array($result)) {
    ?>
                <h2><?php echo $data['title']; ?></h2>
                <hr>
                <p><?php echo $data['ingredients']; ?></p>
                <hr>
                <p><?php echo $data['instructions']; ?></p>
                <hr>
                <p><?php echo $data['date']; ?></p>
    <?php
            }
        // close connection:
        mysqli_close($conn);
        } else {
            die("Post not found. Press \"Dashboard\" to get back to the main page.<br>");
        }
    } catch (mysqli_sql_exception) {
        die("Could not establish connection.<br>");
    }
    
    ?>
</div>

<?php
include("templates/footer.php");
