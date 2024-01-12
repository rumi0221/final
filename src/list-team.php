<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>最終課題</title>
</head>
<body>
    <div class="main">
        <h1>推し管理システム</h1>
        <?php require 'menu.php'; ?>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from team');
    $sql->execute();
    foreach($sql as $row){
        echo $row['teamname'], '<br>', $row['debutday'];
    }
?>

    </div>
</body>
</html>