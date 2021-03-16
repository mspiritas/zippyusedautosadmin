<?php

    // Sort by price
    function get_vehicles_by_price(){
        global $db;
        $query = 'SELECT V.price, V.year, V.model, C.Class, M.Make, T.Type
                  FROM vehicles V
                  LEFT JOIN classes C
                  ON V.class_id = C.ID
                  LEFT JOIN makes M
                  ON V.make_id = M.ID
                  LEFT JOIN types T
                  ON V.type_id = T.ID
                  ORDER BY price DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles_by_price = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles_by_price;
    }


    // Sort by year
    function get_vehicles_by_year(){
        global $db;
        $query = 'SELECT V.price, M.Make, V.model, V.year, T.Type, C.Class
                  FROM vehicles V
                  LEFT JOIN classes C
                  ON V.class_id = C.ID
                  LEFT JOIN makes M
                  ON V.make_id = M.ID
                  LEFT JOIN types T
                  ON V.type_id = T.ID    
                  ORDER BY year DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles_by_year = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles_by_year;
    } 