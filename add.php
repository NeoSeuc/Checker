<?php

require_once('db.php');

$db = Db::getConnection();

if (empty($_GET['name'])) {

} else {
    $res = $db->query("INSERT INTO sites (name) VALUES ('{$_GET['name']}')");
    header("Location: http://checker.local/"); /* Redirect browser */
    exit();
}