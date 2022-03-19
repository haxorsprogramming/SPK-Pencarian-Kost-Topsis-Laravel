<?php
//Bobot
$W1 = $fasilitas;
$W2 = $harga;
$W3 = $keamanan;
$W4 = $kenyamanan;
$W5 = $ukuran;
$W6 = $jarak;
$W7 = $kebersihan;
$W8 = $tempat;

function pembagiNM($matrik)
{
    for ($i = 0; $i < 8; $i++) {
        $pangkatdua[$i] = 0;
        for ($j = 0; $j < sizeof($matrik); $j++) {
            $pangkatdua[$i] = $pangkatdua[$i] + pow($matrik[$j][$i], 2);
        }
        $pembagi[$i] = sqrt($pangkatdua[$i]);
    }
    return $pembagi;
}

//Normalisasi
function Transpose($squareArray)
{

    if ($squareArray == null) {
        return null;
    }
    $rotatedArray = array();
    $r = 0;

    foreach ($squareArray as $row) {
        $c = 0;
        if (is_array($row)) {
            foreach ($row as $cell) {
                $rotatedArray[$c][$r] = $cell;
                ++$c;
            }
        } else $rotatedArray[$c][$r] = $row;
        ++$r;
    }
    return $rotatedArray;
}

function JarakIplus($aplus, $bob)
{
    for ($i = 0; $i < sizeof($bob); $i++) {
        $dplus[$i] = 0;
        for ($j = 0; $j < sizeof($aplus); $j++) {
            $dplus[$i] = $dplus[$i] + pow(($aplus[$j] - $bob[$i][$j]), 2);
        }
        $dplus[$i] = round(sqrt($dplus[$i]), 4);
    }
    return $dplus;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="features">
        <div class="container">
            <div style="text-align: center;margin-bottom:15px;">
                <h2>Hasil perhitungan Topsis</h2>
                <h4>Nama Pencari Kost : {{ $nama }}</h4>
            </div>
            <h4>Analisa Matrix</h4>
            <table id="table_id" class="table table-bordered" style="width:100%">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>No </center>
                        </th>
                        <th>
                            <center>Alternatif</center>
                        </th>
                        <th>
                            <center>C1 (Cost)</center>
                        </th>
                        <th>
                            <center>C2 (Benefit)</center>
                        </th>
                        <th>
                            <center>C3 (Benefit)</center>
                        </th>
                        <th>
                            <center>C4 (Benefit)</center>
                        </th>
                        <th>
                            <center>C5 (Benefit)</center>
                        </th>
                        <th>
                            <center>C6 (Benefit)</center>
                        </th>
                        <th>
                            <center>C7 (Benefit)</center>
                        </th>
                        <th>
                            <center>C8 (Benefit)</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($kost as $dh) :
                        $Matrik[$no - 1] = array($dh['fasilitas_angka'], $dh['harga_angka'], $dh['keamanan_angka'], $dh['kenyamanan_angka'], $dh['ukuran_angka'], $dh['jarak_angka'], $dh['kebersihan_angka'], $dh['tempat_angka']);
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>A<?= $no; ?></td>
                            <td><?= $dh['fasilitas_angka']; ?></td>
                            <td><?= $dh['harga_angka']; ?></td>
                            <td><?= $dh['keamanan_angka']; ?></td>
                            <td><?= $dh['kenyamanan_angka']; ?></td>
                            <td><?= $dh['ukuran_angka']; ?></td>
                            <td><?= $dh['jarak_angka']; ?></td>
                            <td><?= $dh['kebersihan_angka']; ?></td>
                            <td><?= $dh['tempat_angka']; ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <hr />
            <h4>Matriks Ternormalisasi R</h4>
            <table id="table_id" class="table table-bordered" style="width:100%">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>No </center>
                        </th>
                        <th>
                            <center>Alternatif</center>
                        </th>
                        <th>
                            <center>C1 (Cost)</center>
                        </th>
                        <th>
                            <center>C2 (Benefit)</center>
                        </th>
                        <th>
                            <center>C3 (Benefit)</center>
                        </th>
                        <th>
                            <center>C4 (Benefit)</center>
                        </th>
                        <th>
                            <center>C5 (Benefit)</center>
                        </th>
                        <th>
                            <center>C6 (Benefit)</center>
                        </th>
                        <th>
                            <center>C7 (Benefit)</center>
                        </th>
                        <th>
                            <center>C8 (Benefit)</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $pembagiNM = pembagiNM($Matrik);
                    foreach ($kost as $dh) :
                        $MatrikNormalisasi[$no - 1] = array($dh['fasilitas_angka'] / $pembagiNM[0], $dh['harga_angka'] / $pembagiNM[1], $dh['keamanan_angka'] / $pembagiNM[2], $dh['kenyamanan_angka'] / $pembagiNM[3], $dh['ukuran_angka'] / $pembagiNM[4], $dh['jarak_angka'] / $pembagiNM[5], $dh['kebersihan_angka'] / $pembagiNM[6], $dh['tempat_angka'] / $pembagiNM[7]);
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>A<?= $no; ?></td>
                            <td><?= round($dh['fasilitas_angka'] / $pembagiNM[0], 6); ?></td>
                            <td><?= round($dh['harga_angka'] / $pembagiNM[1], 6); ?></td>
                            <td><?= round($dh['keamanan_angka'] / $pembagiNM[2], 6); ?></td>
                            <td><?= round($dh['kenyamanan_angka'] / $pembagiNM[3], 6); ?></td>
                            <td><?= round($dh['ukuran_angka'] / $pembagiNM[4], 6); ?></td>
                            <td><?= round($dh['jarak_angka'] / $pembagiNM[5], 6); ?></td>
                            <td><?= round($dh['kebersihan_angka'] / $pembagiNM[6], 6); ?></td>
                            <td><?= round($dh['tempat_angka'] / $pembagiNM[7], 6); ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <hr />
            <h4>Bobot (W)</h4>
            <table id="table_id" class="table table-bordered" style="width:100%">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>Value kriteria Fasilitas</center>
                        </th>
                        <th>
                            <center>Value kriteria Harga</center>
                        </th>
                        <th>
                            <center>Value kriteria Keamanan</center>
                        </th>
                        <th>
                            <center>Value kriteria Kenyamanan</center>
                        </th>
                        <th>
                            <center>Value kriteria Ukuran</center>
                        </th>
                        <th>
                            <center>Value kriteria Jarak</center>
                        </th>
                        <th>
                            <center>Value kriteria Kebersihan</center>
                        </th>
                        <th>
                            <center>Value kriteria Tempat</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <center><?php echo ($W1); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W2); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W3); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W4); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W5); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W6); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W7); ?></center>
                        </td>
                        <td>
                            <center><?php echo ($W8); ?></center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <h4>Matriks Ternormalisasi Terbobot Y</h4>
            <table id="" class="table table-bordered" style="width:100%">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>No </center>
                        </th>
                        <th>
                            <center>Alternatif</center>
                        </th>
                        <th>
                            <center>C1 (Cost)</center>
                        </th>
                        <th>
                            <center>C2 (Benefit)</center>
                        </th>
                        <th>
                            <center>C3 (Benefit)</center>
                        </th>
                        <th>
                            <center>C4 (Benefit)</center>
                        </th>
                        <th>
                            <center>C5 (Benefit)</center>
                        </th>
                        <th>
                            <center>C6 (Benefit)</center>
                        </th>
                        <th>
                            <center>C7 (Benefit)</center>
                        </th>
                        <th>
                            <center>C8 (Benefit)</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $pembagiNM = pembagiNM($Matrik);
                    foreach ($kost as $dh) :
                        $NormalisasiBobot[$no - 1] = array($MatrikNormalisasi[$no - 1][0] * $W1, $MatrikNormalisasi[$no - 1][1] * $W2, $MatrikNormalisasi[$no - 1][2] * $W3, $MatrikNormalisasi[$no - 1][3] * $W4, $MatrikNormalisasi[$no - 1][4] * $W5, $MatrikNormalisasi[$no - 1][5] * $W6, $MatrikNormalisasi[$no - 1][6] * $W7, $MatrikNormalisasi[$no - 1][7] * $W8);
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td>A<?= $no; ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][0] * $W1, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][1] * $W2, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][2] * $W3, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][3] * $W4, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][4] * $W5, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][5] * $W6, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][6] * $W7, 6); ?></td>
                            <td><?= round($MatrikNormalisasi[$no - 1][7] * $W8, 6); ?></td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <hr />
            <h4>Matrik Solusi ideal positif "A+" dan negatif "A-"</h4>
            <table class="table table-bordered">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center></center>
                        </th>
                        <th>
                            <center>Y1 (Cost)</center>
                        </th>
                        <th>
                            <center>Y2 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y3 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y4 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y5 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y6 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y7 (Benefit)</center>
                        </th>
                        <th>
                            <center>Y8 (Benefit)</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $NormalisasiBobotTrans = Transpose($NormalisasiBobot);
                    ?>
                    <tr>
                        <?php
                        $idealpositif = array(min($NormalisasiBobotTrans[0]), max($NormalisasiBobotTrans[1]), max($NormalisasiBobotTrans[2]), max($NormalisasiBobotTrans[3]), max($NormalisasiBobotTrans[4]), max($NormalisasiBobotTrans[5]), max($NormalisasiBobotTrans[6]));
                        ?>
                        <td>
                            <center><?php echo "Y+" ?> </center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[0]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[1]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[2]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[3]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[4]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[5]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[6]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[7]), 6)); ?>&nbsp(max)</center>
                        </td>
                    </tr>
                    <tr>
                        <?php
                        $idealnegatif = array(max($NormalisasiBobotTrans[0]), min($NormalisasiBobotTrans[1]), min($NormalisasiBobotTrans[2]), min($NormalisasiBobotTrans[3]), min($NormalisasiBobotTrans[4]), min($NormalisasiBobotTrans[5]), min($NormalisasiBobotTrans[6], min($NormalisasiBobotTrans[7])));
                        ?>
                        <td>
                            <center><?php echo "Y-" ?> </center>
                        </td>
                        <td>
                            <center><?php echo (round(max($NormalisasiBobotTrans[0]), 6)); ?>&nbsp(max)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[1]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[2]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[3]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[4]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[5]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[6]), 6)); ?>&nbsp(min)</center>
                        </td>
                        <td>
                            <center><?php echo (round(min($NormalisasiBobotTrans[7]), 6)); ?>&nbsp(min)</center>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr />
            <h4>Jarak antara nilai terbobot setiap alternatif terhadap solusi ideal positif </h4>
            <table class="table table-bordered">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>D+</center>
                        </th>
                        <th>
                            <center></center>
                        </th>
                        <th>
                            <center>D-</center>
                        </th>
                        <th>
                            <center></center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $Dplus = JarakIplus($idealpositif, $NormalisasiBobot);
                    $Dmin = JarakIplus($idealnegatif, $NormalisasiBobot);
                    foreach ($kost as $dh) :
                    ?>
                        <tr>
                            <td>
                                <center><?php echo "D", $no ?></center>
                            </td>
                            <td>
                                <center><?php echo round($Dplus[$no - 1], 6) ?></center>
                            </td>
                            <td>
                                <center><?php echo "D", $no ?></center>
                            </td>
                            <td>
                                <center><?php echo round($Dmin[$no - 1], 6) ?></center>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach;
                    ?>
                </tbody>
            </table>
            <hr />
            <h4>Nilai Preferensi untuk Setiap alternatif (V)</h4>
            <table class="table table-bordered">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>Nilai Preferensi "V"</center>
                        </th>
                        <th>
                            <center>Nilai</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $nilaiV = array();
                    foreach ($kost as $dh) :
                        array_push($nilaiV, $Dmin[$no - 1] / ($Dmin[$no - 1] + $Dplus[$no - 1]));
                    ?>
                        <tr>
                            <td>
                                <center><?php echo "V", $no ?> (<?= $dh['nama_kost']; ?>)</center>
                            </td>
                            <td>
                                <center><?php echo $Dmin[$no - 1] / ($Dmin[$no - 1] + $Dplus[$no - 1]); ?></center>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
            <hr />
            <h4>Nilai Preferensi tertinggi</h4>
            <table class="table table-bordered">
                <thead style="border-top: 1px solid #d0d0d0;">
                    <tr>
                        <th>
                            <center>Nilai Preferensi tertinggi</center>
                        </th>
                        <th></th>
                        <th>
                            <center>Alternatif Kost terpilih</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $testmax = max($nilaiV);
                        $namaKost = "";
                        for ($i = 0; $i < count($nilaiV); $i++) {
                            if ($nilaiV[$i] == $testmax) {
                                $kk = $i + 1;
                                $qGetRank = DB::table('tbl_k_kost')->where('ordinal', $kk)->first();
                                // dd($qGetRank);
                                $namaKost = $qGetRank->nama_kost;
                        ?>
                                <td>
                                    <center><?php echo "V" . ($i + 1); ?></center>
                                </td>
                                <td>
                                    <center><?php echo $nilaiV[$i]; ?></center>
                                </td>


                                <td>
                                    <center><b>{{ $qGetRank -> nama_kost }}</b></center>
                                </td>
                        <?php

                            }
                        } ?>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="text-align: center;margin-bottom:15px;margin-top:25px;">
            <h4>Hasil rekomendasi pemilihan Tempat Kost</h4>
            <h2>"{{ $namaKost }}"</h2>
        </div>
    </div>
</body>

</html>