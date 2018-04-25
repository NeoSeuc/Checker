<?php
require_once('db.php');
require_once('change.php');

$token = "582955940:AAHvxZ41AhxvdV2mUQo5BVohm7wLOKPaZf0";

$msg = " не работает!";
$users = getAllChatId();
$request_param = [
    'chat_id' => 448169853,
    'text' => $msg
];

$count = count($users);


$db = Db::getConnection();

$result = $db->query('SELECT * from sites');
require_once('Testing.php');
while ($row = $result->fetch()) {
    $res = Testing::testSite($row['name']);
    if (!$res) {
        for ($i = 0; $i < 3; $i++) {
            $request_param['text'] = $row['name'] . $msg;

            $request_param['chat_id'] = $users[$i];

            $request_url = "https://api.telegram.org/bot" . $token . "/sendMessage?" . http_build_query($request_param);

            file_get_contents($request_url);

            //sleep(0.02);
        }

    }

}