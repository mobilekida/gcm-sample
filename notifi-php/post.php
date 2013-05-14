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
    <meta charset="utf-8">
</head>
<body>
<?php
define("GOOGLE_API_KEY", "YOUR_KEY");
define("GOOGLE_GCM_URL", "https://android.googleapis.com/gcm/send");

function send_gcm_notify($reg_id, $message,$url) {

    $fields = array(
        'registration_ids'  => array( $reg_id ),
        'data'              => array( "message" => $message,"url" => $url ),
    );

    $headers = array(
        'Authorization: key=' . GOOGLE_API_KEY,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, GOOGLE_GCM_URL);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

    print_r($fields);

    $result = curl_exec($ch);
    if ($result === FALSE) {
        die('Problem occurred: ' . curl_error($ch));
    }

    curl_close($ch);
    echo $result;
}

$reg_id = file_get_contents("register.txt");

if ( isset($_POST['register_id']) ) {
    $reg_id = str_replace(PHP_EOL,"",$_POST['register_id']);
}
$msg = $_POST['message'];
$url = $_POST['url'];

send_gcm_notify($reg_id, $msg,$url);

?>
<hr/>
<input type="button" value="back" onclick="javascript:history.back();" />
</body>