<?php

session_start();

include 'koneksi.php';

$nama = htmlspecialchars($_POST['nama']);
$pesan = htmlspecialchars($_POST['pesan']);
$nama = mysqli_real_escape_string($conn, $nama);
$pesan = mysqli_real_escape_string($conn, $pesan);

$insert = mysqli_query($conn, "INSERT INTO guestbook (id, tanggal, nama, pesan) VALUES(NULL, NOW(), '{$nama}', '{$pesan}')");

if ($insert) {
	echo $insert;
}


