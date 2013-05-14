<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ishimaru
 * Date: 2013/05/10
 * Time: 17:45
 * 端末IDの登録
 */
$old = file_get_contents("register.txt");
file_put_contents("register_org.txt","\n".$old,FILE_APPEND);

$fp = fopen("register.txt", "w");
fwrite($fp, $_POST['regId']);
fclose($fp);

print('registration end');
