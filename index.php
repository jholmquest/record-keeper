<?php
    require_once('template/header.php');
    require_once('controller/characterCRD.php');
    require_once('model/Feat.php');

    $reader = new CharacterCRD();

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
        <button type='submit' formaction='deleteCharacter.php' name='delete'>Delete</button>
    </form>
    <hr>
    <form name='newCharacter' method='POST' action='createCharacter.php'>
        <input type='text' name='characterName'>
        <button type='submit' name='create'>Create Character</button>
    </form>
<?php
    
    require_once('template/footer.php');


?>