<?php require "partials/head.php" ?>


<div class="container">
    <form action="login" method="post">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="example@email.com">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
    
        <button type="submit">Login</button>
    </form>
</div>


<?php require "partials/footer.php" ?>
