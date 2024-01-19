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
        <h1>登録内容確認</h1>
        <table class="table-color">
            <form action="registration3.php" method="POST">
                <tr>
                    <th>画像</th>
                    <td><?php echo $_POST['image']; ?></td>
                    <input type="hidden" name="image" value="<?php echo $_POST['image']; ?>">
                </tr>
                <tr>
                    <th>名前</th>
                    <td><?php echo $_POST['name']; ?></td>
                    <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
                </tr>
                <tr>
                    <th>出身地</th>
                    <td><?php echo $_POST['birthplace']; ?></td>
                    <input type="hidden" name="birthplace" value="<?php echo $_POST['birthplace']; ?>">
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td><?php echo $_POST['birthday']; ?></td>
                    <input type="hidden" name="birthday" value="<?php echo $_POST['birthday']; ?>">
                </tr>
                <tr>
                    <th>チーム</th>
                    <td>
                        <?php echo $_POST['team_name']; ?>
                        <input type="hidden" name="team_id" value="
                            <?php
                                $pdo=new PDO($connect,USER,PASS);
                                $sql=$pdo->query('select * from team where team_name like "'. $_POST['team_name']. '"');
                                $row = $sql->fetch(PDO::FETCH_BOTH, PDO::FETCH_ORI_LAST);
                                echo $row['team_id'];
                            ?>
                        ">
                            
                    </td>
                </tr>
                <tr>
                    <th>所属事務所</th>
                    <td><input type="text" class="textw" name="office" value="<?php echo $_POST['office']; ?>"required></td>
                </tr>
        </table>
                <br>
                <button type="submit">更新</button>
            </form>
            <br>
            <br>
            <form action="registration.php" method="POST">
                <button type="submit" class="link">戻る</button>
            </form>
    </div>

</body>
</html>