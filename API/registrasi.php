<?php

require "../config/connect.php";
$response = array();
$nama = $_POST['nama'];
$email = $_POST['email'];
$noHp = $_POST['noHp'];
$password = md5($_POST['password']);
$passwordHid = $_POST['passwordHid'];

$cek = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");

$result = mysqli_fetch_array($cek);

if (isset($result)) {
 $response['value'] = 0;
 $response['message'] = "email tidak dapat digunakan!";
 echo json_encode($response);
} else {
 $insert = "INSERT INTO user VALUE(NULL,'$nama','$email','$noHp','$password','$passwordHid','no-image.png','2')";
 if (mysqli_query($con, $insert)) {
  $response['value'] = 1;
  $response['message'] = "Berhasil mendaftarkan akun. Silahkan login";
  echo json_encode($response);
 } else {
  $response['value'] = 0;
  $response['message'] = "Gagal mendaftarkan akun";
  echo json_encode($response);
 }
}
