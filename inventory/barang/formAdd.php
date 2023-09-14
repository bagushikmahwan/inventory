<html>
<head>
    <title>Inventory - Master Barang</title>
</head>
<body>
    <?php include('../header.php');
     include('../tools.php');
     $sql_vendor="select * from vendor";
     $hasil_vendor=select($sql_vendor);

     ?>

    <h3>Tambah Data Master Barang</h3>
    <form action="add.php" method="post">
    <label>Vendor</label>
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
    <input type="text" name="nama_barang" required><br>
    <label>QTY</label>
    <input type="number" name="qty" required><br>
    <label>Harga Jual</label>
    <input type="number" name="harga_jual" required><br>
    <button type="submit">Submit</button>
    </form>
</body>
</html>