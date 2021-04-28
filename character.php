<?php
    session_start();
    // forces user to home page if there is no session
    if (!isset($_SESSION['id'])) {
        header('Location: .');
        exit;
    }
    
    require_once('template/header.php');
    require_once('controller/FeatCRUD.php');

    echo "<h2>Feats for " . $_SESSION['character'] . "</h2>";

    $feat_reader = new FeatCRUD();
    $feats = $feat_reader->readAll($_SESSION['id']);

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

            <td><button type='submit' name='editFeat' form='editFeat' 
                    value=<?php echo $feat->id;?>>edit</button></td>
            <td><button type='submit' name='deleteFeat' form='deleteFeat' 
                    value=<?php echo $feat->id;?>>delete</button></td>
        </tr>  
<?php
    }
?>
    </table>
    <!--gives a form for each row to reference without having to generate a form for each value-->
    <form id='editFeat' method='POST' action='.?edit=used'></form>
    <form id='deleteFeat' method='POST' action='.?delete=used'></form>
    <hr>
    <h3>Add a new feat</h3>
    <form name='featCreator' action='#' method='POST'>
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