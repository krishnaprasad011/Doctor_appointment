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
    <title>Admin</title>
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
    <main class="container pb-5">
        <h1 class="text-center mt-5 strong">Update </h1>
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" class="needs-valudation" enctype="multipart/form-data" autocoplete="on">
                    <div class="form-row p-2  mt-5">
                        <div class="col-md-4">
                            <label for="image" class="custom-file-label">Choose image</label>
                            <input type="file" value="<?php echo 'data:image/jpeg;base64,'.base64_encode($row['images']).''?>" name="images" aria-describedby="inputGroupFileAddon01" class="custom-file-input" id="image" placeholder="select a file">
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                        <label for="fname">First name</label>
                        <input type="text" value="<?php echo $row['d_fname'];?>" class="form-control" name="d_fname" id="fname"required>
                        </div>
                        <div class="col-md-4">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="<?php echo $row['gender'];?>"selected><?php echo $row['gender'];?></option>
                            <option name="" value="m">male</option>
                            <option name="" value="f">female</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="dob">Date of Birth</label>
                            <input type="date" value="<?php echo $row['d_dob'];?>" class="form-control datepicker" name="d_dob" id="dob" required>
                        </div>
                        <div class="col-md-4">
                            <label for="place">Place</label>
                            <input type="text" value="<?php echo $row['place'];?>" class="form-control" name="place" id="place" required>
                        </div>
                    </div>

                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="q1">Qualification</label>
                            <input type="text" value="<?php echo $row['quali1'];?>" class="form-control datepicker" name="quali1" id="q1" required>
                        </div>
                        
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="cat">specialist</label>
                            <select class="browser-default custom-select" name="dept" id="cat" value="">
                                <option selected value="<?php echo $row['dept'];?>"><?php echo $row['dept'];?></option>
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
                                <input type="text" name="exp" id="" class="form-control" value="<?php echo $row['exp'];?>" required>
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                            <label for="fee">Fee:</label>
                            <input type="number" name="fee" id="" value="<?php echo $row['price'];?>" required class="form-control">
                        </div>
                        </div>
                       
                    <div class="form-row p-2">
                        <div class="col-md-12">
                            <label for="aa">Awards & Achivements</label>
                            <textarea name="achive" id="aa" cols="30" rows="10" class="content form-control">
                            <?php echo $row['achive'];?>
                            </textarea>
                        </div>
                    </div>
                    <div class="from-row p-2">
                        <div class="col-md-12">
                             <input type="submit" class="btn btn-success" id="submit" value="update" name="submit">
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
            </div>
        </div>
    </main>
    <footer class="page-footer primary-color font-small fixed-bottom">
        <div class="footer-copyright text-center py-3 primary-color">© 2021 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include 'js/js-cdn.php';?>   
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

    });
</script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        # code...
        
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
    
        if($images == NULL){
            $sql = "UPDATE doctors 
            SET d_fname='$d_fname',d_dob='$d_dob',place='$place',quali1='$quali1',dept='$dept',achive='$achive',`exp`='$exp',gender='$gender',price='$fee' WHERE id='$id'";
            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('updated successfully');</script>";
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }else{
        $sql = "UPDATE doctors 
        SET images = '$images', d_fname='$d_fname',d_dob='$d_dob',place='$place',quali1='$quali1',dept='$dept',achive='$achive',`exp`='$exp',gender='$gender',price='$fee' WHERE id='$id'";
        if(mysqli_query($conn,$sql))
        {
            echo "<script>alert('updated Successfully');</script>";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
        mysqli_close($conn);
    }
?>