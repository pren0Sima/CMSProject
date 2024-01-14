<?php
include("templates/header.php");

$id = htmlspecialchars($_GET["id"]);
include("../connectDB.php");
$sqlEditPost = "SELECT * FROM recipes
                        WHERE id = $id";
try {
    $result = mysqli_query($conn, $sqlEditPost);
} catch (mysqli_sql_exception) {
    die("Could not establish connection.");
}
?>

<div class="create-form w-100 mx-auto p-4" style="max-width: 700px;">
    <form action="process_input.php" method="post">
        <?php
        while ($data = mysqli_fetch_array($result)) {
        ?>
            <div class="form-field mb-3">
                <input type="text" class="form-control" name="title" id="" placeholder="Enter title" value="<?php echo $data['title']; ?>">
            </div>
            <div class="form-field mb-3">
                <textarea class="form-control" name="ingredients" id="" cols="30" rows="10" placeholder="Enter ingredients:"><?php echo $data['ingredients']; ?></textarea>
            </div>
            <div class="form-field mb-3">
                <textarea class="form-control" name="instructions" id="" cols="30" rows="10" placeholder="Enter instructions:"><?php echo $data['instructions']; ?></textarea>
            </div>
            <input type="hidden" class="form-control" name="date" value="<?php echo date("Y/m/d H:i:s"); ?>">
            <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
            <div class="form-field">
                <input type="submit" class="btn btn-primary" name="update" value="Update">
            </div>
        <?php
        }
        // close db connection
        mysqli_close($conn);
        ?>
    </form>
</div>

<?php
include("templates/footer.php");
?>