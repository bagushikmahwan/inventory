<html>
<head>
    <title>Inventory - Master Barang</title>
</head>
<body>
    <?php include('../header.php');
          include('../tools.php');
          $id_barang=$_POST['id_barang'];
          $sql_vendor="select * from vendor";
          $sql_barang="select * from barang where id_barang='$id_barang'";
          $hasil_vendor=select($sql_vendor);
          $hasil_barang=select($sql_barang);
          $data=$hasil_barang->fetch_assoc();
          ?>

    <h3>Edit Data Master Barang</h3>
    <form action="edit.php" method="post">
    <input type="hidden" value="<?php echo $id_barang; ?>" name="id_barang"/>
    <label>Kode Barang</label>
    <input type="text" value="<?php echo $data['kode_barang']; ?>" name="kode_barang" readonly ><br>
    <label>vendor</label>
    <select name="id_vendor">
    <?php 
    $id_vendor=$data['id_vendor'];
    while($datavendor = $hasil_vendor->fetch_assoc()) { 
    if($id_vendor==$datavendor['id_vendor']){ ?>
    <option value="<?php echo $datavendor['id_vendor']; ?>"  selected="selected"><?php echo $datavendor['nama_vendor'];?>  </option>
    <?php }else{ ?>
    <option value="<?php echo $datavendor['id_vendor']; ?>" ><?php echo $datavendor['nama_vendor']; ?>  
        <?php }} ?>
    </select><br>
    <label>Nama Barang</label>
    <input type="text" value="<?php echo $data['nama_barang']; ?>" name="nama_barang" required><br>
    <label>QTY</label>
    <input type="text" value="<?php echo $data['qty']; ?>" name="qty" required><br>
    <label>Harga Jual</label>
    <input type="text" value="<?php echo $data['harga_jual']; ?>" name="harga_jual" required><br>
    <button type="submit">Submit</button>
    </form>
</body>
</html>