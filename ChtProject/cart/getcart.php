<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
    $mysqli = new mysqli('localhost', 'root', '', 'finalproject', 3306);
    $mysqli->set_charset('utf8');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });

    $input = file_get_contents("php://input");
    $output = json_decode($input);
    $sqlId = $output->menuItemId;

    // var_dump($_GET);

    $sql = "SELECT * FROM carts WHERE menuItemId = $sqlId ";

    $result = $mysqli->query($sql);
    // $data = $result->fetch_object();

    $dataArray = array();

    while ($carts = $result->fetch_object()){
        $dataArray[] = $carts;
        echo json_encode($carts);
    }




    // $finalData = json_encode($dataArray);
    // echo $finalData;

?>