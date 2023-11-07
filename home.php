<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Home</title>
    <style>
        body{
            background-color: ;
            background-image: url(img/wave-haikei.svg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container{
            position: relative;
            margin-top: 10rem;
            justify-content: center;
            align-items: center;
			width: 900px;
        }
        .font{
            font-family: 'Roboto Condensed', sans-serif;
        }.font-bold{
            font-weight: 700;
            font-family: 'Roboto Condensed', sans-serif;
        }.btn{
            display: block;
            height: auto;
            background-color: rgb(0,0,0);
            color: white;
        }
        .btn:hover {
            border: 1px solid #000;
            color: #000;
        }
        h1{
            padding-top: 5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-body" style="height: 400px;">
            <div style="display: inline-flex;">
            <h1 class="font-bold mb-3" style="margin-left: 4rem;">Heart Failure Prediction</h1>
                <img src="img/dataset-thumbnail.png" alt="" style="margin-left: 4rem;">
            </div>
                <div style="display: inline-flex;">
				    <a href="kmeansinput.php" style="text-decoration: none;"><input class="btn font" type="submit" value="K-Means" style="margin-left: 18rem; margin-top: 2rem;"></a>
                    <p style="font-size: 40px; margin-left: 1rem; margin-top: 1rem; color: #dark;">/</p>
				    <a href="probabilitas.php" style="text-decoration: none;"><input class="btn font" type="submit" value="Naive Bayes" style="margin-left: 1rem; margin-top: 2rem;"></a>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>