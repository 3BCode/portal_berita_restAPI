<?php

require "../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
 #code...
 $response = array();
 $judul = $_POST['judul'];
 $deskripsi = $_POST['deskripsi'];
 $tanggal = $_POST['tanggal'];
 $isi = $_POST['isi'];

 $gambar = date('dmYHis') . str_replace(" ", "", basename($_FILES['gambar']['name']));
 $imagePath = "../informasi/" . $gambar;
 move_uploaded_file($_FILES['gambar']['tmp_name'], $imagePath);

 $insert = "INSERT INTO informasi VALUE(NULL, '$judul', '$deskripsi', '$gambar', '$tanggal', '$isi')";

 if (mysqli_query($con, $insert)) {
  # code...
  $response['value'] = 1;
  $response['message'] = "Informasi berhasil ditambahkan";
  echo json_encode($response);
 } else {
  # code...
  $response['value'] = 0;
  $response['message'] = "Informasi gagal ditambahkan";
  echo json_encode($response);
 }
}
