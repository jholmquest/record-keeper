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
                
                echo "<option value=$character->id>$character->name</option>";
            }
    ?>
        </select>
        <button type='submit'>View</button>
        <button type='submit' formaction='#'>Delete</button>
    </form>
<?php
    $feat = new Feat();
    $feat->feat_name = "Power Attack";
    $feat->feat_url = "https://2e.aonprd.com/Feats.aspx?ID=359";

    echo $feat;

    echo $reader->readById(1);
    
    require_once('template/footer.php');


?>