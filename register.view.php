<?php require('shared/header.php');
?>


<div class="row">
    <div class="col-6 offset-3">
        <h2 class="my-3">Register</h2>
        <form action='register.php' method="post">
            <?php
            if (isset($_GET['username'])) {

                $username = $_GET['username'];
                echo "<input type='text' name='username' placeholder='Username' class='form-control' value='" . $username . "'><br>";
            } else
                echo "<input type='text' name='username' placeholder='Username' class='form-control'><br>";

            if (isset($_GET['name'])) {

                $name = $_GET['name'];
                echo "<input type='text' name='name' placeholder='Name' class='form-control' value='" . $name . "'><br>";
            } else
                echo "<input type='text' name='name' placeholder='Name' class='form-control'><br>";


            if (isset($_GET['surname'])) {

                $surname = $_GET['surname'];
                echo "<input type='text' name='surname' placeholder='Surname' class='form-control' value='" . $surname . "'><br>";
            } else
                echo "<input type='text' name='surname' placeholder='Surname' class='form-control'><br>";

            if (isset($_GET['email'])) {

                $email = $_GET['email'];
                echo "<input type='email' name='email' placeholder='Email' class='form-control' value='" . $email . "'><br>";
            } else
                echo "<input type='email' name='email' placeholder='Email' class='form-control'><br>";

            ?>

            <input type='password' name='password' placeholder="Password" class="form-control"><br>
            <input type='password' name='confirmpassword' placeholder="Confirm password" class="form-control"><br>

            <button type='submit' name='submit' class="btn btn-primary form-control">Register</button>

        </form>
        <?php

        if (!isset($_GET['signup'])) {
            exit();
        } else {

            $signupCheck = $_GET['signup'];

            if ($signupCheck == 'empty') {
                echo "<p class='error mt-2'>You did not fill in all fields!</p>";
                exit();
            } elseif ($signupCheck == 'char') {
                echo "<p class='error mt-2'>You used invalid characters!</p>";
                exit();
            } elseif ($signupCheck == 'email') {
                echo "<p class='error mt-2'>You used an invalid email!</p>";
                exit();
            } elseif ($signupCheck == 'takenemail') {
                echo "<p class='error mt-2'>The email you entered is already taken!</p>";
                exit();
            } elseif ($signupCheck == 'password') {
                echo "<p class='error mt-2'>Passwords don't match!</p>";
                exit();
            } elseif ($signupCheck == 'success') {
                echo "<p class='success mt-2'>Registration successful!</p>";
                exit();
            }
        }

        ?>
    </div>
</div>