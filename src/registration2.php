<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/product.css">
    <title>最終課題</title>
</head>
<body>
    <div class="main">
        <h1>推し管理システム</h1>
        <?php require 'menu.php'; ?>
        <h3>推し登録</h3>
        <?php
            $pdo=new PDO($connect, USER, PASS);
            $sql=$pdo->prepare('insert into fav values(DEFAULT, ?, ?, ?, ?, ?, ?)');
            $sql->execute([ $_POST['name'], $_POST['birthplace'], $_POST['price'], $_POST['explanation'], $_POST['image'], $_POST['season'], $_POST['stock'] , (int)$_POST['shop_id']]);
        ?>

                
            
            <br>
            <br>
            <a href="productlist.php">戻る</a>
    </div>
</body>
</html>