<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Tambah Buyer</title>
</head>
<style>
    button, .simpan{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Tambah Buyer</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Buyer/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Buyer/simpanbuyer') ?>
        <table>
            <tr>
                <td>Nama Buyer :</td>
                <td>
                    <input type="text" name="nama_buyer" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Telpon :</td>
                <td>
                    <input type="text" name="telpon_buyer" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="text" name="email_buyer" maxlength="25">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="simpan" type="submit" value="Simpan Buyer">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>
