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

    } else if (isset($_POST['updateFeat'])) {

        $rows_affected = $feat_dao->update($_POST['featID'], $_POST['featName'], 
                $_POST['featLink'], $_SESSION['id']);

        $message = "<p>$rows_affected feat(s) modified</p>";                
    }

    echo "<div class='row'><div class='col-12 col-lg-4'><h2>Feats for " . $_SESSION['character'] . "</h3>";

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

            <td>
                <button type='submit' name='editFeat' form='featEditor' class='btn btn-success' value=<?php echo $feat->id;?>>
                        edit
                </button>
            </td>
            <td><button type='submit' name='deleteFeat' form='featDeleter' class='btn btn-danger'
                    value=<?php echo $feat->id;?>>delete</button></td>
        </tr>  
<?php
    }
?>
        </table>
        </div>
    
    <!--gives a form for each row to reference without having to generate a form for each value-->
        <div class='col-12 col-lg-4'>
            <h2>Add a new feat</h2>
            <form name='featCreator' method='POST' class='form'>
                <div class='row'>
                    <div class='col-12 col-sm-8 mb-3'>
                        <label for='featName' class='form-label'>Feat Name</label>
                        <input type='text' id='featName' name='featName' class='form-control' required>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-12 mb-3'>
                        <label for='featLink' class='form-label'>URL</label>
                        <input type='text' id='featLink' name='featLink' class='form-control' required>
                    </div>
                </div>

                <button type='submit' name='addFeat' class='btn btn-primary'>Add Feat</button>
            </form>
        </div>
        <div class='col-12 col-lg-4 text-end'>
            <a href='.'>return</a>
<?php

    if (isset($message)) {
        echo $message;
    }
    ?>
    
        
    </div>
    <form id='featEditor' method='GET' action='editFeat.php'></form>
    <form id='featDeleter' method='POST'></form>
    <?php
    require_once('template/footer.php');
?>