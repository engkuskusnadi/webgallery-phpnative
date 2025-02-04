<table border="1" style="text-align:center;">
    <tr>
        <td>No</td>
        <td>Foto</td>
        <td>Judul Foto</td>
        <td>Deskripsi Foto</td>
        <td>Tanggal</td>
        <td>Album</td>
        <td>User Upload</td>
        <td>Jumlah Komentar</td>
        <td>Jumlah Like</td>
        <td>Aksi</td>
    </tr>
    <?php
    include "koneksi.php";
    $no = 0;
    $query = mysqli_query($con,"SELECT * FROM foto AS f
    LEFT JOIN album AS a ON f.AlbumID = a.AlbumID
    LEFT JOIN user AS u ON f.UserID = u.UserID");
    while($row=mysqli_fetch_assoc($query)){
    ?>
    <tr>
        <td><?php echo $no += 1; ?></td>
        <td><img src="foto/<?php echo $row['LokasiFoto']; ?>" width="200px"></td>
        <td><?php echo $row['JudulFoto']; ?></td>
        <td><?php echo $row['DeskripsiFoto']; ?></td>
        <td><?php echo $row['TanggalUnggah']; ?></td>
        <td><?php echo $row['NamaAlbum']; ?></td>
        <td><?php echo $row['NamaLengkap']; ?></td>
        <td>
            <?php
            $FotoID = $row['FotoID'];
            $query2 = mysqli_query($con,"SELECT * FROM komentarfoto WHERE FotoID ='$FotoID'");
            $jumlah_komentar = mysqli_num_rows($query2);
            echo $jumlah_komentar;
            ?>  
        </td>
        <td>
        <?php
            $query3 = mysqli_query($con,"SELECT COUNT(FotoID) FROM komentarfoto WHERE FotoID ='$FotoID'");
            $jumlah_like = mysqli_num_rows($query3);
            echo $jumlah_like;
            ?>
        </td>
        <td>
            <a href="edit-foto.php?FotoID=<?php echo $row['FotoID'];?>">Edit</a> | 
            <a href="delete-foto.php?FotoID=<?php echo $row['FotoID'];?>"
             onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>