<?php
// list pajak untuk bandara asal
$list_pajak_bandara_asal = [
  'Soekarno Hatta' => 65000,
  'Husein Sastranegara' => 50000,
  'Abdul Rachman Saleh' => 40000,
  'Juanda' => 30000
];
// list pajak untuk bandara tujuan
$list_pajak_bandara_tujuan = [
  'Ngurah Rai' => 85000,
  'Hasanuddin' => 70000,
  'Inanwatan' => 90000,
  'Sultan Iskandar Muda' => 60000
];
// apabila ada post yang dikirim
if ($_POST) {
  // deklarasi variabel untuk setiap input
  $waktu_submit     = time();
  $nama_maskapai    = $_POST['nama_maskapai'];
  $bandara_asal     = $_POST['bandara_asal'];
  $bandara_tujuan   = $_POST['bandara_tujuan'];
  // cek pajak untuk setiap bandara asal dan tujuan
  $pajak_bandara_asal     = $list_pajak_bandara_asal[$bandara_asal];
  $pajak_bandara_tujuan   = $list_pajak_bandara_tujuan[$bandara_tujuan];
  // total pajak, harga tiket dan total harga tiket
  $pajak_total  = $pajak_bandara_asal + $pajak_bandara_tujuan;
  $harga_tiket  = isset($_POST['harga_tiket']) ? ($_POST['harga_tiket'] != '' ? $_POST['harga_tiket'] : 0) : 0;
  $total_harga_tiket  = $harga_tiket + $pajak_total;
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--font link-->
  <link rel="stylesheet" href="style.css">
  <title>Pemesanan Tiket RizqiAirport</title>
</head>

<body>
  <header id="header" class="jumbotron">
    <div class="container py-5">
      <h2 class="text-center" style="color: white;">Pemesanan Rute Penerbangan</h2>
      <h2 class="text-center" style="color: white;">Rizqi Airport</h2>

        <section id="tiket" class="tiket">
          <div class="row">
            <div class="col-md-6 mt-3">
              <div class="card">
                <div class="card-body">
                  <form method="POST">
                    <div class="mb-3">
                     <label for="input-nama-maskapai" class="form-label">Nama Maskapai</label>
                    <input name="nama_maskapai" type="text" class="form-control" id="input-nama-maskapai" placeholder="Nama Maskapai" required>
                       
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-asal" class="form-label">Bandara Asal</label>
                      <select id="input-bandara-asal" name="bandara_asal" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_asal as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="input-bandara-tujuan" class="form-label">Bandara Tujuan</label>
                      <select id="input-bandara-tujuan" name="bandara_tujuan" class="form-select" required>
                        <option value="" selected>Pilih Bandara</option>
                        <?php foreach ($list_pajak_bandara_tujuan as $bandara => $harga) : ?>
                          <option value="<?= $bandara; ?>"><?= $bandara; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="input-harga-tiket" class="form-label">Harga Tiket</label>
                      <input name="harga_tiket" type="number" class="form-control" id="input-harga-tiket" placeholder="Harga Tiket" required>
                    </div>
                    <button class="btn btn-warning w-100">Daftar</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 mt-3">
              <div class="card h-100">
                <div class="card-body">
                  <table class="table table-borderless table-hover my-5">
                    <tbody>
                        <tr>
                          <th scope="row">Nama Maskapai</th>
                          <td>:</td>
                          <td><?= isset($nama_maskapai) ? $nama_maskapai : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Asal Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_asal) ? $bandara_asal : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Tujuan Penerbangan</th>
                          <td>:</td>
                          <td><?= isset($bandara_tujuan) ? $bandara_tujuan : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($harga_tiket) ? 'Rp ' . number_format($harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Pajak</th>
                          <td>:</td>
                          <td><?= isset($pajak_total) ? 'Rp ' . number_format($pajak_total) . ',-' : 'Kosong'; ?></td>
                        </tr>
                        <tr class="border-top">
                          <th scope="row">Total Harga Tiket</th>
                          <td>:</td>
                          <td><?= isset($total_harga_tiket) ? 'Rp ' . number_format($total_harga_tiket) . ',-' : 'Kosong'; ?></td>
                        </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
  </header>

 </html>