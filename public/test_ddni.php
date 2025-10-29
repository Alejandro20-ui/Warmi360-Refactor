<?php
require_once __DIR__ . '/../app/Helpers/ApiPeru.php';
use App\Helpers\ApiPeru;

$dni = '73880090'; // cambia por uno que uses
$api = new ApiPeru();
$res = $api->consultarDNI($dni);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($res, JSON_PRETTY_PRINT);
