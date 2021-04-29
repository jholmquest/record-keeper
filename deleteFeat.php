<?php
    session_start();

    if (isset($_POST['deleteFeat'])) {

        require_once('featDAO.php');

        $feat_dao->delete($_POST['deleteFeat'], $_SESSION['id']);
    }
    header('Location: character.php?id');
    exit;
?>