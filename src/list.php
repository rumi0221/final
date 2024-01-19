<?php require 'db-connect.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <title>最終課題</title>
</head>
<body>
    <div class="main">
        <h1>推し管理システム</h1>
        <?php require 'menu.php'; ?>
        <h3>一覧</h3>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from fav');
    $sql->execute();
    foreach($sql as $row){
        echo '<img src="img/', $row['image'], '" width="200" heigth="auto">', '<br>';
        echo '<table><tr><th>名前</th><td>', $row['name'], '</td></tr>',
             '<tr><th>出身地</th><td>', $row['birthplace'], '</td></tr>',
             '<tr><th>誕生日</th><td>', $row['birthday'], '</td></tr>';
        $sql2 = $pdo->query('select * from team where team_id = '. $row['team_id']);
        $row2 = $sql2->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
        echo '<tr><th>チーム</th><td>', $row2['team_name'], '</td></tr>',
             '<tr><th>デビュー日</th><td>', $row2['debutday'], '</td></tr>',
             '<tr><th>所属事務所</th><td>', $row['office'], '</td></tr>';
        echo '</table>';
        echo '<br>';
    }
?>

    </div>
</body>
</html>