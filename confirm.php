<?php
session_start();


// セッションに保存
$user = $_SESSION['user'];
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>確認画面</h1>
        <p>お名前: <?php echo htmlspecialchars($user['name']); ?></p>
        <p>メールアドレス: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>生年月日: <?php echo htmlspecialchars($user['dateOfBirth']); ?></p>
        <p>電話番号: <?php echo htmlspecialchars($user['telephoneNumber']); ?></p>
        <p>性別: <?php echo htmlspecialchars($user['type']); ?></p>
        <p>住所: <?php echo htmlspecialchars($user['address']); ?></p>

        <form action="./complete.php" method="post">
            <input type="submit" value="登録する">
        </form>
        <form action="./register.php" method="post">
            <input type="submit" value="戻る">
        </form>

    </div>
</body>
</html>


