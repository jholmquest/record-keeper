<?php
    require_once('resources/properties.php');
    require_once('model/Character.php');

    class CharacterCRD {

        function readAll() {

            $db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);
            
            // Read all records
            $sql = "SELECT * FROM game_character";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {

                $query = $db->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_CLASS, 'Character');
            } catch (Exception $ex) {
                
                echo "{$ex->getMessage()}<br/>";
            }
            
            return $results;
        }

        public function create($name) {
            
            $db = new PDO(DB_SCHEMA, DB_USER, DB_PASS);
            
            // Insert a new record
            $sql = "INSERT INTO game_character(`name`) VALUES(:name)";
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            try {

                $query = $db->prepare($sql);
                $query->bindParam(':name', $name);
                $query->execute();

            } catch (Exception $ex) {

                echo "{$ex->getMessage()}<br/>";
            }
            
            return $db->lastInsertId(); // Returns the primary key of this INSERT
        }
    }
?>