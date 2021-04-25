<?php
    require_once('template/header.php');
    require_once('controller/characterCRD.php');
    require_once('model/Feat.php');

    $reader = new CharacterCRD();

    if (isset($_GET['character'])) {
        $reader->create($_GET['character']);
    }

    $results = $reader->readAll();
?>
    <form name='oldCharacter' action='#' method='POST'>
    <select name='dropdown'>
<?php
    foreach($results as $character) {
        echo "<option>$character->name</option>";
    }
?>
    </select>
        <input type='submit' value='View'/>
    </form>
<?php
    $feat = new Feat();
    $feat->feat_name = "Power Attack";
    $feat->feat_url = "https://2e.aonprd.com/Feats.aspx?ID=359";

    echo $feat;
    
    require_once('template/footer.php');


?>