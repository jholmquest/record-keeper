<?php
    require_once('sessionRequired.php');
    require_once('controller/FeatCRUD.php');
    require_once('template/header.php');
    require_once('featDAO.php');

    echo "<h2>Feats for " . $_SESSION['character'] . "</h2>";

    $feats = $feat_dao->readAll($_SESSION['id']);

    echo "<table>";

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
    <form id='featDeleter' method='POST' action='deleteFeat.php'></form>
    <hr>
    <h3>Add a new feat</h3>
    <form name='featCreator' action='createFeat.php' method='POST'>
        <label for='featName'>Feat Name</label>
        <input type='text' id='featName' name='featName' required>

        <label for='featLink'>URL</label>
        <input type='text' id='featLink' name='featLink' required>

        <button type='submit' name='addFeat'>Add Feat</button>
    </form>
    <hr>
<?php


    echo "<a href='.'>return</a>";
    require_once('template/footer.php');
?>