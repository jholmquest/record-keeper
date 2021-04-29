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

        function create($feat_name, $feat_link, $character_id) {
            $db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);
            
            // Insert a new record
            $sql = "INSERT INTO character_feats(`feat_name`, `feat_url`, `character_id`) VALUES(:feat_name, :feat_link, :character_id)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {

                $query = $db->prepare($sql);
                $query->bindParam(':feat_name', $feat_name);
                $query->bindParam(':feat_link', $feat_link);
                $query->bindParam(':character_id', $character_id);
                $query->execute();

            } catch (Exception $ex) {

                echo "{$ex->getMessage()}<br/>";
            }
            
            return $db->lastInsertId();
        }

        public function delete($id, $character_id) {

            $db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);

            $sql = "DELETE FROM character_feats WHERE id=:id AND character_id=:character_id";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try
            {
                $query = $db->prepare($sql);
                $query->bindParam(':id', $id);
                $query->bindParam(':character_id', $character_id);
                $query->execute();
                $rows_affected = $query->rowCount();
            }
            catch (Exception $ex)
            {
                echo "{$ex->getMessage()}<br/>";
            }
            
            return  $rows_affected;
        }

    }
?>