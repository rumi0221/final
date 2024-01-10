<?php require 'db-connect.php'; ?>
<?php require 'menu.php'; ?>
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
        <hr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from fav');
    foreach($sql as $row){
        echo $row['image'], '<br>',
             $row['name'], '<br>',
             $row['birthplace'], '<br>',
             $row['birthday'], '<br>';
        $sql2 = $pdo->query('select * from team where teamID = '. $row['teamID']);
        $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
        echo $row2['teamname'], '<br>',
             $row['office'], '<br>';
    }
?>

    </div>
</body>
</html>