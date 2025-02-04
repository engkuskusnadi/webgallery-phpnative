<?php
include "koneksi.php";
$FotoID = $_GET['FotoID'];
$query = mysqli_query($con,"DELETE FROM foto WHERE FotoID='$FotoID' ");
header('Location: dashboard.php');
?> 