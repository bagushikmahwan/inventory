<?php
include ('../tools.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id_barang=$_POST['id_barang'];
    $sql="delete from barang where id_barang='$id_barang'";
    delete($sql);
}