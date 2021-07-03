<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Tambah Barang</title>
</head>
<style>
    button, .simpan{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Tambah Barang</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Playstation/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Playstation/simpanbarang') ?>
        <table>
            <tr>
                <td>Kode Barang :</td>
                <td>
                    <input type="text" name="kode" maxlength="25">
                </td>
            </tr>
            <tr>
                <td>Nama Barang :</td>
                <td>
                    <input type="text" name="nama" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Jumlah Barang :</td>
                <td>
                    <input type="text" name="jumlah" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Harga Barang :</td>
                <td>
                    <input type="text" name="harga" value="Rp. ,-" maxlength="25">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="simpan" type="submit" value="Simpan Barang">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>