<?php
    require_once('sessionRequired.php');

    if (isset($_POST['addFeat'])) {
        require_once('featDao.php');

        $feat_dao->create($_POST['featName'], $_POST['featLink'], $_SESSION['id']);
    }
    header('Location: character.php');
    exit;
?>