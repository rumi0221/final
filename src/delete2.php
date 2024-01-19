<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>最終課題</title>
</head>
<body>
    <div class="main">
        <h1>推し管理システム</h1>
        <?php require 'menu.php'; ?>
        <h3>削除</h3>
        <p>削除されました。</p>
        <?php
            $pdo=new PDO($connect, USER, PASS);
            $sql=$pdo->prepare('delete from fav where id=?');
            $sql->execute([(int)$_POST['id']]);
        ?>
    </div>
</body>
</html>