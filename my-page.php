<?php

require_once __DIR__ . '/functions/user.php';

// これを忘れない
session_start();

// セッションにIDが保存されていなければ
// ログインページに移動
if (!isset($_SESSION['id']) && !isset($_COOKIE['id'])) {
    header('Location: ./login.php');
    exit();
}

$id = $_SESSION['id'] ?? $_COOKIE['id'];

$user = getUser($id);

// ユーザーが見つからなかったらログインページへ
if (is_null($user)) {
    header('Location: ./login.php');
    exit();
}

?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
            <h1>マイページ</h1>
            <table>
                <tr>
                    <td>ID</td>
                    <td>
                        <?php echo $user['id'] ?>
                    </td>
                </tr>
                <tr>
                    <td>名前</td>
                    <td>
                        <?php echo $user['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td>
                        <?php echo $user['email'] ?>
                    </td>
                </tr>
                <tr>
                    <td>パスワード</td>
                    <td>
                        <?php echo $user['password'] ?>
                    </td>
                </tr>
                <tr>
                    <td>生年月日</td>
                    <td>
                        <?php echo $user['dateOfBirth'] ?>
                    </td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td>
                        <?php echo $user['type'] ?>
                    </td>
                </tr>
                <tr>
                    <td>電話番号</td>
                    <td>
                        <?php echo $user['telephoneNumber'] ?>
                    </td>
                </tr>
                <tr>
                    <td>住所</td>
                    <td>
                        <?php echo htmlspecialchars($user['address']); ?>
                    </td>
                </tr>
            </table>
            <div class="item">
                <a href="./edit.php">
                    <button>情報変更</button>
                </a>
                <a href="./logout.php">
                    <button>ログアウト</button>
                </a>
            </div>
        </div>
    </body>
    <?php include __DIR__ . '/includes/footer.php' ?>
</html>

