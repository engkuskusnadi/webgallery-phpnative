<?php
include "koneksi.php";
$FotoID = $_POST['FotoID'];
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
    $query2 = mysqli_query($con,"SELECT * FROM foto WHERE FotoID=$FotoID");
    $row2=mysqli_fetch_assoc($query2);
    $LokasiFoto = $row2['LokasiFoto'];
}
$query = mysqli_query($con,"UPDATE foto SET JudulFoto='$JudulFoto',
DeskripsiFoto='$DeskripsiFoto',TanggalUnggah='$TanggalUnggah',
LokasiFoto='$LokasiFoto',AlbumID='$AlbumID',UserID='$UserID' 
WHERE FotoID='$FotoID' ");
header('Location: dashboard.php');
?> 