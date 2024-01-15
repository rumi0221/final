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
        <h3>更新</h3>
        <table class="table-color">
            <form action="update3.php" method="POST">
                <?php
                $pdo=new PDO($connect,USER,PASS);
                $sql=$pdo->prepare('select * from fav where id=?');
                $sql->execute([$_POST['id']]);
                $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                ?>
                <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
                <tr>
                    <th>画像</th>
                    <td>
                        <?php echo '<p>', $row['image'], '</p>'; ?>
                        <input type="file" class="textw" name="image" required value="<?php echo $row['image']; ?>">
                    </td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td><input type="text" class="textw" name="name" required value="<?php echo $row['name']; ?>"></td>
                </tr>
                <tr>
                    <th>出身地</th>
                    <td><input type="text" class="textw" name="birthplace" required value="<?php echo $row['birthplace']; ?>"></td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td><input type="text" class="textw" name="birthday" required value="<?php echo $row['birthday']; ?>"></td>
                </tr>
                <!--teamテーブルにあらかじめデータを入れておいてリストボックスで選ぶ or 該当チームがない場合先に登録するようにする
                    元から選んでいたチームが表示されるようにする-->
                <tr>
                    <th>チーム</th>
                    <td><select class="textw" name="team_name">
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql2=$pdo->query('select * from team');
                                foreach($sql2 as $row2){
                                    echo '<option>', $row2['team_name'], '</option>';
                                }
                            ?>
                            <input type="hidden" name="shop_id" value="
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql3=$pdo->query('select * from team where team_name like "'. $row2['team_name']. '"');
                                $row3 = $sql3->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                                echo $row3['team_id'];
                            ?>
                            ">
                        </select></td>
                </tr>
                <tr>
                    <th>所属事務所</th>
                    <td><input type="text" class="textw" name="office" required value="<?php echo $row['office']; ?>"></td>
                </tr>
            </table>
                <br>
                <button type="submit">更新</button>
            </form>
            <br>
            <br>
            <a href="update.php">戻る</a>
    </div>
</body>
</html>