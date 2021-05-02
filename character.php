<?php
    require_once('sessionRequired.php');
    require_once('controller/FeatCRUD.php');
    require_once('template/header.php');
    require_once('featDAO.php');

    if (isset($_POST['addFeat'])) {

        $feat_id = $feat_dao->create($_POST['featName'], $_POST['featLink'], $_SESSION['id']);

        $message = "<p>Feat named '" . $_POST['featName'] . "' added with id $feat_id</p>";

    } else if (isset($_POST['deleteFeat'])) {

        $rows_affected = $feat_dao->delete($_POST['deleteFeat'], $_SESSION['id']);

        $message = "<p>$rows_affected feat(s) deleted</p>";
    }

    echo "<h2>Feats for " . $_SESSION['character'] . "</h2>";

    $feats = $feat_dao->readAll($_SESSION['id']);

    echo "<table class='table'>";

    /* 
    * display each feat, use the fancy form attribute added in html5
    * was unsure initially the best way to handle this
    * got idea from here https://stackoverflow.com/questions/5967564/form-inside-a-table
    */
    foreach($feats as $feat) {
?>
        <tr>
            <td><?php echo $feat;?></td>

            <td><button type='submit' name='editFeat' form='featEditor' 
                    value=<?php echo $feat->id;?>>edit</button></td>
            <td><button type='submit' name='deleteFeat' form='featDeleter' 
                    value=<?php echo $feat->id;?>>delete</button></td>
        </tr>  
<?php
    }
?>
    </table>
    <!--gives a form for each row to reference without having to generate a form for each value-->
    <form id='featEditor' method='GET' action='editFeat.php'></form>
    <form id='featDeleter' method='POST'></form>
    <hr>
    <h3>Add a new feat</h3>
    <form name='featCreator' method='POST' class='form'>
        <label for='featName'>Feat Name</label>
        <input type='text' id='featName' name='featName' required>

        <label for='featLink'>URL</label>
        <input type='text' id='featLink' name='featLink' required>

        <button type='submit' name='addFeat'>Add Feat</button>
    </form>
    <hr>
<?php

    if (isset($message)) {
        echo $message;
    }
    echo "<a href='.'>return</a>";
    require_once('template/footer.php');
?>