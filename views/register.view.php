<?php require "partials/head.php" ?>
<?php require "partials/nav.php" ?>


<div class="container">
    <h2>Register an account</h2>
    <form action="/register" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="example@email.com">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
        </div>
        <div>
            <label for="repeatpassword">Confirm Password</label>
            <input type="password" name="repeatpassword" id="repeatpassword" placeholder="Repeat password">
        </div>
        <button type="submit">Register</button>
    </form>

    <h2>Registered accounts</h2>
    <?php foreach ($users as $user) { ?>
        <div>
            <span>Username: <?=$user->username ?></span>
            <span>Email: <?=$user->email ?></span>
            <a href="./delete/user?id=<?=$user->id?>" style="color:red;">Delete</a>
        </div>
    <?php }?>
</div>

<?php require "partials/footer.php" ?>
