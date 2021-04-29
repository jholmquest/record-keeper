<?php

    session_start();
    require_once('featDAO.php');
    require_once('template/header.php');

    // first time get to page with a get to grab values for form
    if (isset($_GET['editFeat'])) {

        
        $feat = $feat_dao->readById($_GET['editFeat']);
?>
        <form action='editFeat.php' method='POST'> 
        <label for='featName'>Feat Name</label>
        <input type='text' id='featName' name='featName' value='<?php echo $feat->feat_name; ?>' required>

        <label for='featLink'>URL</label>
        <input type='text' id='featLink' name='featLink' value='<?php echo $feat->feat_url; ?>'required>

        <input type='hidden' name='featID' value='<?php echo $feat->id; ?>'>
        <button type='submit' name='updateFeat'>Update</button>
        </form>
<?php
  
    // get to the page a second time with a post from before to actually change to the record
    } else if (isset($_POST['updateFeat'])) {

        $rows_affected = $feat_dao->update($_POST['featID'], $_POST['featName'], $_POST['featLink']);

        echo "Rows updated: $rows_affected";
        echo "<br><a href='character.php'>view character</a>";

    // if someone gets to the page some other way
    } else {
        header('Location: character.php');
        exit;
    }
    require_once('template/footer.php');
?>