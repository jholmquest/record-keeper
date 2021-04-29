<?php
    require_once('characterDAO.php');

    if (isset($_POST['delete'])) {
        
        require_once('template/header.php');

        $rows_affected = $character_dao->delete($_POST['dropdown']);

        echo "Characters deleted: $rows_affected <br>";
        echo "<a href='.'>return</a>";

        require_once('template/footer.php');

    } else {

        header('Location: .');  
        exit;
    }

?>