<?php
session_start();
require('connection.php');
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$query = mysqli_query($db, $sql);

$result = mysqli_fetch_assoc($query);


if ($result) {

    $_SESSION['name'] = $result['name'];
    header('location: index.php');
} else {
    session_destroy();
    header('location: login.view.php');
}
