<?php
    session_start();

    // forces user to home page if there is no session
    if (!isset($_SESSION['id'])) {
        header('Location: .');
        exit;
    }

    require_once('template/header.php');


    echo $_SESSION['id'];
    echo "<br>";
    echo "<h2>Feats for " . $_SESSION['character'] . "</h2>";

    echo "<a href='.'>return</a>";
    require_once('template/footer.php');
?>