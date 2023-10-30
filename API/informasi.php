<?php
require "../config/connect.php";

$response = array();
$sql = mysqli_query($con, "SELECT * FROM informasi  order by id desc");

while ($a = mysqli_fetch_array($sql)) {
 # code...
 $b['id'] = $a['id'];
 $b['judul'] = $a['judul'];
 $b['deskripsi'] = $a['deskripsi'];
 $b['gambar'] = utf8_encode($a['gambar']);
 $b['tanggal'] = date("d-m-Y", strtotime($a['tanggal']));
 $b['isi'] = utf8_encode($a['isi']);

 array_push($response, $b);
}

echo json_encode($response);
