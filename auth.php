<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Content-Type: application/json');

    include('connection.php');

    try {
        $data = json_decode(file_get_contents('php://input'), true);

        $login = $data['login'];
        $pass = $data['pass'];
        // $login = 'user_1';
        // $pass = '1234';

        $stmtSelectWorker = $dbh->prepare("SELECT * FROM measuring.workers where login_worker = :login and password_worker = :pass");

        $stmtSelectWorker->execute(
            array(
                ':login'=> $login,
                ':pass'=> $pass, 
            )
        );
        // print_r($stmtSelectWorker);
        $result = $stmtSelectWorker->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            print_r(json_encode($result));
        }
        else {
            // http_response_code(400);

            throw new Exception();
        }



    } catch (Exception $e) {
        echo 'no';
        die();
    }
?>