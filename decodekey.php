<?php
use Firebase\JWT\JWT;

require_once 'vendor/autoload.php';
$key = "salamaleykum";
$mykey='eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9kZXZlZHVjYXRpb24uY29tIiwiYXVkIjoiYmFrdS5kZXZlZHVjYXRpb24uY29tIiwiaWF0IjoxNjI5MTg1MTEyLCJuYmYiOjE2MjkxODUxMTIsInVzZXJuYW1lIjoiRWxtYXIiLCJwYXNzd29yZCI6IjEyMzQ1NiIsInJvbGUiOiJBZG1pbiJ9.m8wg_dOyiSv-bLrg1h9JqUBE945QMZBnb6LHo7TkgRk';

if ($_SERVER['REQUEST_METHOD']=='POST'){

    preg_match('/Bearer\s((.*)\.(.*)\.(.*))/', $_SERVER['HTTP_AUTHORIZATION'], $matches);
    if ($mykey!==$matches[1]) {
        echo $_SERVER['HTTP_AUTHORIZATION'];
        // /Bearer\s((.*)\.(.*)\.(.*))/
        //
//    header('HTTP/1.0 400 Bad Request');
        print_r ('Token not found in request ');
        exit;
    }else{
        $mydecodedkey=JWT::decode($mykey, $key, array('HS256'));
        $mydecode=(array) $mydecodedkey;

        echo 'Welcome '.$mydecode['username'].', your role is '.$mydecode['role'];
        $dt=new DateTime();
        if($mydecode['exp']<=$dt->setTimestamp()){
            echo 'Your key expired';
        };

    }
}else{

    echo "Welcome just to homepage";
}


