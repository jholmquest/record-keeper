<?php
    require_once('template/header.php');
    require_once('template/footer.php');
    require_once('characterCRD.php');

    $reader = new CharacterCRD();

    $results = $reader->readAll();

    echo "<select name='character'>";
    foreach($results as $character) {
        echo "<option>$character->name</option>";
    }
    echo "</select>";
?>