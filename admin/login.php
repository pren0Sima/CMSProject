<?php
session_start();
function add_user($username, $password, $conn)
{
    $sqlAddUser = "INSERT INTO users (username, password)
                   VALUES ('$username', '$password')";
    mysqli_query($conn, $sqlAddUser);
}

function user_exists($username, $conn)
{
    $sqlExists = "SELECT * FROM users
                  WHERE username='$username'";
    $result = mysqli_query($conn, $sqlExists);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST["login"])) {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    include("../connectDB.php");
    // check if username and password are set
    if (!empty($username) && !empty($password)) {
        try {
            // an admin MUST exist.
            if (!user_exists("admin", $conn)) {
                add_user("admin", "admin", $conn);
            }
            // a new user
            if (!user_exists($username, $conn)) {
                add_user($username, $password, $conn);
                $_SESSION["user"] = $username;
                header("Location: ../index.php");
                // exit();
            }
            // user exists
            else {
                $sqlExists = "SELECT * FROM users
                  WHERE username='$username'";
                $result = mysqli_query($conn, $sqlExists);
                $data = mysqli_fetch_assoc($result);
                // check if password is the same
                // if yes, redirect
                if ($password == $data["password"]) {
                    $_SESSION["user"] = $username;
                    $username == "admin" ? header("Location: index.php") : header("Location: ../index.php");
                    // exit();
                } else {
                    // die("Incorrect password");
                    header("Location: login.php");
                }
            }
        } catch (mysqli_sql_exception) {
            die("I wanna sleep.");
        }
    } else {
        die("Username and password are required.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="max-width:600px;">
        <div class="login-form mt-3">
            <form action="login.php" method="post" class="post">
                <div class="form-field mb-2">
                    <input class="form-control" type="text" name="username" placeholder="Username" required>
                </div>
                <div class="form-field mb-2">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-field">
                    <input class="btn btn-info" type="submit" value="Log in" name="login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>