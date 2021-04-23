<?php
    require_once('template/header.php');
    require_once('template/footer.php');
    require_once('resources/properties.php');
    require_once('Character.php');

$db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);
            
// Read all records
$sql = "SELECT * FROM game_character";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try
{
    $query = $db->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_CLASS, 'Character');
}
catch (Exception $ex)
{
    echo "{$ex->getMessage()}<br/>";
}

foreach($results as $character)
{
    echo $character;
}
?>