<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Nasabah</title>
<link href="class/style.css" rel="stylesheet" />
</head>
<body>
<?php
include('class/database.php');
include('class/nasabah.php');
?>
<center><h2>Aplikasi Data Nasabah</h2></center>
<hr/>
<p> <center><h3>
<a href="index.php">Home</a>
<a href="index.php?file=nasabah&aksi=tampil">Data Nasabah</a>
<a href="index.php?file=nasabah&aksi=tambah">Tambah Data Nasabah</a><center></h3>
</p>
<hr/>
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang Di Aplikasi Nasabah</h1>';
echo '<h2 align="center">Anda dapat menambahkan data anda sebagai nasabah di from tambah data nasabah</h2>';
}
?>
</body>
</html>