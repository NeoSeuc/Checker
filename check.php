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




$db = Db::getConnection();
for($i = 0; $i<count($users); $i++) {
    $db->query("INSERT INTO chat_id (id) VALUES ('{$users[$i]}')");
}
$chat_id_result = $db->query("SELECT * FROM chat_id");
while( $row1 = $chat_id_result->fetch()){
    $chat_id[] = $row1['id']; // Inside while loop
}

$result = $db->query('SELECT * from sites');
$count = count($chat_id);
require_once('Testing.php');
while ($row = $result->fetch()) {
    $res = Testing::testSite($row['name']);
    if (!$res) {
        for ($i = 0; $i < $count; $i++) {
            $request_param['text'] = $row['name'] . $msg;

            $request_param['chat_id'] = $chat_id[$i];

            $request_url = "https://api.telegram.org/bot" . $token . "/sendMessage?" . http_build_query($request_param);

            file_get_contents($request_url);

            //sleep(0.02);
        }

    }

}