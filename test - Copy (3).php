<?php
if (isset($_GET['tahun'])) {
    $json_menu = file_get_contents("http://tes-web.landa.id/intermediate/menu");
    $json_data = file_get_contents("http://tes-web.landa.id/intermediate/transaksi?tahun=" . $_GET['tahun']);
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


    <title>Venturo Pivot Table</title>
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
                                    <option value="2021">2021</option>
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
                <?php
                $namaBulan = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                ?>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;"><?= $_GET['tahun']; ?>
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <?php for ($i = 0; $i < count($namaBulan); $i++) { ?>
                                    <th style="text-align: center;width: 75px;"><?= $namaBulan[$i]; ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalHasil = 0;
                            $totalMakanan = 0;
                            $totalMinuman = 0;
                            $transaksi = json_decode($json_data, true);
                            $totals = [];
                            $monthly = [];
                            $testMonthly = [];
                            $monthlyTotal = [];
                            $categoryTotal = [];
                            $menus = json_decode($json_menu, true);
                            // $merge = json_encode(
                            //     array_merge(
                            //         json_decode($json_menu, true),
                            //         json_decode($json_data, true)
                            //     )
                            // );
                            foreach ($transaksi as $row) {
                                $datemonth = date('M', strtotime($row['tanggal']));
                                // Set defaults to suppress notices
                                $totals[$row['menu']] = isset($totals[$row['menu']]) ? $totals[$row['menu']] : 0;
                                $monthly[$row['menu']][$datemonth] = isset($monthly[$row['menu']][$datemonth]) ? $monthly[$row['menu']][$datemonth] : 0;
                                $monthlyTotal[$datemonth] = isset($monthlyTotal[$datemonth]) ? $monthlyTotal[$datemonth] : 0;
                                //$category[$value['kategori']][$row['menu']][$datemonth] = isset($category[$value['kategori']][$row['menu']][$datemonth]) ? $category[$value['kategori']][$row['menu']][$datemonth] : 0;
                                // $testMonthly[$row['menu']][$datemonth] = isset($testMonthly[$row['menu']][$datemonth]) ? $testMonthly[$row['menu']][$datemonth] : 0;

                                $totals[$row['menu']] += $row['total'];
                                $monthly[$row['menu']][$datemonth] += $row['total'];
                                $monthlyTotal[$datemonth] += $row['total'];
                                // $categoryTotal[$value['kategori']][$datemonth] += $row['total'];

                                foreach ($menus as $value) {
                                    // $testMonthly[$datemonth][$row['menu']] += $row['total'];

                                    if ($value['kategori'] == 'makanan' && $value['menu'] == $row['menu']) {
                                        $dataMakanan[$value['kategori']][$datemonth] = isset($dataMakanan[$value['kategori']][$datemonth]) ? $dataMakanan[$value['kategori']][$datemonth] : 0;
                                        $dataMakanan[$value['kategori']][$datemonth] += $row['total'];
                                    }
                                    if ($value['kategori'] == 'minuman' && $value['menu'] == $row['menu']) {
                                        $dataMinuman[$value['kategori']][$datemonth] = isset($dataMinuman[$value['kategori']][$datemonth]) ? $dataMinuman[$value['kategori']][$datemonth] : 0;
                                        $dataMinuman[$value['kategori']][$datemonth] += $row['total'];
                                    }
                                }
                            }

                            // echo '<pre>' . var_export($monthly, true) . '</pre>';
                            // echo '<pre>' . var_export($dataMakanan, true) . '</pre>';
                            // echo '<pre>' . var_export($dataMinuman, true) . '</pre>';

                            // $dataMenu = [];
                            // foreach ($menus as $value) {
                            //     $dataMenu[$value['menu']] = $value;
                            // }
                            // foreach ($dataMenu as $value) {
                            //     foreach ($transaksi as $row) {
                            //         $datemonth = date('M', strtotime($row['tanggal']));
                            //         $dataMenu[$value->menu]->bulan = (isset($data[$value->menu]['bulan'])) ? $data[$value->menu]['bulan'] : [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                            //         $dataMenu[$value->menu]->total_kanan = (isset($data[$value->menu]['total_kanan'])) ? $data[$value->menu]['total_kanan'] : 0;

                            //         if ($value['kategori'] == 'makanan') {
                            //             $dataMakanan[$value['kategori']][$value['menu']][$datemonth] += $row['total'];
                            //         }
                            //         if ($value['kategori'] == 'minuman') {
                            //             $dataMinuman[$value['kategori']][$value['menu']][$datemonth] += $row['total'];
                            //         }
                            //         echo '<pre>' . var_export($row, true) . '</pre>';
                            //     }
                            // }

                            // echo '<pre>' . var_export($dataMakanan, true) . '</pre>';
                            // echo '<pre>' . var_export($dataMinuman, true) . '</pre>';

                            // echo '<pre>' . var_export($totals, true) . '</pre>';
                            // echo '<pre>' . var_export($monthlyTotal, true) . '</pre>';
                            // echo '<pre>' . var_export($category, true) . '</pre>';

                            ?>

                            <?php if (count($menus) != 0) { ?>
                                <?php foreach ($menus as $value) { ?>
                                    <td><?= $value['menu']; ?></td>
                                    <?php for ($i = 0; $i < count($namaBulan); $i++) { ?>
                                        <td style="text-align: right;">
                                            <?= isset($monthly[$value['menu']][$namaBulan[$i]]) ? $monthly[$value['menu']][$namaBulan[$i]] : ""; ?>
                                        </td>
                                    <?php } ?>
                                    <td style="text-align: right;"><b><?= isset($totals[$value['menu']]) ? $totals[$value['menu']] : 0; ?></b></td>
                                    </tr>
                                <?php } ?>

                            <?php } ?>
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                <?php
                                for ($i = 0; $i < count($namaBulan); $i++) {
                                    $totalHasil += isset($monthlyTotal[$namaBulan[$i]]) ? $monthlyTotal[$namaBulan[$i]] : 0;;
                                ?>
                                    <td style="text-align: right;">
                                        <b><?= isset($monthlyTotal[$namaBulan[$i]]) ? $monthlyTotal[$namaBulan[$i]] : ""; ?></b>
                                    </td>
                                <?php } ?>
                                <td style="text-align: right;"><b><?= $totalHasil; ?></b></td>
                            </tr>

                            <tr>
                                <td class="table-secondary"><b>Makanan</b></td>
                                <?php for ($i = 0; $i < count($namaBulan); $i++) {
                                    $totalMakanan += isset($dataMakanan['makanan'][$namaBulan[$i]]) ? $dataMakanan['makanan'][$namaBulan[$i]] : 0;;
                                ?>
                                    <td class="table-secondary" style="text-align: right;">
                                        <b><?= isset($dataMakanan['makanan'][$namaBulan[$i]]) ? $dataMakanan['makanan'][$namaBulan[$i]] : ""; ?></b>
                                    </td>
                                <?php } ?>
                                <td class="table-secondary" style="text-align: right;"><b><?= $totalMakanan; ?></b></td>
                            </tr>
                            <tr>
                                <td class="table-secondary"><b>Minuman</b></td>
                                <?php for ($i = 0; $i < count($namaBulan); $i++) {
                                    $totalMinuman += isset($dataMinuman['minuman'][$namaBulan[$i]]) ? $dataMinuman['minuman'][$namaBulan[$i]] : 0;;
                                ?>
                                    <td class="table-secondary" style="text-align: right;">
                                        <b><?= isset($dataMinuman['minuman'][$namaBulan[$i]]) ? $dataMinuman['minuman'][$namaBulan[$i]] : ""; ?></b>
                                    </td>
                                <?php } ?>
                                <td class="table-secondary" style="text-align: right;"><b><?= $totalMinuman; ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>