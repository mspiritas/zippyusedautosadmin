<?php
function get_vehicles_by_type(){
        global $db;
        $query = 'SELECT Type FROM types
                  ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }