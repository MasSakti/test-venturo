<?php
if (isset($_GET['tahun'])) {
    $menu = json_decode(file_get_contents("http://tes-web.landa.id/intermediate/menu"));
    $transaksi = json_decode(file_get_contents("http://tes-web.landa.id/intermediate/transaksi?tahun=" . $_GET['tahun']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>


    <title>TES - Venturo Camp Tahap 2</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2021" selected="">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            <a href="http://tes-web.landa.id/intermediate/menu" target="_blank" rel="Array Menu" class="btn btn-secondary">
                                Json Menu
                            </a>
                            <a href="http://tes-web.landa.id/intermediate/transaksi?tahun=2021" target="_blank" rel="Array Transaksi" class="btn btn-secondary">
                                Json Transaksi
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada 2021
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <th style="text-align: center;width: 75px;">Jan</th>
                                <th style="text-align: center;width: 75px;">Feb</th>
                                <th style="text-align: center;width: 75px;">Mar</th>
                                <th style="text-align: center;width: 75px;">Apr</th>
                                <th style="text-align: center;width: 75px;">Mei</th>
                                <th style="text-align: center;width: 75px;">Jun</th>
                                <th style="text-align: center;width: 75px;">Jul</th>
                                <th style="text-align: center;width: 75px;">Ags</th>
                                <th style="text-align: center;width: 75px;">Sep</th>
                                <th style="text-align: center;width: 75px;">Okt</th>
                                <th style="text-align: center;width: 75px;">Nov</th>
                                <th style="text-align: center;width: 75px;">Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary"><b>Makanan</b></td>
                                <td style="text-align: right;">
                                    <b>130,000</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Nasi Goreng</td>
                                <td style="text-align: right;">
                                    130,000
                                </td>
                                <td style="text-align: right;">
                                    170,000
                                </td>
                                <td style="text-align: right;">
                                    50,000
                                </td>
                                <td style="text-align: right;">
                                    100,000
                                </td>
                                <td style="text-align: right;">
                                </td>
                                <td style="text-align: right;">
                                    65,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    50,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    40,000
                                </td>
                                <td style="text-align: right;">
                                    30,000
                                </td>
                                <td style="text-align: right;"><b>665,000</b></td>
                            </tr>
                            <tr>
                                <td class="table-secondary"><b>Minuman</b></td>
                                <td style="text-align: right;">
                                    <b>130,000</b>
                                </td>
                            </tr>
                            <tr>
                                <td>Teh Hijau</td>
                                <td style="text-align: right;">
                                    60,000
                                </td>
                                <td style="text-align: right;">
                                    70,000
                                </td>
                                <td style="text-align: right;">
                                    90,000
                                </td>
                                <td style="text-align: right;">
                                    190,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    150,000
                                </td>
                                <td style="text-align: right;">
                                    40,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    40,000
                                </td>
                                <td style="text-align: right;">
                                </td>
                                <td style="text-align: right;">
                                    20,000
                                </td>
                                <td style="text-align: right;">
                                    30,000
                                </td>
                                <td style="text-align: right;"><b>710,000</b></td>
                            </tr>
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                <td style="text-align: right;">
                                    <b>469,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>605,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>350,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>604,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>257,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>464,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>228,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>303,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>229,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>169,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>157,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>130,000</b>
                                </td>
                                <td style="text-align: right;"><b>3,965,000</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if (isset($menu)) { ?>

                <div class="row m-3">
                    <div class="col-6">
                        <h4>Isi Json Menu</h4>
                        <pre style="height: 400px; background:#eaeaea;"><?php var_dump($menu) ?></pre>
                    </div>
                    <div class="col-6">
                        <h4>Isi Json Transaksi</h4>
                        <pre style="height: 400px; background:#eaeaea;"><?php var_dump($transaksi) ?></pre>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>