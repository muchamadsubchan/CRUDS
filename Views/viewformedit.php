<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Edit Barang</title>
</head>
<style>
    button, .update{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Edit Barang</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Playstation/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Playstation/updatebarang') ?>
        <table>
            <tr>
                <td>Kode Barang :</td>
                <td>
                    <input type="text" name="kode" maxlength="25" value="<?= $kode; ?>">
                </td>
            </tr>
            <tr>
                <td>Nama Barang :</td>
                <td>
                    <input type="text" name="nama" maxlength="25" value="<?= $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>Jumlah Barang :</td>
                <td>
                    <input type="text" name="jumlah" maxlength="255" value="<?= $jumlah; ?>">
                </td>
            </tr>
            <tr>
                <td>Harga Barang :</td>
                <td>
                    <input type="text" name="harga" maxlength="25" value="<?= $harga; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="update" type="submit" value="Update Barang">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>