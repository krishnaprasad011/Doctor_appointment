<?php include 'inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add patient</title>
    <link rel="stylesheet" href="\css\basic.css">
    <?php include 'css/css-cdn.php';?>
</head>
<style>
</style>
<body>
<header>
    <?php include 'inc/admin-nav.php';?>
</header>
<main class="container">
    <h2 class="h2 text-center pt-5">Add Patients</h2>
    <br>
    <form action="" method="POST">
    <div class="row">
       </div>
        <div class="row">
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <input type="text" id="name" name="uname" class="form-control" required>
                    <label for="uname">Name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <input type="email" id="email" name="email" class="form-control" required>
                    <label for="email">E-mail</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-danger" id="alert1" role="alert" style="display:none;">
                       This Email already exist, try a another one
                </div>
            </div>           
        </div>
        <div class="row">
        <div class="col-md-6">
            <div class="md-form mb-0">
                <input type="tel" name="pno" id="pno" class="form-control" maxlength="10" required pattern="[7-9]{1}[0-9]{9}" title="invalid phone number">
                <label for="pno">Phone number</label>
            </div>
        </div>
        </div>
      
        <div class="row">
            <div class="col-md-6">
            <label for="">Gender</label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input form-control" id="male" name="gender" value="male" required>
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input form-control" id="female" name="gender" value="female" required>
                    <label class="custom-control-label" for="female">Female</label>
                </div>
            </div>
        </div>
       <div class="row">
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <input type="text" name="date" id="datepicker" class="form-control" required>
                    <label for="age">Date of Birth</label>
                </div>
            </div>           
       </div>    
       </div>
       <div class="row">
            <input type="submit" class="btn btn-primary" value="Add" name="add">
       </div>
       
    </form>
</main>
<footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<!-- Footer -->
<?php include 'js/js-cdn.php';?>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
</body>
</html>
<?php
$email = isset($_POST['email']) ? $_POST['email'] : '';
    
    $sql1 = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql1);
         
    if(mysqli_num_rows($result)==0)
    {
            if(isset($_POST["add"]))
            {
            $uname = strtoupper($_POST['uname']);
            
            $gender = $_POST['gender'];
            $date = $_POST['date'];
            $pno = $_POST['pno'];
            
            
            $sql = "INSERT INTO users (uname,email,gender,u_dob,pno) VALUES ('$uname','$email','$gender','$date','$pno')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Patient Added Successfully');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
             mysqli_close($conn);
            
            }
            
    }else{
        ?>
            <script type="text/javascript">document.getElementById('alert1').style.display = 'block';</script>
            <?php
    }


?>