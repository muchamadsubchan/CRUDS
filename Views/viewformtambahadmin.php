<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Tambah Admin</title>
</head>
<style>
    button, .simpan{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Tambah Admin</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Admin/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Admin/simpanadmin') ?>
        <table>
            <tr>
                <td>Nama Admin :</td>
                <td>
                    <input type="text" name="nama_admin" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Telpon :</td>
                <td>
                    <input type="text" name="telpon_admin" maxlength="255">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="text" name="email_admin" maxlength="25">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="simpan" type="submit" value="Simpan Admin">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>