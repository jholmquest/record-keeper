<?php

    session_start();
    require_once('featDAO.php');
    
    if (isset($_GET['editFeat'])) {

        require_once('template/header.php');
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
        
        
        require_once('template/footer.php');
    } else {
        header('Location: character.php?edit=false');
        exit;
    }
?>