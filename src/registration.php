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
        <form action="registration2.php" method="post">
            <table class="table-color">
                <tr>
                    <th>画像</th>
                    <td><input type="file" class="textw" name="image" required></td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td><input type="text" class="textw" name="name" required></td>
                </tr>
                <tr>
                    <th>出身地</th>
                    <td><input type="text" class="textw" name="birthplace" required></td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td><input type="text" class="textw" name="birthday" required></td>
                </tr>
                <!--teamテーブルにあらかじめデータを入れておいてリストボックスで選ぶ or 該当チームがない場合先に登録するようにする-->
                <tr>
                    <th>チーム</th>
                    <td><select class="textw" name="team_name">
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql=$pdo->query('select * from team');
                                foreach($sql as $row){
                                    echo '<option>', $row['team_name'], '</option>';
                                }
                                echo '<input type="hidden" name="shop_id" value="';
                                $pdo=new PDO($connect,USER,PASS);
                                $sql=$pdo->query('select * from team where team_name like "'. $row['team_name']. '"');
                                $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                                echo $row['team_id'];
                            ?>
                            ">
                        </select></td>
                </tr>
                <tr>
                    <th>所属事務所</th>
                    <td><input type="text" class="textw" name="office" required></td>
                </tr>
            </table>
            <br>
            <button type="submit">登録確認</button>
        </form>
    </div>
</body>
</html>