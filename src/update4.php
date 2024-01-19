<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>商品更新完了画面</title>
</head>
<body>
    <div class="main">
    <h1>推し管理システム</h1>
    <?php require 'menu.php'; ?>
    <h3>更新</h3>
    <?php
        $pdo=new PDO($connect,USER,PASS);
        $sql2=$pdo->prepare('update fav set name=?, birthplace=?, birthday=?, team_id=?, office=?, image=? where id='.(int)$_POST['id'] );
        $sql2->execute([ $_POST['name'], $_POST['birthplace'], $_POST['birthday'], (int)$_POST['team_id'], $_POST['office'], $_POST['image']]);
    ?>
    <p>情報が更新されました</p>
    </div>
</body>
</html>