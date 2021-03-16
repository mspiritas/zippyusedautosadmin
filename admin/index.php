<?php
    require('../model/database.php');
    require('../model/class_db.php');
    require('../model/make_db.php');
    require('../model/type_db.php');
    require('../model/vehicle_db.php');

    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $make = filter_input(INPUT_POST, 'Make', FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST, 'Type', FILTER_SANITIZE_STRING);
    $class = filter_input(INPUT_POST, 'Class', FILTER_SANITIZE_STRING);

    $action = filter_input(INPUT_POST, 'action');
        if ($action) {
            $action = filter_input(INPUT_GET, 'action');
            if (!$action) {
                $action = 'list_vehicles';
            }
        }    

    // Returns all vehicles
    function get_vehicles() {
        global $db;
        $query = 'SELECT * FROM vehicles
                  ORDER BY vehicleID';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    // Deletes vehicle from database
    function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicles
                  WHERE vehicleID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    // Adds vehicle to database
    function add_vehicle($vehicle_id) {
        global $db;
        $query = 'INSERT INTO vehicles (year, model, price, type_id, class_id, make_id)
                  VALUES (:year, :model, :price, :type_id, :class_id, :make_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $vehicle_name);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    // Add make
    function add_make($vehicle_id) {
        global $db;
        $query = 'INSERT INTO makes(Make)
                  VALUES (:make';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    // Add type
    function add_type($vehicle_id) {
        global $db;
        $query = 'INSERT INTO types(Type)
                    VALUES (:type';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }

    // Add class
    function add_class($vehicle_id) {
        global $db;
        $query = 'INSERT INTO classs(Class)
                  VALUES (:class';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }
    
    switch($action) {
        case "add_vehicle":
            add_vehicle($vehicle_id);
            header("Location: .?vehicle_id=$vehicle_id");
            break;

        case "add_make":
            add_make($vehicle_id);
            header("Location: .?action=list_vehicles");
            break;

        case "add_type":
            add_type($vehicle_id);
            header("Location: .?action=list_vehicles");
            break;

        case "add_class":
            add_class($vehicle_id);
            header("Location: .?action=list_vehicles");
            break;
            
        case "delete_vehicle":
            if ($vehicle_id) {
                delete_vehicle($vehicle_id);
                header("Location: .?vehicle_id=$vehicle_id");
            } else {
                $error = "Missing vehicle ID.";
                include('view/error.php');
            }
            break;
        
        default:
            $vehicles_by_price = get_vehicles_by_price($vehicle_id);
            $vehicles = get_vehicles_by_price();
            include('view/vehicle_list.php');
    }
