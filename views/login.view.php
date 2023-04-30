<?php require "partials/head.php" ?>


<div class="container">
    <h3>Login</h3>
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


<style>

    h3 {
        text-align: center;
        margin: 0;
        margin-top: 24px;
        font-size: 40px;
    }

    form {
        width: 500px;
        height: 500px;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    form div {
        padding: 20px;
    }

</style>


<?php require "partials/footer.php" ?>
