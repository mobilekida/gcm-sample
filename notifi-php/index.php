<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ishimaru
 * Date: 2013/05/10
 * Time: 17:45
 * メッセージを送信する。
 */
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
</head>
<body>
<form action="post.php" method="post">
    <p>Google Cloud Messaging for Android</p>
    <dl>
        <dt>
            最後に登録された端末ID
        </dt>
        <dd>
            <?php
            $reg_id = file_get_contents("register.txt");
            ?>
            <textarea cols="100" rows="3" name="register_id"><?php echo $reg_id;?></textarea>
        </dd>
        <dt>
            <label>メッセージ</label>
        </dt>
        <dd>
            <input type="text" name="message" size="100" value="" />
        </dd>
        <dt>
            <label>URL</label>
        </dt>
        <dd>
            <input type="text" name="url" size="200" value="" />
        <dt>
    </dl>
    <input type="submit" value="送信" />
</form>

<p>
    過去のID
<ol>
    <?php
    $reg_ids = file_get_contents("register_org.txt");
    $ids = explode(PHP_EOL,$reg_ids);
    foreach($ids as $id) {
        ?>
    <li><?php echo $id;?></li>
        <?php
    }
    ?>
</ol>
</p>
</body>
</html>