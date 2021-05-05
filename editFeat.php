<?php
    require_once('sessionRequired.php');
    // need to grab values to display the form
    if (isset($_GET['editFeat'])) {
        require_once('featDAO.php');
        require_once('template/header.php');

        $feat = $feat_dao->readById($_GET['editFeat'], $_SESSION['id']);

        if (empty($feat)) {
            echo "<h2 class='text-danger'>invalid feat id</h2>";
            echo "<a href='character.php'>Return to character</a>";
        } else {
?>
        <form action='character.php' method='POST' class='form'> 
        <div class="row">
            <div class="col-12 col-sm-3 mb-2">
                <label for='featName' class="form-label">Feat Name</label>
                <input type='text' id='featName' name='featName' class='form-control' value='<?php echo $feat->feat_name; ?>' required>

            </div>
            <div class="col-12 col-sm-4 mb-2">
                <label for='featLink' class="form-label">URL</label>
                <input type='text' id='featLink' name='featLink' class='form-control' value='<?php echo $feat->feat_url; ?>'required>
            </div>
        </div>
            <input type='hidden' name='featID' value='<?php echo $feat->id; ?>'>
            <button type='submit' name='updateFeat' class="btn btn-primary">Update</button>
        </form>
<?php
        }

        require_once('template/footer.php');
    } else {
        header('Location: character.php');
        exit;
    }
?>