<?php
$id = mysqli_real_escape_string($konek,$_GET['id']);
$q = mysqli_query($konek,"DELETE FROM `data_masyarakat` WHERE `id` = '" . $id . "'") or die(mysqli_error());

if ($q) {
	header('location:?page=view-data');
}
?>
