<?php session_start(); ?>
<?php include "menu.php"; ?>
<hr>
<?php
include "koneksi.php";
$FotoID = $_GET['FotoID'];
$query = mysqli_query($con,"SELECT * FROM foto WHERE FotoID='$FotoID'");
while($row=mysqli_fetch_assoc($query)){
?>
<form action="update-foto.php" method="POST" enctype="multipart/form-data">
    <label>Judul Foto</label>
        <input name="JudulFoto" type="text" value="<?php echo $row['JudulFoto']; ?>"><br>
    <label>Deskripsi Foto</label>
        <textarea name="DeskripsiFoto"><?php echo $row['DeskripsiFoto']; ?></textarea><br>
    <label>Tanggal Unggah</label>
        <input name="TanggalUnggah" type="date" value="<?php echo $row['TanggalUnggah']; ?>"><br>
    <label>Upload Foto</label>
        <input name="UploadFoto" type="file" ><br>
    <label>Album</label>
        <select name="AlbumID">
            <option>Silahkan pilih</option>
            <?php
            include "koneksi.php";
            $query2 = mysqli_query($con,"SELECT * FROM album");
            while($row2=mysqli_fetch_assoc($query2)){
            ?>
            <option value="<?php echo $row2['AlbumID']; ?>" <?php if($row2['AlbumID'] == $row['AlbumID']) {echo "selected";} ?>>
                <?php echo $row2['NamaAlbum']; ?>
            </option>
            <?php } ?>
        </select><br>
        <input name="FotoID" type="hidden" value="<?php echo $row['FotoID']; ?>">
        <input name="UserID" type="hidden" value="<?php echo $_SESSION['UserID'];?>">
    <button type="submit" value="submit">Submit</button>
</form>
<?php } ?>
<hr>
<?php include "view-foto.php"; ?>