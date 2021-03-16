<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: application/json');

    include('connection.php');

    try {
        $data = json_decode(file_get_contents('php://input'), true);
      
        $keys = [];
        print_r($data);
        foreach ($data as $key => $value) {
            array_push($keys, $key);
        }
     
        $stmtSelectMeasurings = $dbh->prepare("SELECT * FROM measuring.measurings");

        $stmtInsertMeasurings = $dbh->prepare(
            "insert into measuring.measurings 
                (id_valve, id_department, id_worker, droppers_volume, droppers_EC, droppers_pH, drainages_volume, drainages_EC, drainages_pH, mates_EC, mates_pH, measure_date_time) 
            values 
                (:id_valve, :id_department, :id_worker, :droppers_volume, :droppers_EC, :droppers_pH, :drainages_volume, :drainages_EC, :drainages_pH, :mates_EC, :mates_pH, CURTIME())"
            );

        for ($i=0; $i < sizeof($keys)-1; $i++) {
            $id_valve = intval($keys[$i]);
            $id_department = $data["depart"];
            $id_worker = $data["user"];

            $droppers_volume = $data[$id_valve][0];
            $droppers_EC = $data[$id_valve][1];
            $droppers_pH = $data[$id_valve][2];

            $drainages_volume = $data[$id_valve][3];
            $drainages_EC = $data[$id_valve][4];
            $drainages_pH = $data[$id_valve][5];
            
            $mates_EC = $data[$id_valve][6];
            $mates_pH = $data[$id_valve][7];
            
            $stmtInsertMeasurings->execute(
                array(
                    ':id_valve' => $id_valve,
                    ':id_department' => $id_department,
                    ':id_worker' => $id_worker,
        
                    ':droppers_volume' => $droppers_volume,
                    ':droppers_EC' => $droppers_EC,
                    ':droppers_pH' => $droppers_pH,
        
                    ':drainages_volume' => $drainages_volume,
                    ':drainages_EC' => $drainages_EC,
                    ':drainages_pH' => $drainages_pH,
                    
                    ':mates_EC' => $mates_EC,
                    ':mates_pH' => $mates_pH
                )
            );
            $stmtInsertMeasurings->closeCursor();
            
        }
        $dbh = null;   
        echo 'ok'; 
    } catch (PDOException $e) {
        echo 'false';
        die();
    }
?>