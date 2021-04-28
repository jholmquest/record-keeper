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

    foreach($feats as $feat) {

        echo "<tr><td>$feat</td>";
        echo "<td><a href='#'>edit</a></td>";
        echo "<td><a href='#'>delete</a><td></tr>";
    }

    echo "</table>";
?>
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