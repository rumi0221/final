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
        <form action="registration2.php" method="post">
            <table>
                <tr>
                    <th>画像</th>
                    <td><input type="file" name="image" required></td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>出身地</th>
                    <td><input type="text" name="birthplace" required></td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td><input type="text" name="birthday" required></td>
                </tr>
                <!--teamテーブルにあらかじめデータを入れておいてリストボックスで選ぶ or 該当チームがない場合先に登録するようにする-->
                <tr>
                    <th>チーム</th>
                    <td><select class="textw" name="shop_name">
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql=$pdo->query('select * from team');
                                foreach($sql as $row){
                                    echo '<option>', $row['team_name'], '</option>';
                                }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <th>所属事務所</th>
                    <td><input type="text" name="office" required></td>
                </tr>
            </table>

            <button type="submit">登録確認</button>
        </form>
            <br>
            <br>
            <a href="productlist.php">戻る</a>
    </div>
</body>
</html>