<?php
    if (isset($_POST['create'])) {
        require_once('characterDao.php');

        $character_dao->create($_POST['characterName']);
    }
    header('Location: .');
    exit;
?>