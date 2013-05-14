<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ishimaru
 * Date: 2013/05/10
 * Time: 17:45
 * 登録済みの端末IDを見る
 */
$reg_id = file_get_contents("register.txt");
echo $reg_id;
