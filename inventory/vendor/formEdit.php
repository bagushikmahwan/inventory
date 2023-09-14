<html>
    <head>
        <title>Inventory - Master Vendor</title>
    </head>
    <body>
        <?php
            include('../header.php');
            include('../tools.php');

            $id_vendor=$_POST['id_vendor'];
            $sql_vendor="select * from vendor where id_vendor='$id_vendor'";
            $hasil_vendor=select($sql_vendor);
            $data=$hasil_vendor->fetch_assoc();
        ?>

        <h3>Edit Data Master Vendor</h3>
        <form action="edit.php" method="post">
            <input type="hidden" value="<?php echo $id_vendor; ?>" name="id_vendor"/>

            <label>Nama Vendor</label>
            <input type="text" value="<?php echo $data['nama_vendor']; ?>" name="nama_vendor" required><br>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>