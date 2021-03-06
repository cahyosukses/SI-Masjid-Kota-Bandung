<?php
require_once '../../function/connectDB.php';
session_start();
$id_masjid = $_SESSION['id_masjid_admin'];
$id_video_masjid = $_GET['video_id'];
$datavideo = querySelect('*','video_informasi_masjid', 'id_video_masjid='.$id_video_masjid,null);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ubah Video Masjid</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="../img/SIM/ico.png">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/AdminMasjid/style.css">
        <link rel="stylesheet" href="../css/AdminMasjid/sidebar.css">
        <link rel="stylesheet" href="../css/AdminMasjid/tambahVideoMasjid.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="col-full">
                <div class="header row">

                </div>
                <div class="content row">
                    <div class="side box span-1-8">

                    </div>
                    <form method='GET' action='../../function/script/edit/editVideoMasjidAM.php'>
                    <div class="box span-10-3">
                        <div class="kotak-tengah box span-12">
                            <div class="kotak-judul box span-12">
                                Ubah Video Masjid
                            </div>
                            <input hidden type="text" name="id_masjid" value="<?php echo $id_masjid ?>"/>
                            <input hidden type="text" name="id_video_masjid" value="<?php echo $id_video_masjid ?>"/>
                            <div class="judul box span-12">
                                <div class="padding box span-1-5">
                                    Judul video
                                </div>
                                <div class="padding box span-0-5">
                                    :
                                </div>
                                <div class="box span-10">
                                    <input class="form field judul-berita" type="text" placeholder="Judul video" value="<?php echo $datavideo[0]['judul'];?>" name="judulVideo">
                                </div>
                            </div>
                            <div class="judul box span-12">
                                <div class="box span-1-5">
                                    Embed youtube
                                </div>
                                <div class="box span-0-5">
                                    :
                                </div>
                                <div class="box span-10">
                                    <textarea rows="9" cols="103" placeholder="  Embed video" value="" name="embed" style="font-size: 12px;"><?php echo $datavideo[0]['embed'];?></textarea>
                                </div>
                            </div>
                            <div class="simpan box span-12">
                                <input type='submit' class="btn btn-block btn-lg btn-inverse" value='Simpan' name="adminmasjid_tambahvideomasjid_submit">
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
            <meta http-equiv="refresh" content="2;url=http://localhost/SIMasjid/view/AdminMasjid/index.php" />';
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
    </body>
</html>