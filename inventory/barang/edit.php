<?php
include('../tools.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id_barang=$_POST['id_barang'];
    $kode_barang=$_POST['kode_barang'];
    $nama_barang=$_POST['nama_barang'];
    $qty=$_POST['qty'];
    $harga_jual=$_POST['harga_jual'];
    $id_vendor=$_POST['id_vendor'];
    $sql="update barang set kode_barang='$kode_barang', nama_barang='$nama_barang', qty='$qty', harga_jual='$harga_jual', id_vendor='$id_vendor' where id_barang='$id_barang'";
    update($sql,"barang");
}
