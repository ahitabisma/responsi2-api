<?php
require 'koneksi.php';

// Menerima data dari mobile
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Mengambil data dari JSON
$id = trim($data['id']);
$nama = trim($data['nama']);
$alamat = trim($data['alamat']);
$nomor_telepon = trim($data['nomor_telepon']);
$tanggal_kunjungan = trim($data['tanggal_kunjungan']);
$keperluan = trim($data['keperluan']);

// Mengatur status respons HTTP
http_response_code(201);

// Memeriksa apakah data yang diterima tidak kosong
if ($id != '' && $nama != '' && $alamat != '' && $nomor_telepon != '' && $tanggal_kunjungan != '' && $keperluan != '') {
    // Menjalankan query untuk mengupdate data tamu berdasarkan ID
    $query = mysqli_query($koneksi, "UPDATE tamu SET 
        nama='$nama', 
        alamat='$alamat', 
        nomor_telepon='$nomor_telepon', 
        tanggal_kunjungan='$tanggal_kunjungan', 
        keperluan='$keperluan' 
        WHERE id='$id'");

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
