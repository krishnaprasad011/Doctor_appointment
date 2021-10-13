<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-Login</title>
    <?php include 'css/css-cdn.php';?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark primary-color sticky-top">
    <a class="navbar-brand px-2" href="#">Health Care +</a>
    </nav>
    <main class="container">
        <h1 class="pt-5 text-center strong">admin panel</h1>
        <form action="adm-log-post.php" method="POST" class="border border-light text-center p-5" autocomplete="on">
        <p class="h4 mb-4">Log in</p>
            <input type="text" name="id" id="" placeholder="admin id" class="form-control mb-5">
            <input type="password" name="pas" id="" placeholder="password" class="form-control mb-5">

            <input type="submit" value="log in" name="submit" class="btn btn-primary btn-round">
        </form>
    </main>
    <footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
    <?php include 'js/js-cdn.php';?>  
</body>
</html>
