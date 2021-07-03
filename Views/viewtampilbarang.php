<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Barang</title>

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
        width: 75%;
        border-collapse: collapse;
    }
    .cari{
        width: 10%;
        border-collapse: collapse;
        background-color: green;
        color: white;
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

    <h2>Data Barang</h2>

    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Playstation/formtambahbarang') ?>'">
            Tambah Barang
        </button>
    </p>

    <!-- <form>
        <input type="text" name="temukan" placeholder="Silahkan Cari Barang Disini...">
        <button type="submit">Cari</button> <br> <br>
    </form> -->

    <?php echo form_open("Playstation/cari")?>
        <select name="cariberdasarkan">
            <option value="">Cari Berdasarkan</option>
            <option value="nama">Nama Barang</option>
            <option value="kode">Kode Barang</option>
            <option value="jumlah">Jumlah Barang</option>
            <option value="harga">Harga Barang</option>
        </select>
        <input type="text" placeholder="Silahkan ketik yang mau dicari disini..." name="yangdicari" id="">
        <input class="cari" type="submit" value="Cari"> <br> <br>
    <?php echo form_close()?>

    <?php
        if(isset($jumlah)){
            if($cariberdasarkan==""){
            echo "Jumlah pencarian <b>'" . $yangdicari ."'</b> : " . $jumlah;
            }else{
                echo "Jumlah pencarian <b>'" . $cariberdasarkan . " = " . $yangdicari . "'</b> : " . $jumlah;
            }
            echo "<br><br>";
        }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Barang</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
                $nomor = 0;
                foreach ($tampildata as $row) :
                    $nomor++;
            ?>
            <tr>
                <th><?= $nomor; ?></th>
                <td><?= $row->kode; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->jumlah; ?></td>
                <td><?= $row->harga; ?></td>
                <td>
                    <button class="hapus" type="button" onclick="hapus('<?= $row->kode ?>')">
                        Hapus
                    </button>

                    <button type="button" onclick="window.location='<?php echo site_url('Playstation/formedit/' . $row->kode)?>'" >
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
        function hapus(kode){
            pesan= confirm('Apakah anda yakin ingin menghapus barang ini ?');

            if(pesan){
                window.location.href=("<?= site_url('Playstation/hapus/') ?>") + kode;
            }else return false;
        }
    </script>
</body>
</html>