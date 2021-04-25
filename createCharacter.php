<?php
    require_once('controller/CharacterCRD.php');

    if (isset($_POST['create'])) {
        
        $createClass = new CharacterCRD();

        $createClass->create($_POST['characterName']);
    }

    header('Location: .');

    exit;
?>