<?php require('shared/header.php') ?>
<div class='main'>
<div class="row">
    <div class="col-6 offset-3 mt-5">
        <h2>Login</h2>
        <form action='login.php' method="post">
            <input type='email' name='email' placeholder="Email" class="form-control"><br>
            <input type='password' name='password' placeholder="Password" class="form-control"><br>
            <button type='submit' class="btn btn-primary form-control">Login</button>
        </form>
        <a href='register.view.php'>Don't have an account? Sign up here</a>
    </div>
</div>
</div>


