<?php

// 他のPHPファイルを読み込む
require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dateOfBirth = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
    $telephoneNumber = $_POST['telephone_1'] . '-' . $_POST['telephone_2'] . '-' . $_POST['telephone_3'];
    $type = $_POST['type'];
    $address = $_POST['address'];


    // 連想配列を作成
    $user = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'dateOfBirth' => $dateOfBirth,
        'telephoneNumber' => $telephoneNumber,
        'type' => $type,
        'address' => $address,
    ];



    // セッションにIDを保存
    $_SESSION['user'] = $user;

    // my-page に移動させる（リダイレクト）
    header('Location: ./confirm.php');
    exit();
}

?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>会員登録</h1>
            <!-- action: フォームの送信先 -->
            <!-- method: 送信方法（GET / POST） -->
            <form action="./register.php" method="post">
                <div class="form">
                    お名前<br>
                    <input type="text" name="name">
                </div>
                <div class="form">
                    メールアドレス<br>
                    <input type="email" name="email">
                </div>
                <div class="form">
                    パスワード<br>
                    <input type="password" name="password">
                </div>
                <div class="form">
                    生年月日<br>
                    <select name="year">
                        <?php for ($i = 1900; $i <= date('Y'); $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?>年</option>
                        <?php endfor; ?>
                    </select>
                    <select name="month">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?>月</option>
                        <?php endfor; ?>
                    </select>
                    <select name="day">
                        <?php for ($i = 1; $i <= 31; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?>日</option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="form">
                    電話番号<br>
                    <input type="text" name="telephone_1" maxlength="3" size="3"> -
                    <input type="text" name="telephone_2" maxlength="4" size="4"> -
                    <input type="text" name="telephone_3" maxlength="4" size="4">
                </div>
                <div class="form">
                    性別<br>
                    <input type="radio" name="type" value="男性">男性
                    <input type="radio" name="type" value="女性">女性
                </div>
                <div class="form">
                    住所<br>
                    <input type="text" name="address">
                </div>
                <div class="block">
                    <!-- <button type="submit">登録</button> -->
                    <input type="submit" value="登録" name="submit-button">
                </div>
            </form>
        </div>
    </body>
    <?php include __DIR__ . '/includes/footer.php' ?>
</html>
