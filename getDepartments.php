<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    include('connection.php');

    $departmentInfo = [];
    $depIdArray = [];
    $depValuesArray = []; 

    $selectDepartmentsQuery = 'SELECT * from departments';
    foreach ($dbh->query($selectDepartmentsQuery) as $row) {
        $departmentInfo[$row['id_department']] = $row['name_department'];
        // array_push($depIdArray, $row['id_department']);
        // array_push($depValuesArray, $row['name_department']);

        // echo $row['id_department'] . "\t" . $row['name_department'] . " ";
    };

    echo json_encode($departmentInfo);
?>