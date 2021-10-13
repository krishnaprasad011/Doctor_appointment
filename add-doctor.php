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
    <title>add-doctors</title>
    <?php include 'css/css-cdn.php';?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>
<style>
    footer{
        bottom:0;
    }
</style>
<body>
    <header class="sticky-top">
       <?php include 'inc/admin-nav.php'?>
    </header>
    <main class="container">
        <h1 class="text-center mt-5 strong">add doctors</h1>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" class="needs-valudation" enctype="multipart/form-data" autocoplete="on">
                    <div class="form-row p-2  mt-5">
                        <div class="col-md-4">
                            <label for="image" class="custom-file-label">Choose image</label>
                            <input type="file" name="images" aria-describedby="inputGroupFileAddon01" class="custom-file-input" id="image" placeholder="select a file" required>
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                        <label for="fname">Name</label>
                        <input type="text" class="form-control" name="d_fname" id="fname" placeholder="Name" required>
                        </div>
                        <div class="col-md-4">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option name="" value="m">male</option>
                            <option name="" value="f">female</option>
                        </select>
                        
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control datepicker" name="d_dob" id="dob" placeholder="Date of Birth" required>
                        </div>
                        <div class="col-md-4">
                            <label for="place">Place</label>
                            <input type="text" class="form-control" name="place" id="place" placeholder="City" required>
                        </div>
                    </div>

                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="q1">Qualification 1</label>
                            <input type="text" class="form-control" name="quali1" id="q1" placeholder="Qualification-1" required>
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="cat">Specialist</label>
                            <select class="browser-default custom-select" name="dept" id="cat">
                                <option selected disabled>Open this select menu</option>
                                <?php
                                    $sqls="SELECT * FROM specialize";
                                   $results=mysqli_query($conn,$sqls);
                                   if(mysqli_num_rows($results)>0){
                                       while($rows=mysqli_fetch_assoc($results)){
                                           ?>
                                           <option value="<?php echo $rows['sname'];?>"><?php echo $rows['sname'];?></option>
                                       <?php 
                                       }
                                   }else{
                                       echo '0 rows';
                                   } 
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="exp">Work Experience</label>
                                <input type="number" name="exp" id="" class="form-control" required>
                        </div>
                        </div>
                        <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="fee">Fee:</label>
                            <input type="number" name="fee" id="" required class="form-control">
                        </div>
                        </div>
                       
                    
                    
                    <div class="form-row p-2">
                        <div class="col-md-12">
                            <label for="aa">Awards & Achivements</label>
                            <textarea name="achive" id="aa" cols="30" rows="10" class="content form-control">
                            </textarea>
                        </div>
                    </div>
                    
                    <div class="from-row p-2">
                        <div class="col-md-12">
                             <input type="submit" class="btn btn-success" id="submit" value="submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="page-footer primary-color font-small">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include 'js/js-cdn.php';?>  
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            var image_name =$('#image').val();
            if(image_name ==''){
                alert("Please select image");
                return false;
            }
            else
            {
                var extenction = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extenction, ['gif','png','jpg','jpeg'])== -1){
                    alert('invalid file');
                    if('#image').val('');
                    return false;
                }
            }
        });
        $('.datepicker').pickadate({
        weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true
        });
        $('.content').richText();

        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    });
</script> 
</body>
</html>
<?php
    if(isset($_POST["submit"]))
    {
        $images = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
        $d_fname = strtoupper($_POST['d_fname']);
        $d_dob = $_POST['d_dob'];
        $place = $_POST['place'];
        $quali1 = $_POST['quali1'];
        $dept = $_POST['dept'];
        $achive = $_POST['achive'];
        $exp = $_POST['exp'];
        $gender = $_POST['gender'];
        $fee = $_POST['fee'];
      
        $sql = "INSERT INTO doctors (images,d_fname,d_dob,place,quali1,dept,achive,`exp`,gender,price) VALUES ('$images','$d_fname','$d_dob','$place','$quali1','$dept','$achive','$exp','$gender','$fee')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('added successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  
         mysqli_close($conn);

    }
?>