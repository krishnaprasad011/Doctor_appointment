<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php include '../css/css-cdn.php';?>
   
    <link rel="stylesheet" href="../css/basic.css">
</head>
<style>
    
</style>
<body>
    <?php include '../inc/nav.php';?>
      
    <div class="container">
    <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <!-- <li data-target="#demo" data-slide-to="1"></li> -->
            <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..\images\banner-img1.png" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                        <h5 CLASS="text-dark text-left">WELCOME TO</h6>
                        <h2 CLASS="text-dark text-left">HEALTH CARE +</h2>
                        <a href="about.php" class="btn btn-primary float-left">Know more</a>
                </div>
            </div>
            <!-- <div class="carousel-item">
                <img src="..\images\banner-img2.jpg" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                    <h3 class="text-capitalize bg-light text-dark">We provide the best health care</h6>
                </div>
            </div> -->
            <div class="carousel-item">
                <img src="..\images\banner-img3.png" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                    <h3 class="text-uppercase bg-light text-dark">we strive to provide <br> a relaxing atmosphere</h6>
                </div>
            </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            </a>
            </div>

            <div class="jumbotron">
                <h2>Clinical Healthcare <br> Reimagined</h2>
                <p><strong>Health Care +</strong> is one of the largest healthcare brands in India. It is present in 7 Indian cities and has an international presence through two locations in Klang, Malaysia and Lagos, Nigeria. One of the leading hospitals in India, it offers treatments and facilities across a wide range of specialties, including Cardiac Care, Renal Sciences, Cancer Care, Organ Transplants and many others.

            Our team consists of experienced doctors who are experts in their areas of specialization, dedicated nurses and skilled paramedical professionals. Together, with our cutting-edge technology and high-quality infrastructure, we aim to provide a wide variety of preventive and curative solutions to your health problems.

                Thanks to its emphasis on clinical excellence and a patient-centric approach, Manipal Hospitals has emerged as one of the top hospitals in the country, known for its quality and affordable health care.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <span><i class="fas fa-procedures fa-5x"></i></span>
                    <br><br>
                    <h3>INTERNATIONAL PATIENTS</h3>
                    <p>Transforming lives of over 2 million patients <br>
                     across 30 countries</p>
                     <button type="button" class="btn btn-primary rounded-pill">KNOW MORE</button>
                </div>
                <div class="col-sm-6">
                <span><i class="fas fa-hospital-alt fa-5x"></i></span>
                <br><br>
                <h3>OUR<br>FACILITY</h3>
                    <p>View our state-of-the-art amenities</p>
                    <button type="button" class="btn btn-primary rounded-pill">KNOW MORE</button>
                </div>
            </div>
    </div>

<!-- Footer -->
<?php include '../inc/footer.php';?>
 <?php include '../js/js-cdn.php';?>
</body>
</html>