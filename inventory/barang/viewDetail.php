<html>
<head>
    <title>Inventory - Master Barang</title>
</head>
<body>
    <?php include('../header.php');
          include('../tools.php');
          $id_barang=$_GET['id_barang'];
          $sql_barang="select * from barang,vendor where barang.id_vendor=vendor.id_vendor and id_barang='$id_barang'";
          $hasil_barang=select($sql_barang);
          $data=$hasil_barang->fetch_assoc();
          ?>

    <h3>Detail Data Master Barang</h3>
    Kode Barang :
    <?php echo $data['kode_barang']; ?><br/>
    Vendor :
    <?php echo $data['nama_vendor'];?> <br/>
    Nama Barang : 
    <?php echo $data['nama_barang']; ?> <br/>
    qty : 
    <?php echo $data['qty']; ?><br/>
    Harga Jual: 
    <?php echo $data['harga_jual']; ?><br/>

</body>
</html>