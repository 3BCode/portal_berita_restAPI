<?php
require "../config/connect.php";

$userid = $_GET['userid'];
$response = array();
$sql = mysqli_query($con, "SELECT * FROM user WHERE id= '$userid'");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['nama'] = $a['nama'];
 $b['email'] = $a['email'];
 $b['noHp'] = $a['noHp'];
 $b['password'] = $a['password'];
 $b['passwordHid'] = $a['passwordHid'];
 $b['gambar'] = $a['gambar'];
 $b['level'] = $a['level'];

 array_push($response, $b);
}

echo json_encode($response);
