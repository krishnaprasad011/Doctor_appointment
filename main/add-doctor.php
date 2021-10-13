<?php include '../inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <?php include '../css/css-cdn.php';?>
    
</head>
<style>
    footer{
        bottom:0;
    }
</style>
<body>
    <header class="sticky-top">
       <?php include '../inc/admin-nav.php'?>
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
                            <input type="file" name="images" aria-describedby="inputGroupFileAddon01" class="custom-file-input" id="image" placeholder="select a file">
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-4">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" name="d_fname" id="fname" placeholder="First name" required>
                        </div>
                        <div class="col-md-4">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" name="d_lname" id="lname" placeholder="Last name"  required>
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
                            <input type="text" class="form-control datepicker" name="quali1" id="q1" placeholder="Qualification-1" required>
                        </div>
                        <div class="col-md-4">
                            <label for="q2">Qualification 2</label>
                            <input type="text" class="form-control" name="quali2" id="q2" placeholder="Qualification-2" required>
                        </div>
                    </div>
                    <div class="form-row p-2">
                        <div class="col-md-8">
                            <label for="cat">Department</label>
                            <select class="browser-default custom-select" name="dept" id="cat">
                                <option selected disabled>Open this select menu</option>
                                <option value="Cardiologists">Cardiologists</option>
                                <option value="Dermatologists">Dermatologists</option>
                                <option value="Neurologists">Neurologists</option>
                                <option value="Physicians">Physician</option>
                            </select>
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
        <div class="footer-copyright text-center py-3 primary-color">© 2019 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include '../js/js-cdn.php';?>  
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
    if(isset($_POST["submit"]))
    {
        $images = addslashes(file_get_contents($_FILES["images"]["tmp_name"]));
        $d_fname = $_POST['d_fname'];
        $d_lname = $_POST['d_lname'];
        $d_dob = $_POST['d_dob'];
        $place = $_POST['place'];
        $quali1 = $_POST['quali1'];
        $quali2 = $_POST['quali2'];
        $dept = $_POST['dept'];
        $achive = $_POST['achive'];

        $sql = "INSERT INTO doctors (images,d_fname,d_lname,d_dob,place,quali1,quali2,dept,achive) VALUES ('$images','$d_fname','$d_lname','$d_dob','$place','$quali1','$quali2','$dept','$achive')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('added successfully');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
  
         mysqli_close($conn);

    }
?>