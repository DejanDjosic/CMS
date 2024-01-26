<?php
if (isset($_POST['submit'])) {
    require('connection.php');

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($db, $_POST['confirmpassword']);
    $adminRole = 1;


    $name_regex_pattern = "/^[a-zA-Z]*$/";
    $existingMail = mysqli_query($db, "SELECT * FROM users WHERE email='$email'");
    $emailRows = mysqli_num_rows($existingMail);



    if (empty($username) || empty($name) || empty($surname) || empty($email) || empty($password) || empty($confirm_password)) {
        header('Location: register.view.php?signup=empty');
        exit();
    } else {
        if (!preg_match($name_regex_pattern, $name) || !preg_match($name_regex_pattern, $surname)) {
            header('Location: register.view.php?signup=char');
            exit();
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: register.view.php?signup=email&username=$username&name=$name&surname=$surname");
                exit();
            } elseif ($emailRows > 0) {
                header("Location: register.view.php?signup=takenemail&username=$username&name=$name&surname=$surname");
                exit();
            } else {
                if (($password != $confirm_password)) {
                    header('Location: register.view.php?signup=password');
                    exit();
                }
            }
        }
    }



    $password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users VALUES (NULL, '$username', '$name', '$surname', '$email', '$password', '$adminRole',3)";
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('location: login.view.php');
    } else {
        die($db->error);
    }
}
