<?php
function connectToDatabase():PDO
{
$db = new PDO(
    'mysql:host=DB;dbname=houseplant',
    'root',
    'password');

$db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

return $db;
}
?>


