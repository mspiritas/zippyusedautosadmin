<?php
function get_vehicles_by_class($vehicle_id){
    if(!$vehicle_id) {
        return "All Vehicles";
    }
        global $db;
        $query = 'SELECT DISTINCT Class FROM classes
                  WHERE vehicleID = :vehicle_id
                  ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $classes = $statement->fetch();
        $statement->closeCursor();
        return $classes;
    }
