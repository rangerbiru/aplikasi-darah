<?php
$nm = $_POST['nm'];
$jkl = $_POST['jkl'];
$golongan = $_POST['golongan'];
$hp = $_POST['hp'];
$almt = $_POST['almt'];
$qty = $_POST['qty'];
$jenis = "keluar";

//stock_darah
$sel_stock = mysqli_query($konek,"SELECT * FROM `stock_darah` WHERE `id`='".$golongan."'") or die(mysqli_error());
$f_stock = mysqli_fetch_array($sel_stock);
//jumlah
$jum = $f_stock[1] - $qty;

if (empty($nm) || empty($jkl) || empty($golongan) || empty($hp) || empty($almt)) {
  echo "<script>alert('Input Harus Lengkap');history.back();</script>";
  exit();
}

if ($jum < 0) {
  echo "<script>alert('Stock Tidak Cukup');history.back();</script>";
  exit();
}else {
  $q = mysqli_query($konek,"INSERT INTO `transaksi` VALUES('','".$nm."','".$almt."','".$golongan."','".$hp."','".$jkl."','".$jenis."','".$qty."',now())") or die(mysqli_error());
}

if($q){
  $up_stock = mysqli_query($konek,"UPDATE `stock_darah` SET `qty`='".$jum."' WHERE `id`='".$golongan."'") or die(mysqli_error());
  ?>
  <div class="container">
    <div class="page-title">
      <div class="title_left">
        <h3></h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Konfirmasi</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="alert alert-success">Berhasil</div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
}

?>