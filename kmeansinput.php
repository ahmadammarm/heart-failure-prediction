<?php
// koneksi ke database
include "koneksi.php";

// mengambil data dari tabel
$sql = "SELECT heart_failure, kmeans FROM testing";
$result = mysqli_query($koneksi, $sql);

// inisialisasi variabel confusion matrix
$tp = $tn = $fp = $fn = 0;

// menghitung confusion matrix
foreach ($result as $row) {
  $actual = $row['heart_failure'];
  $predicted = $row['kmeans'];

  if($actual =='1' && $predicted == '1') $tp++;
  if($actual == '0'&& $predicted == '0') $tn++;
  if($actual == '1' && $predicted == '0') $fn++;
  if($actual == '0' && $predicted == '1') $fp++;
}
  // menghitung presisi
  $presisi = ($tp/($tp+$fp))*100;

  // menghitung recall
  $recal = ($tp / ($tp+$fn))*100;

  // menghitung akurasi
  $accuracy = (($tp + $tn)/($tp+$fp+$fn+$tn))*100;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/bootstrap.bundle.js">
    <title>K-Means</title>
    <style>
        body{
            background-image: url(img/wave-haikei.svg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container{
            position: relative;
            margin-top: 2rem;
            justify-content: center;
            align-items: center;
			width: 800px;
        }input{
            height: 30px;
        }
		.back {
            padding: 1rem;
            display: flex;
            justify-content: right;
		}.submit{
            display: block;
            height: auto;
            background-color: rgb(0,180,255);
            color: white;
        }.back{
            display: block;
            height: auto;
        }.back1{
            background-color: tomato;
            color: white;
            height: 1cm;
        }
        .judul{
            color: rgb(0,180,255);
        }.prediksi{
            margin top: 2rem;
        }.prediction{
            font-size: 20px;
        }.font-bold{
            font-weight: 700;
            font-family: 'Roboto Condensed', sans-serif;
        }
        .back1:hover {
            border: 1px solid red;
            color: red;
        }
        .submit:hover {
            border: 1px solid #0099ff;
            color: #0099ff;
        }
        .table-danger {
            border: 1px solid #000;
        }
        .table-primary {
            border: 1px solid #000;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
            <h1 class="font-bold mb-3 judul text-center">Heart Failure Prediction</h1>
			<form method="POST" action="kmeansinput.php">
                <div style="display: inline-flex">
                <label class="mb-2 font font-bold" for="diabetes" style="margin-left: 3rem;">Diabetes</label>
                <label class="mb-2 font font-bold" for="high_blood_pressure" style="margin-left: 18rem;">High Blood Pressure</label>
                </div>
				
                <div style="display: inline-flex">
                <select class="form-select" type="text" id="diabetes" name="diabetes" style="width: 300px; margin-left: 3rem;">
                    <option>0</option>
                    <option>1</option>
                </select>
                <select class="form-select" type="text" id="high_blood_pressure" name="high_blood_pressure" style="width: 300px; margin-left: 3rem;">
                    <option>0</option>
                    <option>1</option>
                </select>
                </div>

                <div class="div">
                <label class="mb-2 font font-bold" for="smoking" style="margin-left: 3rem;">Smoking</label>
                <select class="form-select" type="text" id="smoking" name="smoking" style="width: 300px; margin-left: 3rem;">
                    <option>0</option>
                    <option>1</option>
                </select><br>
                </div>
                <div style="display: inline-flex;">
				    <input class="btn submit font" type="submit" value="Submit" style="margin-left: 3rem;">
				</div> 
                <div>
                <label class="mb-2 font font-bold" style="margin-left: 28rem; margin-top:rem; font-style: italic; font-size: 13px;">*Information : 0 for No & 1 for Yes</label>
                </div>
            </form>
            </div>
        </div> <br>
        <div class="card shadow" style="margin-bottom: 2rem;">
        <label class="mb-2 font prediction font-bold" style="margin-left: 4rem; margin-top:1rem;">Prediction :</label>
        <span class="border border-1 border-dark rounded" style="height: 30px; width: 250px; margin-left: 4rem;">
        <p class="font-bold" style="margin-left: 1rem;" id="output"></p>
        </span>
        
        <div style="display: inline-flex; margin-bottom: 2rem;">
        <a href="home.php"><input class="btn back1 font" style="margin-left: 30rem;"type="back" value="Back"></a>
        </div>
        </div>

<!-- confusion matriks -->

<table class="table table-bordered border-dark">
  <thead>
    <tr>
      <th scope="col">Confusion Matriks</th>
      <th scope="col" colspan="2" class="table-primary">Predicted</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="table-danger">Actual</th>
      <th >Heart Failure</th>
      <th>No Heart Failure</th>
    </tr>
    <tr>
      <th scope="row">Heart Failure</th>
      <td><?=$tp?></td>
      <td><?=$fn?></td>
    </tr>
    <tr>
      <th scope="row">No Heart Failure</th>
      <td><?=$fp?></td>
      <td><?=$tn?></td>
    </tr>
  </tbody>
</table>

<!-- hasil perhitungan -->

<div class="card shadow" style="margin-bottom: 2rem;">
        <label class="mb-2 font font-bold" style="margin-left: 4rem; margin-top:1rem;">Presisi :</label>
        <span class="border border-1 border-dark rounded" style="height: 30px; width: 250px; margin-left: 4rem;">
        <p class="font-bold" style="margin-left: 1rem;"><?=number_format($presisi,0)?>%</p>
        </span>
        <label class="mb-2 font font-bold" style="margin-left: 4rem; margin-top:1rem;">Recall :</label>
        <span class="border border-1 border-dark rounded" style="height: 30px; width: 250px; margin-left: 4rem;">
        <p class="font-bold" style="margin-left: 1rem;"><?=number_format($recal,0)?>%</p>
        </span>
        <label class="mb-2 font font-bold" style="margin-left: 4rem; margin-top:1rem;">Accuracy :</label>
        <span class="border border-1 border-dark rounded" style="height: 30px; width: 250px; margin-left: 4rem;">
        <p class="font-bold" style="margin-left: 1rem; margin-bottom: 2rem;"><?=number_format($accuracy,0)?>%</p>
        </span>
        <div style="display: inline-flex; margin-bottom: 2rem;">
        </div>
</div>
</div>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// jalankan program k-means
			include 'proses_kmeans.php';
			// tampilkan hasil keluaran
            
		}
	?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>