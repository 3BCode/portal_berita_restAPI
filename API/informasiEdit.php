<?php
require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...

 $judul = $_POST['judul'];
 $deskripsi = $_POST['deskripsi'];
 $tanggal = $_POST['tanggal'];
 $isi = $_POST['isi'];
 $informasiid = $_POST['informasiid'];

 if (empty($_FILES)) {
  $gambar = $_POST['gambar'];
 } else {
  $gambar = date('dmYHis') . str_replace("", "", basename($_FILES['gambar']['name']));
  $imagePath = "../informasi/" . $gambar;
  move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);
 }

 $insert = "UPDATE informasi SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar', tanggal='$tanggal', isi='$isi' WHERE id='$informasiid'";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Informasi berhasil diedit";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Informasi gagal diedit";
  echo json_encode($response);
 }
}
