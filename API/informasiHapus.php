<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $informasiid = $_POST['informasiid'];

 $insert = "DELETE FROM informasi WHERE id= '$informasiid'";
 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "informasi berhasil dihapus";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "informasi gagal dihapus";
  echo json_encode($response);
 }
}
