<?php
include "koneksi.php";
$JudulFoto = $_POST['JudulFoto'];
$DeskripsiFoto = $_POST['DeskripsiFoto'];
$TanggalUnggah = $_POST['TanggalUnggah'];
$AlbumID = $_POST['AlbumID'];
$UserID = $_POST['UserID'];

//PROSES UPLOAD
if(!empty($_FILES['UploadFoto']['name'])){
    $LokasiFoto = $_FILES['UploadFoto']['name'];
    $target_dir = "foto/";
    $target_file = $target_dir . basename($_FILES['UploadFoto']['name']);
    move_uploaded_file($_FILES['UploadFoto']['tmp_name'],$target_file); 
}else{
    $target_file = "-";
}
    $query = mysqli_query($con,"INSERT INTO foto 
    (JudulFoto,DeskripsiFoto,TanggalUnggah,LokasiFoto,AlbumID,UserID) 
    VALUES ('$JudulFoto','$DeskripsiFoto','$TanggalUnggah','$LokasiFoto','$AlbumID','$UserID')");

header("Location: dashboard.php");
?>