<?php
function getAllChatId($token)
{
    $url = "https://api.telegram.org/bot".$token."/getUpdates";
    $data = file_get_contents($url) . " ";
    $pattern = "/\"id\":[0-9]{9}/";
    preg_match_all($pattern, $data, $array);
    $un = array_unique($array[0]);
    $un = array_values($un);
    for ($i = 0; $i < count($un); $i++) {
        $un[$i] = trim(substr($un[$i], 5));
    }
    return $un;
}
