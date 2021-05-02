<?php
    require_once('template/header.php');
    require_once('characterDAO.php');
    if (isset($_POST['create'])) {
        $character_id = $character_dao->create($_POST['characterName']);

        $message = "<p>" . $_POST['characterName'] . " was created with id $character_id</p>";
       
    } else if (isset($_POST['delete'])) {

        $rows_affected = $character_dao->delete($_POST['dropdown']);

        $message = "<p>Characters deleted: $rows_affected</p>";
    }

    $characters = $character_dao->readAll();
?>
    <h2>Select a Character</h2>
    <form name='oldCharacter' class='form col-4'>
        <select name='dropdown' class='form-select'>
    <?php
            foreach($characters as $character) {
                
                echo "<option value=$character->id>$character->name</option>";
            }
    ?>
        </select>
        <div class="my-3">
            <button type='submit' formaction='selectCharacter.php' name='choose' formmethod='GET' class='btn btn-primary me-3'>View</button>
            <button type='submit' name='delete' formmethod='POST' class='btn btn-danger'>Delete</button>
        </div>
    </form>
    <hr>
    <h2>Create a new character</h2>
    <form name='newCharacter' method='POST' class="form col-4 my-2">
        <label for='characterName' class='form-label'>New Character Name</label>
        <input type='text' name='characterName' id='characterName' class='form-control' required>
        <button type='submit' name='create' class='btn btn-primary my-3'>Create Character</button>
    </form>
<?php

    if (isset($message)) {
        echo $message;
    }
    require_once('template/footer.php');


?>