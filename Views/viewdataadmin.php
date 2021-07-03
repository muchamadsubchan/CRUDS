<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Admin</title>

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

    <h2>Data Admin</h2>

    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Admin/formtambahadmin') ?>'">
            Tambah Admin
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
                <th>Nama Admin</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $nomor = 0;
                foreach ($tampildataadmin as $row) :
                    $nomor++;
            ?>
            <tr>
                <th><?= $nomor; ?></th>
                <td><?= $row->nama_admin; ?></td>
                <td><?= $row->telpon_admin; ?></td>
                <td><?= $row->email_admin; ?></td>
                <td>
                    <button class="hapus" type="button" onclick="hapus('<?= $row->telpon_admin ?>')">
                        Hapus
                    </button>

                    <button type="button" onclick="window.location='<?php echo site_url('Admin/formedit/' . $row->telpon_admin)?>'" >
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
        function hapus(telpon_admin){
            pesan= confirm('Apakah anda yakin ingin menghapus admin ini ?');

            if(pesan){
                window.location.href=("<?= site_url('Admin/hapus/') ?>") + telpon_admin;
            }else return false;
        }
    </script>
</body>
</html>