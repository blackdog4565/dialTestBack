<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');

    include('connection.php');
    // include('getDepartments.php');
    // $selectDepartmentsQuery = 'SELECT * from departments';
    // foreach ($dbh->query($selectDepartmentsQuery) as $row) {
    //     print $row['id_department'] . "\t";
    //     echo $row['name_department'] . "\n";
    // };

    // print_r($departmets);
    // try {
    //     $data = json_decode(file_get_contents('php://input'), true);
    //     // echo json_encode($data["user"]);
    
    //     $user = str_replace('"', '', $data["user"]);
    //     $pass = str_replace('"', '', $data["pass"]);
    
    //     // echo $user, $pass;

    //     $dbh = new PDO('mysql:host=localhost;dbname=measuring', $user, $pass);
    //     $dbh->query('SELECT * from departments');
    //         // print_r(json_encode($row));
    //     echo 'ok';
        
    //     $dbh = null;
    // } catch (PDOException $e) {
    //     echo 'false';
    //     // print "Error!: " . $e->getMessage() . "<br/>";
    //     die();
    // }
