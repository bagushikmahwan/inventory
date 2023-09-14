<html>
    <head>
        <title>Inventory - Master Vendor</title>
    </head>

    <body>
        <?php include('../header.php') ?>
        <?php include('../tools.php') ?>

        <h3>Master Vendor</h3>

    <form action="index.php" method="post">
        <input type="text" name="cari">
        <button type="submit">Cari Vendor</button>
    </form>
        <a href="formAdd.php">Tambah</a>
        <table border="1">
            <thead>
                <tr>
                    <th align="center">&nbsp;No.&nbsp;</th>
                    <th align="center">&nbsp;Id Vendor&nbsp;</th>
                    <th align="center">&nbsp;Nama Vendor</th>
                    <th align="center">&nbsp;Jumlah Barang</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $awal = microtime(true);

                if(isset($_POST["cari"])){
                    $cari = $_POST["cari"];
                    $sql="SELECT v.*, COUNT(b.id_barang) as jmlbuku FROM vendor v LEFT JOIN barang b ON v.id_vendor=b.id_vendor where v.nama_vendor like '%$cari%' GROUP BY v.id_vendor ;";
                }else{
                    $sql="SELECT v.*, COUNT(b.id_barang) as jmlbuku FROM vendor v LEFT JOIN barang b ON v.id_vendor=b.id_vendor GROUP BY v.id_vendor;";
                }

                
                $hasil=select($sql);

                $no = 1;
                while ($data = mysqli_fetch_array($hasil)) {
                ?>
                    <tr align="center">
                        <td>&nbsp;<?php echo $no; ?>&nbsp;</td>
                    
                        <td align="center"> <?php echo $data['id_vendor']; ?> </td>
                        <td align="center"> <?php echo $data['nama_vendor']; ?> </td>
                        <td align="center"> <?php echo $data['jmlbuku']; ?> </td>
                        <form action="formEdit.php" method="post" >
                        <td><input type="hidden" value="<?php echo $data['id_vendor']; ?>" name="id_vendor"><button type="submit">Edit</button></form></td>
                        <form action="delete.php" method="post" >
                        <td><input type="hidden" value="<?php echo $data['id_vendor']; ?>" name="id_vendor"><button type="submit">Delete</button></form>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>

        <?php
        $akhir = microtime(true);
        $lama = $akhir - $awal;
        echo "<br>Time Execution : ".$lama." microsecond";
        ?>
    </body>
</html>