<?php
// koneksi ke database
include "koneksi.php";

// mengambil data dari tabel
$sql = "SELECT diabetes, high_blood_pressure, smoking, heart_failure FROM probabi";
$result = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_assoc($result)) {

// menghitung total data output 1, output 0, dan seluruh banyaknya data
$yes=0;
$no=0;
$total=0;
foreach ($result as $row){
    if ($row['heart_failure'] == '1'){
        $yes++;
    }else if ($row['heart_failure'] == '0'){
        $no++;
    }
}
$total=$yes + $no;
}

// inisialisasi variabel
$coba_satu = $coba_dua = $coba_tiga = $coba_empat = $coba_lima = $coba_enam = $coba_tujuh = $coba_delapan = $coba_sembilan = 
$coba_sepuluh = $coba_sebelas = $coba_duabelas = $coba_tigabelas = $coba_empatbelas = $coba_limabelas = $coba_enambelas =
$satu = $dua = $tiga = $empat = $lima = $enam = $tujuh = $delapan = "";

// menghitung banyakanya kemungkinan untuk output 1
foreach ($result as $row){
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1' && $row['heart_failure'] == '1'){
        $coba_satu++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0' && $row['heart_failure'] == '1'){
        $coba_dua++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0' && $row['heart_failure'] == '1'){
        $coba_tiga++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1' && $row['heart_failure'] == '1'){
        $coba_empat++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0' && $row['heart_failure'] == '1'){
        $coba_lima++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1' && $row['heart_failure'] == '1'){
        $coba_enam++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1' && $row['heart_failure'] == '1'){
        $coba_tujuh++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0' && $row['heart_failure'] == '1'){
        $coba_delapan++;
    }

// menghitung banyaknya kemungkinan untuk output 0
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1' && $row['heart_failure'] == '0'){
        $coba_sembilan++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0' && $row['heart_failure'] == '0'){
        $coba_sepuluh++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0' && $row['heart_failure'] == '0'){
        $coba_sebelas++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1' && $row['heart_failure'] == '0'){
        $coba_duabelas++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0' && $row['heart_failure'] == '0'){
        $coba_tigabelas++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1' && $row['heart_failure'] == '0'){
        $coba_empatbelas++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1' && $row['heart_failure'] == '0'){
        $coba_limabelas++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0' && $row['heart_failure'] == '0'){
        $coba_enambelas++;
    }
}

// menghitung kemungkinan tanpa output
foreach ($result as $row){
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1'){
        $satu++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0'){
        $dua++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0'){
        $tiga++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1'){
        $empat++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '0'){
        $lima++;
    }
    if ($row['diabetes'] == '1' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '1'){
        $enam++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '1' && $row['smoking'] == '1'){
        $tujuh++;
    }
    if ($row['diabetes'] == '0' && $row['high_blood_pressure'] == '0' && $row['smoking'] == '0'){
        $delapan++;
    }

}

// Menerima input dari user
$diabetes_input = $_POST["diabetes"];
$hbp_input = $_POST["high_blood_pressure"];
$smk_input = $_POST["smoking"];
$hf_input = $_POST["heart_failure"];


// menghitung pba output1
$satu_yes = $coba_satu / $yes;
$dua_yes = $coba_dua / $yes;
$tiga_yes = $coba_tiga / $yes;
$empat_yes = $coba_empat / $yes;
$lima_yes = $coba_lima / $yes;
$enam_yes = $coba_enam / $yes;
$tujuh_yes = $coba_tujuh / $yes;
$delapan_yes = $coba_delapan / $yes;

// menghitung pba output0
$satu_no = $coba_sembilan / $no;
$dua_no = $coba_sepuluh / $no;
$tiga_no = $coba_sebelas / $no;
$empat_no = $coba_duabelas / $no;
$lima_no = $coba_tigabelas / $no;
$enam_no = $coba_empatbelas / $no;
$tujuh_no = $coba_limabelas / $no;
$delapan_no = $coba_enambelas / $no;

// menghitung PA output 1
$pa1=$satu/$yes;
$pa2=$dua/$yes;
$pa3=$tiga/$yes;
$pa4=$empat/$yes;
$pa5=$lima/$yes;
$pa6=$enam/$yes;
$pa7=$tujuh/$yes;
$pa8=$delapan/$yes;

// menghiung PA output 0
$pa9=$satu/$no;
$pa10=$dua/$no;
$pa11=$tiga/$no;
$pa12=$empat/$no;
$pa13=$lima/$no;
$pa14=$enam/$no;
$pa15=$tujuh/$no;
$pa16=$delapan/$no;

// variabel pembilang 1
$pembilang1 = $satu_yes * $pa1;
$pembilang2 = $dua_yes * $pa2;
$pembilang3 = $tiga_yes * $pa3;
$pembilang4 = $empat_yes * $pa4;
$pembilang5 = $lima_yes * $pa5;
$pembilang6 = $enam_yes * $pa6;
$pembilang7 = $tujuh_yes * $pa7;
$pembilang8 = $delapan_yes * $pa8;

// variabel pembilang 0
$pembilang9 = $satu_no * $pa9;
$pembilang10 = $dua_no * $pa10;
$pembilang11 = $tiga_no * $pa11;
$pembilang12 = $empat_no * $pa12;
$pembilang13 = $lima_no * $pa13;
$pembilang14 = $enam_no * $pa14;
$pembilang15 = $tujuh_no * $pa15;
$pembilang16 = $delapan_no * $pa16;

// output 1 dengan inputan user
    if ($diabetes_input == '1' && $hbp_input == '1' && $smk_input == '1' && $hf_input == '1'){
        $hasil = ($pembilang1 /( $pembilang1 + $pa1*$satu_no))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '0' && $smk_input == '0' && $hf_input == '1'){
        $hasil = ($pembilang2 /( $pembilang2 + $pa2*$dua_no))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '1' && $smk_input == '0' && $hf_input == '1'){
        $hasil = ($pembilang3 /( $pembilang3 + $pa3*$tiga_no))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '0' && $smk_input == '1' && $hf_input == '1'){
        $hasil = ($pembilang4 /( $pembilang4 + $pa4*$empat_no))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '1' && $smk_input == '0' && $hf_input == '1'){
        $hasil = ($pembilang5 /( $pembilang5 + $pa5*$lima_no))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '0' && $smk_input == '1' && $hf_input == '1'){
        $hasil = ($pembilang6/( $pembilang6 + $pa6*$enam_no))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '1' && $smk_input == '1' && $hf_input == '1'){
        $hasil = ($pembilang7/ ($pembilang7 + $pa7 * $tujuh_no))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '0' && $smk_input == '0' && $hf_input == '1'){
        $hasil = ($pembilang8 / ($pembilang8 + $pa8 * $delapan_no))*100;
    }
// output 0 dengan inputan user
    if ($diabetes_input == '1' && $hbp_input == '1' && $smk_input == '1' && $hf_input == '0'){
        $hasil = ($pembilang9 / ($pembilang9 + $pa9 * $satu_yes))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '0' && $smk_input == '0' && $hf_input == '0'){
        $hasil = ($pembilang10 / ($pembilang10 + $pa10 * $dua_yes))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '1' && $smk_input == '0' && $hf_input == '0'){
        $hasil = ($pembilang11/ ($pembilang11 + $pa11 * $tiga_yes))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '0' && $smk_input == '1' && $hf_input == '0'){
        $hasil = ($pembilang12/ ($pembilang12 + $pa12 * $empat_yes))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '1' && $smk_input == '0' && $hf_input == '0'){
        $hasil = ($pembilang13/ ($pembilang13 + $pa13 * $lima_yes))*100;
    }
    if ($diabetes_input == '1' && $hbp_input == '0' && $smk_input == '1' && $hf_input == '0'){
        $hasil = ($pembilang14/ ($pembilang14 + $pa14 * $enam_yes))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '1' && $smk_input == '1' && $hf_input == '0'){
        $hasil = ($pembilang15/ ($pembilang15 + $pa15 * $tujuh_yes))*100;
    }
    if ($diabetes_input == '0' && $hbp_input == '0' && $smk_input == '0' && $hf_input == '0'){
        $hasil = ($pembilang16/ ($pembilang16 + $pa16 * $delapan_yes))*100;
    }

echo "<script>document.getElementById('output').innerHTML = '".number_format($hasil, 0)." %';</script>";

?>