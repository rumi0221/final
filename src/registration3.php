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
        <h3>推し登録</h3>
        <p>登録されました。</p>
        <?php
            $pdo=new PDO($connect, USER, PASS);
            $sql=$pdo->prepare('insert into fav values(DEFAULT, ?, ?, ?, ?, ?, ?)');
            $sql->execute([ $_POST['name'], $_POST['birthplace'], $_POST['birthday'], (int)$_POST['team_id'], $_POST['office'], $_POST['image']]);
        ?>
    </div>
</body>
</html>