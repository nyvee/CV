<?php
$host = 'localhost';
$db = 'CV';
$user = 'root';
$pass = '';

$conn = mysqli_connect($host, $user, $pass, $db); // true | false

if (!$conn) {
  die('Gagal terhubung ke database'. mysqli_connect_error());
}