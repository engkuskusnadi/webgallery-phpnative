<?php
session_start();
if(isset($_SESSION['UserID'])){
header('Location: dashboard.php');
}
?>
<form action="ceklogin.php" method="POST">
    <label>Username</label>
        <input name="Username" type="text" required><br>
    <label>Password</label>
        <input name="Password" type="password"  required><br>
    <button type="submit" value="submit">Submit</button>
</form>