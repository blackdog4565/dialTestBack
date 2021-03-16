<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    include('connection.php');

    $selectDepartmentsQuery = 'SELECT * from valves';
    foreach ($dbh->query($selectDepartmentsQuery) as $row) {
        // print $row['id_department'] . "\t";
        echo $row['id_valve'] . " ";
    };
?>