<?php
include('../tools.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama_vendor=$_POST["nama_vendor"];
    
    $sql= "INSERT INTO vendor (nama_vendor)
    VALUES ('$nama_vendor')";
    
    insert($sql,"vendor");
}

?>