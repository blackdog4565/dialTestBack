<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: application/json');

    include('connection.php');
    try {

        
        $data = json_decode(file_get_contents('php://input'), true);

        $dep = $data['idDep'];
        $valve = $data['idVal'];

        // $dep = '1';
        // $valve = '1';

        // echo $dep, $valve;

        $stmtCreateReport = $dbh->prepare("
            SELECT 
                id_valve, name_department, droppers_volume, droppers_EC, droppers_pH, drainages_volume, drainages_EC, drainages_pH, 
                mates_EC, mates_pH, name_worker, surname_worker, measure_date_time 
            FROM measurings 
                JOIN departments ON departments.id_department = measurings.id_department 
                JOIN workers ON workers.id_worker = measurings.id_worker 
            WHERE measurings.id_department = :dep AND measurings.id_valve = :valve;
        ");

        $stmtCreateReport->execute(
            array(
                ':dep'=> $dep,
                ':valve'=> $valve, 
            )
        );

        $result = $stmtCreateReport->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            print_r(json_encode($result));
        }
        else {
            // http_response_code(400);

            throw new Exception();
        }
    }
    catch (Exception $e) {
        echo 'no';
        die();
    }
?>