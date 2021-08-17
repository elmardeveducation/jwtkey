<?php

use Firebase\JWT\JWT;

require_once 'vendor/autoload.php';

//данные которые пришли из пост запроса
$user="Elmar";
$password="123456";
$role="Admin";
//данные которые пришли из пост запроса



//проверяю с базой данных, если юзер ОК, то генерируем ему ключ

//.....
//проверяю с базой данных, если юзер ОК, то генерируем ему ключ



//1) юзер присылает нам логин и пароль в ответ мы ему гененрируем ключ и отправляем ему
$dt=new DateTime();
$key = "salamaleykum";
$payload = array(
    "iss" => "http://deveducation.com",
    "aud" => "baku.deveducation.com",
    "iat" => $dt->getTimestamp(),
    "nbf" => $dt->getTimestamp(),

    "username" => $user,
    "password" => $password,
    "role" => $role
);
$jwt = JWT::encode($payload, $key);
//записываем в базу для данного пользователя
// ,,,,
//записываем в базу для данного пользователя
echo $jwt;
