<!DOCTYPE html>
<html lang="en">
<head>
    <title>CaraArt | About</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet'>
    <link class="img-responsive logo img-circle margin" rel="icon" href="Resources/logo.jpg">
    <style>
        body {
            font-family: 'ABeeZee', sans-serif;
            font-size: 22px;
            line-height: 1.8;
            color: #f5f6f7;
        }

        .headings{
            font-family: 'ABeeZee', sans-serif;
        }
        #name{
            padding-top: 2%;
        }
        .margin {
            margin-bottom: 3%;
            font-family: 'ABeeZee', sans-serif;
        }
        .bg {
            background-color:#D3D3D3;
        }

        .logo{
            border-radius: 25px;
        }
        #who{
            padding-top: 3%;
        }

        .images{
            filter: brightness(73%);
        }


        .headers{
            text-shadow:  0px 0px 7px black;, 0 0 8em transparent;
            font-weight:700;
        }
        .container-fluid {
            padding-top: 70px;
            padding-bottom: 70px;
        }



    </style>
</head>
<body>

<?php
include "./navigationBar.html";
?>

<div class="container-fluid bg text-center">
    <h3 id="who" class="margin">About Me</h3>
    <img src="Resources/Untroubled-Woman-Illustration.png" class="img-responsive float-center" style="display:inline" alt="logo" width="350" height="350">
    <h5 id="name" class="headings">My name is Cara an artist based in Glasgow, Scotland </h5>
    <h5 class="headings"> I am a passionate artist whose goal is to inspire people who see my work to find beauty in unexpected places</h5>
    <h5 class="headings">Explore my art gallery by visiting the  <a href="listart.php">art listings page</a></h5>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100 images" src="Resources/Work-City-Urban-Art-Architecture-View-Scenic-3795443.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="headers">Winter 2021 Art Collection</h1>
                <h3 class="headers">Holiday in Greece</h3>
                <p  class="headers">A vibrant city, full of colour and a fascinating culture</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 images" src="Resources/34064120003_97d78ae1e9_o.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="headers">Winter 2021 Art Collection</h1>
                <h3 class="headers">Winter Sun</h3>
                <p  class="headers">A comfortable warmth of sun on a merry Christmas morning</p>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100 images" src="Resources/Mural-edited-2-1024x669.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="headers">Winter 2021 Art Collection</h1>
                <h3 class="headers">A Childhood Dream</h3>
                <p class="headers">Reminiscing the happy memories of childhood</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container-fluid bg text-center">
    <h3>Come and visit us!</h3>
    <h5 class="headings">Come and have a look at our art gallery and have a sneak peek of our new Winter 2021 collection</a></h5>
    <h5 class="headings">Arrange a visit by visiting the <a href="trackAndTraceBooking.php">track and trace page</a></h5>
</div>



</body>
</html>
