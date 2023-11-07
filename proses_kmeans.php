<?php
include "koneksi.php";

$diabetes = $high_blood_pressure = $smoking = $output_err ="";

// Query data from SQL
$sql = "SELECT diabetes, high_blood_pressure, smoking FROM probabi";
$result = mysqli_query($koneksi, $sql);

// Ambil nilai centroid awal dari database

$query = "SELECT dbt, hbp, smk FROM user WHERE id IN ('3', '4')";
$centroid = mysqli_query($koneksi, $query);

$row1 = mysqli_fetch_assoc($centroid);
$c1 = array($row1['dbt'], $row1['hbp'], $row1['smk']);

$row2 = mysqli_fetch_assoc($centroid);
$c2 = array($row2['dbt'], $row2['hbp'], $row2['smk']);


// Inisialisasi variabel hasil iterasi sebelumnya
$prev_count_c1 = 0;
$prev_count_c2 = 0;

// Inisialisasi variabel jumlah dekat dengan cluster 1 dan cluster 2
$count_c1 = 0;
$count_c2 = 0;

while ($count_c1 != $prev_count_c1 || $count_c2 != $prev_count_c2) {
    // Simpan hasil iterasi saat ini ke variabel hasil iterasi sebelumnya
    $prev_count_c1 = $count_c1;
    $prev_count_c2 = $count_c2;

    // Reset variabel jumlah dekat dengan cluster 1 dan cluster 2
    $count_c1 = 0;
    $count_c2 = 0;

    // Reset nilai centroid baru untuk masing-masing cluster
    $new_c1 = array(0, 0, 0);
    $new_c2 = array(0, 0, 0);

    // Lakukan iterasi untuk setiap baris
    while ($row = $result->fetch_assoc()) {
        // Ambil nilai diabetes, high_blood_pressure, dan smoking dari setiap baris
        $diabetes = $row['diabetes'];
        $high_blood_pressure = $row['high_blood_pressure'];
        $smoking = $row['smoking'];
        
        // Hitung jarak dari setiap baris ke centroid c1 dan c2
        $jarak_c1 = sqrt(pow(($diabetes - $c1[0]), 2) + pow(($high_blood_pressure - $c1[1]), 2) + pow(($smoking - $c1[2]), 2));
        $jarak_c2 = sqrt(pow(($diabetes - $c2[0]), 2) + pow(($high_blood_pressure - $c2[1]), 2) + pow(($smoking - $c2[2]), 2));

        // Tentukan cluster yang lebih dekat berdasarkan jarak terpendek
        if ($jarak_c1 < $jarak_c2) {
            $count_c1++;
            // Tambahkan nilai diabetes, high_blood_pressure, dan smoking ke centroid baru untuk cluster 1
            $new_c1[0] += $diabetes;
            $new_c1[1] += $high_blood_pressure;
            $new_c1[2] += $smoking;
        } else {
            $count_c2++;
            // Tambahkan nilai diabetes, high_blood_pressure,dan smoking ke centroid baru untuk cluster 2
            $new_c2[0] += $diabetes;
            $new_c2[1] += $high_blood_pressure;
            $new_c2[2] += $smoking;
        }
    }

    // Hitung centroid baru untuk masing-masing cluster
    if ($count_c1 != 0) {
        $new_c1[0] /= $count_c1;
        $new_c1[1] /= $count_c1;
        $new_c1[2] /= $count_c1;
    }
    if ($count_c2 != 0) {
        $new_c2[0] /= $count_c2;
        $new_c2[1] /= $count_c2;
        $new_c2[2] /= $count_c2;
    }

// Assign nilai centroid baru ke centroid awal
$c1 = $new_c1;
$c2 = $new_c2;

// update centroid ke database

$query = "UPDATE user SET dbt = '".$c1[0]."', hbp = '".$c1[1]."', smk = '".$c1[2]."' WHERE id = '3';
          UPDATE user SET dbt = '".$c2[0]."', hbp = '".$c2[1]."', smk = '".$c2[2]."' WHERE id = '4';";

mysqli_multi_query($koneksi, $query);

}
// Menerima input dari user
    $diabetes_input = $_POST["diabetes"];
    $hbp_input = $_POST["high_blood_pressure"];
    $smk_input = $_POST["smoking"];

// Tentukan cluster input dari user berdasarkan jarak terpendek ke centroid c1 dan c2
$jarak_c1_input = sqrt(pow(($diabetes_input - $c1[0]), 2) + pow(($hbp_input - $c1[0]), 2) + pow(($smk_input - $c1[0]), 2));
$jarak_c2_input = sqrt(pow(($diabetes_input - $c2[0]), 2) + pow(($hbp_input - $c2[0]), 2) + pow(($smk_input - $c2[0]), 2));


if ($jarak_c1_input > $jarak_c2_input) {
echo "<script>document.getElementById('output').innerHTML = 'No Heart Failure';</script>";
} else {
echo "<script>document.getElementById('output').innerHTML = 'Heart Failure';</script>";
}

?>