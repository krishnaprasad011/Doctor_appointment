<?php include 'inc/connection.php';
if(!isset($_SESSION)){ 
    session_start(); 
    }
    if($_SESSION["aid"]==NULL){
        header('Location: admin-log.php');
    }
     $id = $_GET['id'];
     $sql="SELECT * FROM doctors WHERE id = '$id'";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0)
     {
         while($row = mysqli_fetch_assoc($result))
         {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dcotor</title>
    <?php include 'css/css-cdn.php';?>

</head>
<style>
    footer{
        bottom:0;
    }
</style>
<body>
    <header>
       <?php include 'inc/admin-nav.php'?>
    </header>
    <main class="container">
        <h1 class="text-center mt-5 strong"></h1>
        <form action="" method="post">
            <div class="row pb-5">
                <div class="col-sm-8">
                    <h2 class="text-primary"><strong>DR. <?php echo $row['d_fname'];?></strong></h2>
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row['images']).''?>" class="img-fluid rounded" alt="" width="60" height="60">   
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-md-6">
                <h3 class="text-info">Department:</h3> 
                <hr>
                <h4><strong><?php echo $row['dept'];?> </strong></h4>
                </div>
                <div class="col-md-6">
                <h3 class="text-info">Work Experience:</h3> 
                <hr>
                <h4><strong><?php echo $row['exp'];?> years</strong></h4>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-md-12">
                <h3 class="text-info">Doctor Availability:</h3> 
                <hr>
                
                    <?php
                        if($row['t1'] != 'no')
                            {?>
                                <button type="button" class="btn btn-success">10:00 AM - 11:00 AM</button>
                                <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-danger">10:00 AM - 11:00 AM</button>
                                <?php
                            }
                    ?>

                    <?php
                        if($row['t2'] != 'no')
                            {?>
                                <button type="button" class="btn btn-success">01:00 PM - 02:00 PM</button>
                                <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-danger">01:00 PM - 02:00 PM</button>
                                <?php
                            }
                    ?>

                    <?php
                        if($row['t3'] != 'no')
                            {?>
                                <button type="button" class="btn btn-success">04:00 PM - 05:00 PM</button>
                                <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-danger">04:00 PM - 05:00 PM</button>
                                <?php
                            }
                    ?>

<?php
                        if($row['t4'] != 'no')
                            {?>
                                <button type="button" class="btn btn-success">06:00 PM - 07:00 PM</button>
                                <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-danger">06:00 PM - 07:00 PM</button>
                                <?php
                            }
                    ?>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-md-6">
                    <h3 class="text-info">Qualification:</h3> 
                    <hr>
                    <h4><strong><?php echo $row['quali1'];?></strong></h4>   
                </div>
                <div class="col-md-6">
                    <h3 class="text-info">D.O.B:</h3> 
                    <hr>
                    <h4><strong><?php echo $row['d_dob'];?></strong></h4>   
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-md-12">
                <h3 class="text-info">Awards & Achivement</h3>
                <hr>
                <p class="h5"><?php echo $row['achive'];?></p>
                </div>
            </div>
            
            

        </form>
        <?php
             }
                    }
                    else{
                        echo "no result found";
                    } 
                ?>
<form action="" method="post">
                <!-- The Modal -->
 <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
                                    
                                                <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Cancel Booking</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
                                                
                                                <!-- Modal body -->
        <div class="modal-body">
        

        <input type="hidden" name="doc_id" id="aaaa" value="">    

        <label for="reason">Select a reason from the list:</label>
        <select class="form-control" name="reason">
        
        <option value="doctor wont be able to make at thet time" selected>doctor wont be able to make at thet time</option>
        </select>    

        <label for="">Select dates</label>
        <div class="">
                     <label for="datepicker">From</label>
                    <input placeholder="Selected date" autocomplete="off" type="text" id="datepicker" class="form-control" name="date1" required>
        </div>
        <div class="">
                     <label for="datepicker">to</label>
                    <input placeholder="Selected date" autocomplete="off" type="text" id="datepicker2" class="form-control" name="date2" required>
        </div>                                  

        </div>
                                            
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        <input type="submit" value="confirm" class="btn btn-success" name="cancel">
        </div>
        </div>
        </div>
        </div>
        </form>
    </main>
    <footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include 'js/js-cdn.php';?>   
<script type="text/javascript">
$(document).ready(function(){
    $("body").on('click','.open-dialog',function(){
        var myid = $(this).attr('data-id');
        $(".modal-body #aaaa").val(myid);
    });

    jQuery(document).ready(function($){
        $("#datepicker").datepicker({ minDate: +1, maxDate: "+3D", dateFormat: "dd-mm-yy"});
        $("#datepicker2").datepicker({ minDate: +1, maxDate: "+3D", dateFormat: "dd-mm-yy"});
    });
});
</script>
</body>
</html>
 
        <?php
        if(isset($_POST['cancel'])){

            $doc_id = $_POST['doc_id'];
            $reason = $_POST['reason'];
            $d1 = $_POST['date1'];
            $d2 = $_POST['date2'];

           
            $dt = date('d-m-Y H:i');
            // date_default_timezone_set('Asia/Kolkata');
            // $c_date = date('d-m-Y');
            // $sql3="SELECT a_id FROM appointment WHERE d_id='$doc_id' AND `date` BETWEEN 'd1' AND 'd2' AND `status`='1'";
            // $result3 = mysqli_query($conn, $sql3);
            // if(mysqli_num_rows($result3)>0)
            // {
            //     while($row3 = mysqli_fetch_assoc($result3))
            //     {
            //         $aid=$row3['a_id'];
            //         $sql2 = "INSERT INTO cancel (appoint_id,reason,date_time) VALUE ($aid,'$reason','$dt')";
            //         mysqli_query($conn, $sql2);
            //     }
            // }
        
            $sql1 = "UPDATE appointment SET `status` = 'cancel' 
            WHERE d_id = '$doc_id' AND `date` BETWEEN '$d1' AND '$d2'";
            
            if (mysqli_query($conn, $sql1)) {
                
                echo"<script>alert('appointments have been cancelled');</script>";
                
                
            } else {
                echo "<script>alert('no appointments');</script>";
            }
            
             mysqli_close($conn);

        }
        ?>