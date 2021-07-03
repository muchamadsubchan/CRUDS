<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Edit Buyer</title>
</head>
<style>
    button, .update{
        background-color: green;
        color: white;
    }
</style>
<body>
    <h2>Form Edit Buyer</h2>
    <p>
        <button type="button" onclick="window.location='<?php echo site_url('Buyer/index') ?>'">
            Kembali
        </button>
    </p>

    <p>
        <?= form_open('Buyer/updatebuyer') ?>
        <table>
            <tr>
                <td>Nama Buyer :</td>
                <td>
                    <input type="text" name="nama_buyer" maxlength="25" value="<?= $nama_buyer; ?>">
                </td>
            </tr>
            <tr>
                <td>Telpon :</td>
                <td>
                    <input type="text" name="telpon_buyer" maxlength="255" value="<?= $telpon_buyer; ?>">
                </td>
            </tr>
            <tr>
                <td>Email :</td>
                <td>
                    <input type="text" name="email_buyer" maxlength="25" value="<?= $email_buyer; ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input class="update" type="submit" value="Update Buyer">
                </td>
            </tr>
        </table>
        <?= form_close() ?>
    </p>
</body>
</html>