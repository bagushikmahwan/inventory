<?php
include('../tools.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_vendor=$_POST["id_vendor"];
    $nama_barang=$_POST["nama_barang"];
    $qty=$_POST["qty"];
    $harga_jual=$_POST["harga_jual"];
    $kode_barang=generateKodeBarang($id_vendor);
    
    $sql = "INSERT INTO barang(id_vendor,kode_barang,nama_barang,qty,harga_jual) 
    VALUES ('$id_vendor','$kode_barang','$nama_barang','$qty','$harga_jual')";
    
    insert($sql,"barang");
}

?>