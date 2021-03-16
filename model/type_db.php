<?php
function get_vehicles_by_type(){
        global $db;
        $query = 'SELECT DISTINCT Type FROM types
                  ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetch();
        $statement->closeCursor();
        return $types;
    }