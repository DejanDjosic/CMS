<?php
require('shared/header.php');
if($_SESSION['username']==NULL)
{
    header('location: login.view.php');
}
?>


<div class='main'>
<div class='jumbotron text-center'>
    <h2 class="mb-5">Welcome to Content Management Studio</h2>
    <h6>Enter your business name below</h6>
    <div class='col-6 offset-3'>
    <form action='' method='post'>
        <input class="form-control" type='text' name='business' placeholder="Business" required />
        <button class='btn btn-info form-control mt-3' type='submit' name='btnSubmit' >Save</button>

    </form>
    </div>
</div>
</div>
