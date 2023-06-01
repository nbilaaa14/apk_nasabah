<?php
class Database {
protected $host='localhost';
protected $user='root';
protected $pass='';
protected $dbname='apl_nasabah';
public $mysqli;
public function __construct(){
$this->mysqli=NEW mysqli($this->host,
$this->user,$this->pass,$this->dbname);
// jika error code bukan 0
// berarti terjadi error
if($this->mysqli->connect_errno!=0){
$err=null;
$err .='Kode Error:'.$this->mysqli->connect_errno.'<br/>';
$err .='Deskripsi :'.$this->mysqli->connect_error;
}
}
public function tutupKoneksi(){
$this->mysqli->close();
}
public function cekError(){
return $this->mysqli->error;
}
}
