<html>
<head>
    <title>Inventory - Master Barang</title>
</head>
<body>
    <?php
        include('../header.php');
        include('../tools.php');

          if(isset($_POST["cari"])){
              $cari = $_POST["cari"];
              $sql="SELECT * FROM barang, vendor where barang.id_vendor=vendor.id_vendor and barang.nama_barang like '%$cari%'";
          }else{
              $sql="SELECT * FROM barang, vendor where barang.id_vendor=vendor.id_vendor";
          }

        $hasil=select($sql);
    ?>

    <h3>Master Barang</h3>

    <form action="index.php" method="post">
        <input type="text" name="cari">
        <button type="submit">Cari Barang</button>
    </form>
    <a href="formAdd.php">Tambah</a>

    <table border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode Barang</th>
      <th>Nama Barang</th>
      <th>Vendor</th>
      <th>qty</th>
      <th>Harga Jual</th>
      <th colspan="3">Aksi</th>
    </tr>
  </thead>
  <tbody>

 <?php $i=1;
 while($data = $hasil->fetch_assoc()) { ?>
         <tr>
         <td><?php echo $i; $i++; ?></th>
         <td> <?php echo $data['kode_barang'] ?></td>
         <td> <?php  echo $data['nama_barang'] ?></td>
         <td> <?php echo $data['nama_vendor'] ?></td>
         <td> <?php  echo $data['qty'] ?></td>
         <td> <?php  echo $data['harga_jual'] ?></td>
        <form action="formEdit.php" method="post" >
        <td><input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang"><button type="submit">Edit</button></form></td>
         <form action="delete.php" method="post" >
         <td><input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang"><button type="submit">Delete</button></form>
         </td>
         <td>
         <a href="viewDetail.php?id_barang=<?php echo $data['id_barang']; ?>">Detail</a> </td>
    </tr>                                                       
<?php } ?>
  </tbody>
</table>
</body>
</html>