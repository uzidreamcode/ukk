<?php
include 'koneksi.php';
$ambil=$koneksi->query("DELETE FROM catatan WHERE id_catatan='$_GET[id]'");
echo "<script>location='index.php?halaman=catatan'</script>";
?>
