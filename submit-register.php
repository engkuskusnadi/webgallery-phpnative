<?php
include "koneksi.php";
$NamaLengkap = $_POST['NamaLengkap'];
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Email = $_POST['Email'];
$Alamat = $_POST['Alamat'];
    $query = mysqli_query($con,"INSERT INTO user 
    (Username,Password,Email,NamaLengkap,Alamat)
    VALUES ('$Username','$Password','$Email','$NamaLengkap','$Alamat')");
header("Location: index.php");
?>
