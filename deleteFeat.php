<?php
    session_start();
    if (isset($_POST['deleteFeat'])) {

        require_once('featDAO.php');
        require_once('template/header.php');

        $rows_affected = $feat_dao->delete($_POST['deleteFeat'], $_SESSION['id']);

        echo "rows deleted: $rows_affected <br>";
        echo "<a href='character.php'>view character</a>";

        require_once('template/footer.php');
    } else {

        header('Location: character.php?id');
        exit;
    }
?>