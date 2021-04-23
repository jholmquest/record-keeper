<?php
    require_once('template/header.php');
    require_once('template/footer.php');
    require_once('characterCRD.php');

    $reader = new CharacterCRD();

    $reader->readAll();
?>