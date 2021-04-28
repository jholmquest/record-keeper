<?php
    session_start();
    // forces user to home page if there is no session
    if (!isset($_SESSION['id'])) {
        header('Location: .');
        exit;
    }
    
    require_once('template/header.php');
    require_once('controller/FeatCRUD.php');

    echo "<h2>Feats for " . $_SESSION['character'] . "</h2>";

    $feat_reader = new FeatCRUD();
    $feats = $feat_reader->readAll($_SESSION['id']);

    foreach($feats as $feat) {
        echo $feat;
    }

    echo "<a href='.'>return</a>";
    require_once('template/footer.php');
?>