<?php

require_once __DIR__ . '/functions/user.php';


// これを忘れない
session_start();

// ユーザーが見つからなかったらログインページへ
if (is_null($user)) {
    header('Location: ./login.php');
    exit();
}
// ユーザー情報を取得
$id = $_SESSION['id'] ?? $_COOKIE['id'];

if (is_null($user)) {
    header('Location: ./login.php');
    exit();
}

// フォームが送信されたかチェックする
if (isset($_POST['submit-button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // フォームから送信されたデータを取得
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $telephoneNumber = $_POST['telephoneNumber'];
        $type = $_POST['type'];
        $address = $_POST['address'];

        $updatedUser = [
            'id' => $user['id'],
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'dateOfBirth' => $dateOfBirth,
            'telephoneNumber' => $telephoneNumber,
            'type' => $type,
            'address' => $address,
        ];

        // 更新されたユーザー情報を保存
        $updatedUser = updateUser($updatedUser);

        $_SESSION['id'] = $updatedUser['id'];

        // マイページにリダイレクト
        header('Location: ./my-page.php');
        exit();
    }
}

?>
<html>
    <head>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <div class="container">
            <h1>情報変更</h1>
            <form action="./edit.php" method="post">
                <div>
                    お名前<br>
                    <input type="text" name="name" value="<?php echo $updatedUser['name'] ?>">
                </div>
                <div>
                    メールアドレス<br>
                    <input type="email" name="email" required value="<?php echo $updatedUser['email'] ?>">
                </div>
                <div>
                    パスワード<br>
                    <input type="password" name="password">
                </div>
                <div>
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
            <div>
                電話番号<br>
                <input type="text" name="telephone_1" maxlength="3" size="3"> -
                <input type="text" name="telephone_2" maxlength="4" size="4"> -
                <input type="text" name="telephone_3" maxlength="4" size="4">
            </div>
            <div>
                性別<br>
                <input type="radio" name="type" value="男性">男性
                <input type="radio" name="type" value="女性">女性
            </div>
            <div>
                住所<br>
                <input type="text" name="address" value="<?php echo $updatedUser['address'] ?>">
            </div>
            <div class="item">
                <input type="submit" value="更新">
                <!-- キャンセルボタン -->
                <button type="button" onclick="window.location.href='../my-page.php'">キャンセル</button>
            </div>
            </form>
        </div>
    </body>
    <?php include __DIR__ . '/includes/footer.php' ?>
</html>
