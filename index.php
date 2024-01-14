<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="p-4 bg-primary  text-center">
        <h1><a href="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="text-light text-decoration-none">Recipes</a></h1>
    </header>
    <div class="recipe-list mt-4">
        <div class="container">
            <?php
            include("connectDB.php");
            $sqlSelect = "SELECT * FROM recipes;";
            try {
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
            ?>
                    <div class="row mb-3 p-3 bg-light justify-content-center">
                        <div class="col-sm-2">
                            <h3><?php echo $data["title"]; ?></h3>
                        </div>
                        <div class="col-sm-2">
                            <?php echo $data["ingredients"]; ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo $data["date"]; ?>
                        </div>
                        <div class="col-sm-2">
                            <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
            <?php
                }
            } catch (mysqli_sql_exception) {
                die("Recipes unable to open.<br>");
            }
            ?>
        </div>
    </div>
    <footer class="bg-primary p-4 mt-4">
        <a href="admin/index.php" class="text-light">Admin Panel</a>
    </footer>
</body>

</html>