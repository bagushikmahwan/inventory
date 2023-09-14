<?php
// Include CONFIG
include('config.php');

//fungsi INSERT
function insert($sql,$location) {
    global $conn;     // global untuk membuat $conn menjadi variabel global/bisa diakses di fungsi insert
    if ($conn->query($sql)) {
        echo "insert berhasil";
        header("location: http://localhost/inventory/".$location);
    } else {
        echo "Insert Error ";
    }
  }

function select($sql) {
    global $conn;
    $result = $conn->query($sql);
    return $result;
 }

//fungsi UPDATE
function update($sql,$location) {
    global $conn;
    if ($conn->query($sql)) {
        echo "update berhasil";
        header("location: http://localhost/inventory/".$location);
    } else {
        echo "Update error";
    }
}

//fungsi DELETE
function delete($sql) {
    global $conn;
    if($conn->query($sql)){
        echo "delete berhasil";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "Delete Error";
    }
}


/**
 * Fungsi ini untuk mengenerate kode barang
 *
 * @param int id_vendor
 * @return String $kodebarang
 */
function generateKodeBarang($id_vendor){
    $sql="SELECT nama_vendor FROM vendor where id_vendor = '$id_vendor'";
    $result=select($sql);
    $nama_vendor = $result->fetch_assoc();
    $hurufdepan = substr($nama_vendor['nama_vendor'],0,3);    // Mengambil huruf depan 0=start, 3=jml karakter yg diambil
    $hurufdepanbesar = strtoupper($hurufdepan);         // Menjadikan huruf besar 
    
    $sql="SELECT kode_barang FROM barang where kode_barang like '$hurufdepanbesar%' ORDER BY id_barang DESC LIMIT 1";
    $result=select($sql);
    if ($result) {
        $kode = $result->fetch_assoc();

        $no_urutbarang = (int)substr($kode['kode_barang'],3);
        $no_urutbarang++;
    }else{
        $no_urutbarang=1;
    }
    $no_urutbarang = sprintf('%04d',$no_urutbarang);

    $kodebarang=$hurufdepanbesar.$no_urutbarang;    

    return $kodebarang;
}