<?php
    require_once('template/header.php');
    require_once('characterCRD.php');
    require_once('model/Feat.php');

    $reader = new CharacterCRD();

    $results = $reader->readAll();

    echo "<select name='character'>";
    foreach($results as $character) {
        echo $character;
    }
    echo "</select>";

    $feat = new Feat();
    $feat->feat_name = "Power Attack";
    $feat->feat_url = "https://2e.aonprd.com/Feats.aspx?ID=359";

    echo $feat;
    
    require_once('template/footer.php');
?>