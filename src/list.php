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
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from fav');
    $sql->execute();
    foreach($sql as $row){
        echo '<br>';
        echo '<img src="img/', $row['image'], '">', '<br>',
             $row['name'], '<br>',
             $row['birthplace'], '<br>',
             $row['birthday'], '<br>';
        $sql2 = $pdo->query('select * from team where team_id = '. $row['team_id']);
        $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
        echo $row2['team_name'], '<br>',
             $row2['debutday'], '<br>',
             $row['office'], '<br>';
    }
?>

    </div>
</body>
</html>