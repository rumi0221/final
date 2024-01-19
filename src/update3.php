<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <title>商品更新完了画面</title>
</head>
<body>
    <div class="main">
    <h1>推し管理システム</h1>
    <?php require 'menu.php'; ?>
    <h3>更新</h3>
    <?php require 'menu.php'; ?>
    <?php
        $pdo=new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('update fav set (DEFAULT, ?, ?, ?, ?, ?, ?)');
        $sql->execute([ $_POST['name'], $_POST['birthplace'], $_POST['birthday'], (int)$_POST['team_id'], $_POST['office'], $_POST['image']]);
   ?>
    <p>情報が更新されました</p>
    </div>
</body>
</html>