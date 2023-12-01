<?php
require 'koneksi.php';

// Menerima data dari mobile
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Mengambil data dari JSON
$nama = trim($data['nama']);
$alamat = trim($data['alamat']);
$nomor_telepon = trim($data['nomor_telepon']);
$tanggal_kunjungan = trim($data['tanggal_kunjungan']);
$keperluan = trim($data['keperluan']);

// Mengatur status respons HTTP
http_response_code(201);

// Memeriksa apakah data yang diterima tidak kosong
if ($nama != '' && $alamat != '' && $nomor_telepon != '' && $tanggal_kunjungan != '' && $keperluan != '') {
    // Menjalankan query untuk menyimpan data tamu
    $query = mysqli_query($koneksi, "INSERT INTO tamu (nama, alamat, nomor_telepon, tanggal_kunjungan, keperluan) VALUES ('$nama', '$alamat', '$nomor_telepon', '$tanggal_kunjungan', '$keperluan')");

    // Memeriksa apakah query berhasil dijalankan
    if ($query) {
        $pesan = true;
    } else {
        $pesan = false;
    }
} else {
    $pesan = false;
}

// Mengirim respons JSON
echo json_encode($pesan);

// Menampilkan pesan error MySQL jika ada
echo mysqli_error($koneksi);
