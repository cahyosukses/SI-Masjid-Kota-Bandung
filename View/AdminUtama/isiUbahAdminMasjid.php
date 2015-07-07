<?php
require_once '../../function/connectDB.php';
$idmasjid = $_GET["id_masjid"];
$user = querySelect('*', 'masjid', 'id_user=' . $idmasjid, null);
$masjid = querySelect('*', 'masjid', 'id_masjid =' . $idmasjid, null);
$tampungId = $masjid[0]['id_user'];
$iduser = querySelect('*', 'user', 'id_user=' . $tampungId, null);
$dataMasjid = querySelect('*', 'masjid', 'id_masjid =' . $idmasjid, null);
$tampungWilayah = $dataMasjid[0]['id_wilayah'];
$namaWilayah = querySelect('*', 'wilayah', 'id_wilayah =' . $tampungWilayah, null);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Admin Masjid</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="../img/SIM/ico.png">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/AdminUtama/style.css">
        <link rel="stylesheet" href="../css/AdminUtama/sidebar.css">
        <link rel="stylesheet" href="../css/AdminUtama/isiUbahAdminMasjid.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="col-full">
                <div class="header row">

                </div>
                <div class="content row">
                    <div class="side box span-1-8">

                    </div>
                    <form method='GET' action='../../function/script/edit/editAdminMasjid.php'>
                        <div class="box span-10-3">
                            <div class="kotak-atas box span-12">
                                <div class="kotak-judul box span-12">
                                    Ubah Admin Masjid
                                </div>
                            </div>
                            <input hidden type="text" name="id_masjid" value="<?php echo $_GET['id_masjid'] ?>"/>
                            <input hidden type="text" name="id_user" value="<?php echo $iduser[0]['id_user'] ?>"/>
                            <div class="kotak-tengah box span-12">
                                <div class="baris box span-6">
                                    <div class="baris box span-12">
                                        <div class="kolom box span-4">
                                            Username
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-4">
                                            <input class="form field pass" type="text" id="username" placeholder="Username admin" value="<?php echo $iduser[0]['username']; ?>" name="username">
                                        </div>
                                        <div class="kolom-field box span-3" style="font-size: 14px;">
                                            <p id="avail-notif"></p>
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-4">
                                            Buat password
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-4">
                                            <input class="form field pass" type="password" placeholder="Password masih sama" value="" name="password" id="password">
                                        </div>
                                        <div class="kolom-field box span-3" style="font-size: 14px; padding-top: 0;">
                                            <p id="password-notif"></p>
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-4">
                                            Konfirmasi password anda
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-4">
                                            <input class="form field pass" type="password" placeholder="Konfirmasi password" value="" id="confirmPassword">
                                        </div>
                                        <div class="kolom-field notif box span-3" style="font-size: 14px;">
                                            <p id="confirm-notif"></p>
                                            <p id="alert-notif" style="color:red;"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="kanan box span-6">
                                    <div class="baris box span-12" >
                                        <div class="kolom box span-3">
                                            Wilayah masjid
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="button box span-2-5">
                                            <div class="styled-select">
                                                <select name="wilayahMasjid">
                                                    <option value="">Pilih wilayah</option>
                                                    <?php include '../../function/script/select/wilayahMasjid.php' ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            Nama masjid
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field id" type="text" placeholder="Nama masjid" value="<?php echo $dataMasjid[0]['nama_masjid']; ?>" name="namaMasjid">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            Alamat
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field id" type="text" placeholder="Alamat" value="<?php echo $dataMasjid[0]['alamat']; ?>" name="alamat">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            Email
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field id" type="text" placeholder="Email" value="<?php echo $dataMasjid[0]['email']; ?>" name="email">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            RT
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field kecil" type="text" placeholder="RT" value="<?php echo $dataMasjid[0]['rt']; ?>" name="rt">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            RW
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field kecil" type="text" placeholder="RW" value="<?php echo $dataMasjid[0]['rw']; ?>" name="rw">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            Kecamatan
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field kecil" type="text" placeholder="Kecamatan" value="<?php echo $dataMasjid[0]['kecamatan']; ?>" name="kecamatan">
                                        </div>
                                    </div>
                                    <div class="baris box span-12">
                                        <div class="kolom box span-3">
                                            Nomer telepon
                                        </div>
                                        <div class="kolom box span-0-5">
                                            :
                                        </div>
                                        <div class="kolom-field box span-8">
                                            <input class="form field kecil" type="text" placeholder="Nomer telepon" value="<?php echo $dataMasjid[0]['no_telepon']; ?>" name="noTelp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="baris-buat box span-12">
                                <div class="buat box span-12">
                                    <input id="submit-button" type='submit' class="btn btn-block btn-lg btn-inverse" value='Buat' name="adminutama_ubahadmin_submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'true') {
                        echo '<div id="login_popup1">
                <div class="layer box span-12">
                </div>
                <div class="pop-up box span-3">
                    <div class="center box span-12">
                        <table class="tabel-sukses">
                            <tr>
                                <td class="center sukses">
                                    Sukses!
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <meta http-equiv="refresh" content="1.5;url=http://localhost/SIMasjid/view/AdminUtama/index.php" />';
                    } else {
                        echo '<div id="login_popup1">
                <div class="layer box span-12">
                </div>
                <div class="pop-up box span-3">
                    <div class="center box span-12">
                        <table class="tabel">
                            <tr>
                                <td class="center perhatian">
                                    Perhatian!
                                </td>
                            </tr>
                            <tr>
                                <td class="center jarak-popup">
                                    Data tidak boleh ada yang kosong, silahkan untuk mencoba kembali.
                                </td>
                            </tr>
                        </table>
                        <div class="absolute btn-ok btn-block-ok btn-lg-ok btn-inverse-ok" onclick="getLogin_confirm(1);">Kembali</div>
                    </div>
                </div>
            </div>';
                    }
                }
                ?>

                <div class="footer row">

                </div>
            </div>
        </div>
        <script src="../js/custom.js"></script>
        <script src="../js/jquery-2.1.0.min.js"></script>
        <script src="../js/main.js"></script>
        <script>
            $(document).ready(function () {
                $(".header").load("header.php");
                $(".side").load("sidebar.php");
            });
        </script>
        <script>
            var statUsername = false;
            $("#username").keyup(function () {
                if ($("#username").val().length > 1) {
                    $.post('../../function/script/add/addUser.php', {username: $(this).val()}, function (data) {
                        data = JSON.parse(data);
                        if (data.code === 400) {
                            $('#avail-notif').css('color', 'red');
                            $('#avail-notif').text('Username terpakai');
                            statUsername = false;

                        } else if (data.code === 200) {
                            $('#avail-notif').css('color', 'green');
                            $('#avail-notif').text('Username tersedia');
                            statUsername = true;
                        }
                        if ($('#username').val().length === 0) {
                            $('#avail-notif').text(" ");
                            statUsername = false;
                        }
                    });
                }
            });

            $("#password").keyup(function () {
                if ($("#password").val().length > 0 && $("#password").val().length < 8) {
                    $('#password-notif').css('color', 'red');
                    $('#password-notif').html('Password harus terdiri dari min. 8 karakter');
                } else {
                    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
                    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                    var enoughRegex = new RegExp("(?=.{6,}).*", "g");

                    if (false == enoughRegex.test($(this).val())) {
                        $('#password-notif').html('Kurang');
                    } else if (strongRegex.test($(this).val())) {
                        $('#password-notif').css('color', 'green');
                        $('#password-notif').html('Kualitas Password Baik');
                    } else if (mediumRegex.test($(this).val())) {
                        $('#password-notif').css('color', '#aa7722');
                        $('#password-notif').html('Kualitas Password Cukup');
                    } else {
                        $('#password-notif').css('color', 'red');
                        $('#password-notif').html('Kualitas Password Kurang');
                    }
                    if ($('#password').val().length === 0) {
                        $('#password-notif').text('');
                    }
                }
            });

            $('#confirmPassword').keyup(function () {
                var pass = $('#password').val();
                var confirm = $('#confirmPassword').val();

                if ($('#password').val().length === 0) {

                } else {

                    if (pass != confirm) {
                        $('#confirm-notif').css('color', 'red');
                        $('#confirm-notif').text('Password tidak cocok');
                        $('#submit-button').attr('disabled', 'disabled');
                    } else {
                        $('#confirm-notif').css('color', 'green');
                        $('#confirm-notif').text('Password cocok');
                        $('#submit-button').removeAttr('disabled');
                    }
                }
                if ($('#confirmPassword').val().length === 0) {
                    $('#confirm-notif').text('');
                }

            });
        </script>
    </body>
</html>