<?php
    require_once('resources/properties.php');
    require_once('model/Feat.php');

    class FeatCRUD {

        function readAll($character_id) {

            $db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);
            
            // Read all records
            $sql = "SELECT * FROM character_feats where character_id=:id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {

                $query = $db->prepare($sql);
                $query->bindParam(':id', $character_id);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'Feat');
            } catch (Exception $ex) {

                echo "{$ex->getMessage()}<br/>";
            }
            
            return $results;
        }

    }
?>