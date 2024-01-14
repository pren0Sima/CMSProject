<?php
    include("templates/header.php")
?>

<div class="create-form w-100 mx-auto p-4" style="max-width: 700px;">
    <form action="process_input.php" method="post">
        <div class="form-field mb-3">
            <input type="text" class="form-control" name="title" id="" placeholder="Enter title">
        </div>
        <div class="form-field mb-3">
            <textarea class="form-control" name="ingredients" id="" cols="30" rows="10" placeholder="Enter ingredients:"></textarea>
        </div>
        <div class="form-field mb-3">
            <textarea class="form-control" name="instructions" id="" cols="30" rows="10" placeholder="Enter instructions:"></textarea>
        </div>
        <input type="hidden" class="form-control" name="date" value="<?php echo date("Y/m/d H:i:s") . "<br>"; ?>">

        <div class="form-field">
            <input type="submit" class="btn btn-primary" name="create" value="Submit">
        </div>
    </form>
</div>

<?php
    include("templates/footer.php");
    // include("C:\xampp\htdocs\CMSProject\connectDB.php");
?>