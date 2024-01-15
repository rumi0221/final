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
        $sql=$pdo->prepare('update product set product_mei=?, product_type=?, tanka=?, setumei=?, gazou=?, season=?, zaiko=?, shop_code=? where product_id='.(int)$_POST['product_id']);
        $sql->execute([$_POST['product_name'], $_POST['category'], (int)$_POST['price'], $_POST['explanation'], $_POST['image'], $_POST['season'], (int)$_POST['stock'] , (int)$_POST['shop_id']]);
    ?>
    <p>情報が更新されました</p>
    </div>
</body>
</html>