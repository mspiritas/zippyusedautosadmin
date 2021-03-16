<?php
function get_vehicles_by_make(){
        global $db;
        $query = 'SELECT Make FROM makes
                  ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

// Gets category name
function get_vehicle_make($make_id) {
    if (!$maek_id) {
        return "All Vehicles";
    }
    global $db;
    $query = 'SELECT * FROM makes
                WHERE ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    return $make;
}