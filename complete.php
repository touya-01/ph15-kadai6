<?php

require_once __DIR__ . '/functions/user.php';
session_start();


$user = $_SESSION['user'];


saveUser($user);



?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>登録完了</h1>
            <a href="./my-page.php"><input type="submit" value="ログインページへ"></a>
        </div>
    </body>
    <?php include __DIR__ . '/includes/footer.php'; ?>
</html>

