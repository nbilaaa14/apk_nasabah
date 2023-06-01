<?php
// membuat instance
$dataNasabah=NEW Nasabah;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<h3>Daftar Nasabah</h3>';
$html .='<p>Berikut ini data nasabah</p>';
$html .='<table border="1" width="100%">
<thead>
<th>No.</th>
<th>Id Nasabah</th>
<th>No Rekening</th>
<th>Nama Nasabah</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>L/P</th>
<th>Alamat</th>
<th>No Handphone</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataNasabah->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisNasabah){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisNasabah->id_nasabah.'</td>
<td>'.$barisNasabah->no_rekening.'</td>
<td>'.$barisNasabah->nama.'</td>
<td>'.$barisNasabah->tempat_lahir.'</td>
<td>'.$barisNasabah->tanggal_lahir.'</td>
<td>'.$barisNasabah->jenis_kelamin.'</td>
<td>'.$barisNasabah->alamat.'</td>
<td>'.$barisNasabah->no_handphone.'</td>
<td>
<a href="index.php?file=nasabah&aksi=edit&id_nasabah='.$barisNasabah->id_nasabah.'">Edit</a>
<a href="index.php?file=nasabah&aksi=hapus&id_nasabah='.$barisNasabah->id_nasabah.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h2>Form Tambah</h2>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=nasabah&aksi=simpan">';
$html .='<p>Id Nasabah<br/>';
$html .='<input type="text" name="txtIdNasabah"placeholder="Masukan id " autofocus/></p>';
$html .='<p>No Rekening<br/>';
$html .='<input type="text" name="txtNoRekening"placeholder="Masukan No. Rekening" autofocus/></p>';
$html .='<p>Nama Lengkap<br/>';
$html .='<input type="text" name="txtNama"placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"placeholder="Masukan Tempat Lahir" size="30" required/>,';
$html .='<input type="date" name="txtTanggalLahir"required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"value="L"> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"value="P"> Perempuan</p>';
$html .='<p>Alamat<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukan alamat lengkap" cols="50" rows="5" required></textarea></p>';
$html .='<p>No Handphone<br/>';
$html .='<input type="text" name="txtNoHandphone"placeholder="Masukan No. Handphone" autofocus/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_nasabah'=>$_POST['txtIdNasabah'],
'no_rekening'=>$_POST['txtNoRekening'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat'],
'no_handphone'=>$_POST['txtNoHandphone']
);
// simpan siswa dengan menjalankan method simpan
$dataNasabah->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=nasabah&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='edit') {
// ambil data siswa
$nasabah=$dataNasabah->detail($_GET['id_nasabah']);
if($nasabah->jenis_kelamin =='L') { $pilihL='checked';
$pilihP =null; }
else {
$pilihP='checked'; $pilihL =null; }
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=nasabah&aksi=update">';
$html .='<p>Id Nasabah<br/>';
$html .='<input type="text" name="txtIdNasabah"value="'.$nasabah->id_nasabah.'"placeholder="Masukan id" autofocus/></p>';
$html .='<p>No Rekening<br/>';
$html .='<input type="text" name="txtNoRekening"value="'.$nasabah->no_rekening.'"placeholder="Masukan No. Rekening" autofocus/></p>';
$html .='<p>Nama Lengkap<br/>';
$html .='<input type="text" name="txtNama"value="'.$nasabah->nama.'"placeholder="Masukan Nama Lengkap" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"value="'.$nasabah->tempat_lahir.'"placeholder="Masukan Tempat Lahir" size="30" required/>,';
$html .='<input type="date" name="txtTanggalLahir"value="'.$nasabah->tanggal_lahir.'"required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"value="L" '.$pilihL.'> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"value="P" '.$pilihP.'> Perempuan</p>';
$html .='<p>Alamat<br/>';
$html .='<textarea name="txtAlamat" placeholder="Masukan alamat lengkap" cols="50" rows="5" required>'.$nasabah->alamat.'</textarea></p>';
$html .='<p>No Handphone<br/>';
$html .='<input type="text" name="txtNoHandphone"value="'.$nasabah->no_handphone.'"placeholder="Masukan No. Handphone" autofocus/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {
$data=array(
'id_nasabah'=>$_POST['txtIdNasabah'],
'no_rekening'=>$_POST['txtNoRekening'],
'nama'=>$_POST['txtNama'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tanggal_lahir'=>$_POST['txtTanggalLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'alamat'=>$_POST['txtAlamat'],
'no_handphone'=>$_POST['txtNoHandphone']
);
$dataNasabah->update($_POST['txtIdNasabah'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=nasabah&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataNasabah->hapus($_GET['id_nasabah']);
echo '<meta http-equiv="refresh" content="0;url=index.php?file=nasabah&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>
