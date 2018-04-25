<?php

require_once('db.php');
$id = $_GET['id'];
$db = Db::getConnection();

$db->query("DELETE FROM sites WHERE id={$id}");
header("Location: http://checker.local/"); /* Redirect browser */
exit();