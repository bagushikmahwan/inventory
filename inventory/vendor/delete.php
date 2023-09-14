<?php
include ('../tools.php');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id_vendor=$_POST['id_vendor'];
    $sql="delete from vendor where id_vendor='$id_vendor'";
    delete($sql);
}