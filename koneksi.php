<?php
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Credentials: true');
// header('Access-Control-Allow-Methods: PUT, GET, HEAD, POST, DELETE, OPTIONS');
// header('Access-Control-Allow-Headers: X-Requested-With');
// header('Content-Type: application/json; charset=utf-8');
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Origin: http://localhost:8100");
header("Access-Control-Allow-Methods: PUT, GET, HEAD, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");
$koneksi = mysqli_connect('localhost', 'root', '', 'responsi2') or die("koneksi gagal");
