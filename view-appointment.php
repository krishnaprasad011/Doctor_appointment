<?php include 'inc/connection.php';
if(!isset($_SESSION)){ 
    session_start(); 
    }
    if($_SESSION["aid"]==NULL){
        header('Location: admin-log.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view-appointments</title>
    <?php include 'css/css-cdn.php';?>
    <link rel="stylesheet" href="css/basic.css">
    <style>
    footer{
        bottom:0;
    }
   table{
       width:100%;
   }
</style>
</head>
<body>
<header>
       <?php include 'inc/admin-nav.php'?>
    </header>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5">all appointments</h1>
                <input class="form-control mt-5" id="myInput" type="text" placeholder="Search..">
            </div>
            <a href="add_appointment.php" class="btn btn-success float-right">Add Appointment</a>
                    <table id="dtBasicExample" class="table table-striped table-sm mt-3 mb-5 dataTables_length">
                        <thead class="secondary-color text-light">
                            <tr>
                                <th>Appoint. ID</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Time</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php
                            $sql="SELECT a.a_id, u.uname, d.d_fname,a.time,a.date
                            FROM appointment a 
                            INNER JOIN doctors d ON a.d_id=d.id 
                            INNER JOIN users u ON u.uid=a.u_id
                            ORDER BY a.a_id DESC";
                           
                            $result = mysqli_query($conn,$sql); 
                            if(mysqli_num_rows($result)>1)
                            {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $a_date = $row["date"];
                                $a_time = $row["time"];
                               $a_date1 = $a_date.$a_time;
                                ?>
                            <tr>
                                <td><?php echo $row['a_id']; ?></td>
                                <td><?php echo $row['uname']; ?></td>
                                <td><?php echo $row['d_fname']; ?></td>
                                <td><?php echo $row['time']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
        </div>
    </main>
    <footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
    <?php include 'js/js-cdn.php';?> 

    <script>
   $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>  
</body>
</html>