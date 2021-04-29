<?php
    require_once('controller/CharacterCRD.php');

    if (isset($_POST['delete'])) {
        
        $deleteClass = new CharacterCRD();

        $deleteClass->delete($_POST['dropdown']);
    } else {

        header('Location: .');
    }

    exit;
?>