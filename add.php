<?php

require_once('db.php');

$db = Db::getConnection();

if (empty($_GET['name'])) {

} else {
    $res = $db->query("INSERT INTO sites (name, token, BotName) 
    VALUES ('{$_GET['name']}', '{$_GET['token']}', '{$_GET['botname']}')");
    header("Location: http://checker.local/"); /* Redirect browser */
    exit();
}