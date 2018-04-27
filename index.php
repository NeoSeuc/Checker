<!-- Site created by Vitaliy Bagrinets
 Facebook: https://www.facebook.com/vitaliy.bagrinets
 -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>SiteChecker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('Testing.php');
require_once('db.php');
$db = Db::getConnection();
$stmt = $db->query('SELECT * FROM sites');
echo "<table class='tb_sites'>";
echo "<th>id</th>";
echo "<th>сайт</th>";
echo "<th>токен(id bota)</th>";
echo "<th>состояние сайта</th>";
echo "<th>изменить</th>";
while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . "<a target='_blank' href='{$row['name']}'> {$row['name']}</a>" . "</td>";
    echo "<td>{$row['token']}<br>
            <bn><a target='_blank' href='https://web.telegram.org/#/im?p=@{$row['BotName']}'>{$row['BotName']}</a></bn>
            </td>";
    echo "<td>";
    if (Testing::testSite($row['name']))
        echo "<t class='work'>Работает</t>";
    else
        echo "<t class='d_work'>Не работает</t>";
    echo "</td>";
    echo "<td> <a href='delete.php?id={$row['id']}'> удалить </a> </td>";
    echo '</tr>';
}
echo '</table>';
?>
<form class="add_site" action="add.php" method="get">
    <input type="text" name="name" placeholder="url сайта">
    <input type="text" name="token" placeholder="token">
    <input type="text" name="botname" placeholder="bot name">
    <input type="submit" value="Добавить!">
</form>
</body>
</html>
