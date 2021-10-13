<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <?php include '../css/css-cdn.php';?>
    <link rel="stylesheet" href="sidebar.css">
</head>
<style>
    footer{
        bottom:0;
    }
</style>
<body>
    <header>
       <?php include '../inc/admin-nav.php'?>
    </header>
    <main class="container">
        <h1 class="text-center mt-5 strong">admin panel</h1>
    </main>
    <footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2019 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include '../js/js-cdn.php';?>   
</body>
</html>


<!-- <div id="wrapper">
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li> <a href="">Doctors</a></li>
                    <li> <a href="">Patients</a></li>
                    <li> <a href="">Queries</a></li>
                </ul>
            </div>
        
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <a href="" class="btn btn-success" id="menu-toggle">Toggle Menu</a>
                    <h1>Health Care +</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    $("#menu-toggle").click(function(e){
        e.preventDefault();
    $("#wrapper").toggleClass("toggled");    
    });
</script> -->