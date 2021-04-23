<?php
    require_once('template/header.php');
    require_once('template/footer.php');
    require_once('characterCRD.php');

    $reader = new CharacterCRD();

    $results = $reader->readAll();

    foreach($results as $character) {
        echo "$character->name<hr>";
    }
?>