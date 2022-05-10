<?php 
    session_start();
    include('connection/server.php'); 

    $errors = array();

    if (isset($_POST['reg_user'])) {
        $fitstname = mysqli_real_escape_string($conn, $_POST['fitstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO tb_user (firstname,lastname,username, email, password,phone) 
            VALUES ('$firstname','$lastname','$username', '$email', '$password' ,'$phone')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        } else {
            header("location: register.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="css\style.css">
</head>
<body>
<div class="block">    
    <div class="header">
        <h2>Register</h2>
    </div>

    <form action="" method="post">
        <?php include('error.php'); ?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <div class="input-group">
            <input type="text" name="firstname" placeholder="Firstname">
        </div>
        <div class="input-group">
            <input type="text" name="lastname" placeholder="Lastname">
        </div>
        <div class="input-group">
            <input type="text" name="username" placeholder="Username">
        </div>
        <div class="input-group">
            <input type="password" name="password_1" placeholder="Password">
        </div>
        <div class="input-group">
            <input type="password" name="password_2" placeholder="Re-password">
        </div>
        <div class="input-group">
            <input type="email" name="email" placeholder="Email">
        </div>

        <div class="input-group">
            <button type="submit" name="reg_user" class="btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a></p>
    </form>
</div>
</body>
</html>