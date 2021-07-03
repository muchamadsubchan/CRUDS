<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Edit Admin</title>
</head>
<style>
    button, .update{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Edit Admin</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Admin/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Admin/updateadmin') ?>
        <table>
            <tr>
                <td>Nama Admin :</td>
                <td>
                    <input type="text" name="nama_admin" maxlength="25" value="<?= $nama_admin; ?>">
                </td>
            </tr>
            <tr>
                <td>Telpon :</td>
                <td>
                    <input type="text" name="telpon_admin" maxlength="255" value="<?= $telpon_admin; ?>">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="text" name="email_admin" maxlength="25" value="<?= $email_admin; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="update" type="submit" value="Update Admin">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>