<?php
include('../tools.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id_vendor=$_POST['id_vendor'];
    $nama_vendor=$_POST['nama_vendor'];
    $sql="update vendor set nama_vendor='$nama_vendor' where id_vendor='$id_vendor'";
    update($sql,"vendor");
}
?>