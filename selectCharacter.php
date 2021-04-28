<?php
    session_start();
    
    if (isset($_GET['choose'])) {
        
        $_SESSION['id'] = $_GET['dropdown'];
        require_once('controller/CharacterCRD.php');

        $characterReader = new CharacterCRD();
        $_SESSION['character'] = $characterReader->readById($_GET['dropdown'])->name;

        header('Location: character.php');
        exit;
    } else {

        header('Location: .');
        exit;
    }
?>