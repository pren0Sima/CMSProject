<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="p-4 bg-dark text-center">
        <h1><a href="index.php" class="text-light text-decoration-none">Recipes</a></h1>
    </header>
    <div class="recipe-list mt-4">
        <div class="container">
            <?php
            $id = htmlspecialchars($_GET['id']);
            include("connectDB.php");
            $sqlSelectPost = "SELECT * FROM recipes
                              WHERE id='$id';";
            try {
                $result = mysqli_query($conn, $sqlSelectPost);
                while ($data = mysqli_fetch_array($result)) {
            ?>
                    <div class="post bg-light p-3 mt-4">
                        <h2><?php echo $data["title"]; ?></h2>
                        <hr>
                        <p><?php echo $data["date"]; ?></p>
                        <p><?php echo $data["ingredients"]; ?></p>
                        <p><?php echo $data["instructions"]; ?></p>
                    </div>
            <?php
                }
            } catch (mysqli_sql_exception) {
                die("Recipes unable to open.<br>");
            }
            ?>
        </div>
    </div>
    <footer class="bg-dark p-4 mt-4">
        <a href="admin/index.php" class="text-light">Admin Panel</a>
    </footer>
</body>

</html>