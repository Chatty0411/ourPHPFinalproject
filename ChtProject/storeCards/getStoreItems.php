<?php
    header('Access-Control-Allow-Origin: *');
    $mysqli = new mysqli('localhost', 'root', '', 'finalproject', 3306);
    $mysqli->set_charset('utf8');

    spl_autoload_register(function($className) {
        require_once $className . '.php';
    });
    // // session_start();
    // $input = file_get_contents("php://input");
    // $output = json_decode($input);
    // $sqlid = $output->data->id;


    // 接收參數
    // $id = $_POST['restaurantId'];
    if($_GET){

        $sqlid = $_GET['restaurantId'];
        $sql = "SELECT * FROM menu WHERE restaurantId = '{$sqlid}'";
        // $sql = "SELECT * FROM menu WHERE restaurantId = '{$sqlid}'";
        // $sql = "SELECT * FROM menu WHERE restaurantId = 7008";
    
        $result=$mysqli->query($sql);
        // $data = $result->fetch_object();
        
        // // var_dump($result);
        // // var_dump($data);
        $dataarray = array();
    
        while ($menu = $result->fetch_object()){
            $dataarray[] = $menu;
        //     echo "{$menu->menuItemId}<br />";
        //     echo "{$menu->restaurantId}<br />";
        //     echo "{$menu->dish}<br />";
        //     echo "{$menu->type}<br />";
        //     echo "{$menu->introduce}<br />";
        //     echo "{$menu->picture}<br />";
        //     echo "{$menu->cost}<br />";
        //     echo "<hr />";
        }
        $finaldata = json_encode($dataarray);
        echo ($finaldata);
        // header("Location: http://localhost:3000/shopList2");
    }else{
        echo "No Get Request";
    }
