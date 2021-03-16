<?php
function get_vehicles_by_class(){
        global $db;
        $query = 'SELECT Class FROM classes
                  ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }