<?php include 'inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Appointments</title>
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
                        <div class="col-md-4">
                            <label for="doc">Doctor</label>
                            <select class="browser-default custom-select" name="doc" id="doc">
                                <option selected disabled>Select Doctor</option>
                                <?php
                                    $sqls="SELECT * FROM doctors";
                                   $results=mysqli_query($conn,$sqls);
                                   if(mysqli_num_rows($results)>0){
                                       while($rows=mysqli_fetch_assoc($results)){
                                           ?>
                                           <option value="<?php echo $rows['id'];?>"><?php echo $rows['d_fname'];?></option>
                                       <?php 
                                       }
                                   }else{
                                       echo '0 rows';
                                   } 
                                ?>
                            </select>
                           </div> 
        </div>
        <div class="row">
                <div class="col-md-4">
                    <label for="pati">Patient</label>
                    <select class="browser-default custom-select" name="pati" id="pati">
                        <option selected disabled>Select Patient</option>
                            <?php
                            $sqls="SELECT * FROM users";
                                $results=mysqli_query($conn,$sqls);
                                if(mysqli_num_rows($results)>0){
                                    while($rows=mysqli_fetch_assoc($results)){
                                           ?>
                                        <option value="<?php echo $rows['uid'];?>"><?php echo $rows['uname'];?></option>
                                       <?php 
                                       }
                                   }else{
                                       echo '0 rows';
                                   } 
                                ?>
                            </select>
                </div> 
        </div>
               <div class="row">
                <div class="col-md-4">
                    <label for="time">Time</label>
                    <select class="browser-default custom-select" name="time" id="time">
                        <option selected disabled>Select Time</option>
                            <option>10:00</option>
                            <option>12:00</option>
                            <option>13:00</option>
                            <option>15:00</option>
                    </select>
                </div> 
        </div>
       <div class="row">
            <div class="col-md-6">
                <div class="md-form mb-0">
                    <input type="text" name="date" id="datepicker" class="form-control" required>
                    <label for="date">Date</label>
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
         
            if(isset($_POST["add"]))
            {
            $doc = $_POST['doc'];
            $pati = strtoupper($_POST['pati']);
            $date = $_POST['date'];
            $time=$_POST['time'];
            $sql = "INSERT INTO appointment (u_id,d_id,`time`,`date`) VALUES ('$pati','$doc','$time','$date')";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Appointment Booked Successfully');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
             mysqli_close($conn);
            
            }
            


?>