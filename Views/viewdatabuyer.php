<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Pembeli</title>

<style>
    table{
        width: 100%;
        border-collapse: collapse;
    }
    button{
        background-color: green;
        color: white;
    }
    .hapus{
        background-color: red;
        color: white;
    }
    input{
        width: 94%;
        border-collapse: collapse;
    }
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
</style>

</head>
<body>
    <div class="topnav">
        <a href="<?php echo site_url('Playstation') ?>">Data Barang</a>
        <a href="<?php echo site_url('Admin') ?>">Data Admin</a>
        <a href="<?php echo site_url('Buyer') ?>">Data Pembeli</a>
    </div>

    <h2>Data Pembeli</h2>

    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Buyer/formtambahbuyer') ?>'">
            Tambah Pembeli
        </button>
    </p>

    <form action="" method="POST">
        <input type="text" name="temukan" placeholder="Silahkan Cari Barang Disini...">
        <button type="submit" name="tombolcari">Cari</button> <br> <br>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Pembeli</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $nomor = 0;
                foreach ($tampildatabuyer as $row) :
                    $nomor++;
            ?>
            <tr>
                <th><?= $nomor; ?></th>
                <td><?= $row->nama_buyer; ?></td>
                <td><?= $row->telpon_buyer; ?></td>
                <td><?= $row->email_buyer; ?></td>
                <td>
                    <button class="hapus" type="button" onclick="hapus('<?= $row->telpon_buyer ?>')">
                        Hapus
                    </button>

                    <button type="button" onclick="window.location='<?php echo site_url('Buyer/formeditbuyer/' . $row->telpon_buyer)?>'" >
                        Edit
                    </button>
                </td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
    <script>
        function hapus(telpon_buyer){
            pesan= confirm('Apakah anda yakin ingin menghapus pembeli ini ?');

            if(pesan){
                window.location.href=("<?= site_url('Buyer/hapus/') ?>") + telpon_buyer;
            }else return false;
        }
    </script>
</body>
</html>