<?php
ob_start();
session_start();
require_once '../../connectDB.php';
include_once '../../ImageHandler.php';

if (    $_POST['judulBerita'] != '' &&
        $_POST['isiBerita'] != '') {
    $id_masjid = $_POST['id_masjid'];
    $judulBerita = str_replace('"', "''", $_POST['judulBerita']);
    $isiBerita = str_replace('"', "''", nl2br($_POST['isiBerita']));
    $date = date("Y-m-d H:i:s");

    echo $id_masjid . '<br>';
    echo $judulBerita . '<br>';
    echo $isiBerita . '<br>';
    echo $file . '<br>';
    echo $date . '<br>';

    $_SESSION['user'][1];
    if ($_SESSION['user'][2] == 0) {
        $jenis = "Admin Utama";
    } else {
        $idmsjd = $_SESSION['user'][3];
        $data_masjid = querySelect('*', 'masjid', 'id_user =' . $idmsjd, null);
        $jenis = "Masjid " . $data_masjid[0]['nama_masjid'];
    }

    $insert_berita = queryInsert('berita_masjid (id_masjid, jenis_admin, judul, isi_berita, tanggal_upload)', $id_masjid . ',"' . $jenis . '","' . $judulBerita . '","' . $isiBerita . '","' . $date . '"');

    $selectMasjid = querySelect('*', 'masjid', 'id_masjid=' . $idmsjd, null);
    $nama = $selectMasjid[0]['nama_masjid'];
    $dataBerita = querySelect('*', 'berita_masjid ORDER BY id_berita_masjid DESC', null, null);
    $idberita = $dataBerita[0]['id_berita_masjid'];

    $targetfile = "../../../View/img/Upload/beritaMasjid/";
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
    $temp = explode(".", $_FILES["uploadgambarberita"]["name"]);
    $extension = end($temp);
    if ((($_FILES["uploadgambarberita"]["type"] == "image/gif") || ($_FILES["uploadgambarberita"]["type"] == "image/jpeg") || ($_FILES["uploadgambarberita"]["type"] == "image/jpg") || ($_FILES["uploadgambarberita"]["type"] == "image/JPG") || ($_FILES["uploadgambarberita"]["type"] == "image/pjpeg") || ($_FILES["uploadgambarberita"]["type"] == "image/x-png") || ($_FILES["uploadgambarberita"]["type"] == "image/png")) && ($_FILES["uploadgambarberita"]["size"] < 8000000) && in_array($extension, $allowedExts)) {
        if ($_FILES["uploadgambarberita"]["error"] > 0) {
            echo "Return Code: " . $_FILES["uploadgambarberita"]["error"] . "<br>";
        } else {
            $mime = explode("/", $_FILES["uploadgambarberita"]["type"]);
            $mime = $mime[1];
            $imageName = $nama . "_" . $idmsjd . "_" . $idberita . "." . $mime;
            move_uploaded_file($_FILES["uploadgambarberita"]["tmp_name"], $targetfile . $imageName);
        }
        try {
            $gambarBerita = ImageHandler::getFotoBeritaMasjid($imageName);
            echo "sukses upload";
        } catch (Exception $ex) {
            echo $ex;
        }
    }

    if (isset($_FILES['uploadfile'])) {
        $files = $_FILES['uploadfile'];
        $nFile = count($files['name']);
        $targetDir = '../../../View/img/Upload/fileBerita/';
        $temp = explode('.', $files['name']);
        $mime = end($temp);
        if (in_array($mime, array('pdf', 'zip')) && ($files['size'] >= 30000 && $files['size'] <= 8000000)) {
            $fileNameOri = $files['name'];
            $fileName = "FileBerita_" . $nama . "_" . $id_masjid . "_" . $idberita . "." . $mime;
            $finalFile = 'http://localhost/SIMasjid/View/img/Upload/fileBerita/' . $fileName;
            if (move_uploaded_file($files['tmp_name'], $targetDir . $fileName)) {
                echo 'sukses upload ' . $fileName;
            } else {
                echo 'gagal upload ' . $fileName;
            }
        }
    }

    $updateBerita = queryUpdate('berita_masjid', 'gambar="' . $gambarBerita . '", nama_file="' . $fileNameOri . '", alamat_file="' . $finalFile . '"', 'id_berita_masjid=' . $idberita);

    if ($insert_berita) {
        header('location:http://localhost/SIMasjid/view/AdminMasjid/tambahBeritaMasjid.php?status=true');
    }
} else {
    header('location:http://localhost/SIMasjid/view/AdminMasjid/tambahBeritaMasjid.php?&status=false');
}
?>