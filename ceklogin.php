<?php
include "koneksi.php";
$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$query = mysqli_query($con,"SELECT * FROM user 
    WHERE Username='$Username' AND Password='$Password' ");
$hasilquery = mysqli_num_rows($query); // 1 atau 0
if($hasilquery == 1){
    session_start(); // memulai sesi
    while($row=mysqli_fetch_assoc($query)){
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['UserID'] = $row['UserID'];
        header('location: dashboard.php');
    }
}else{
    header('location: index.php');
}
?>
