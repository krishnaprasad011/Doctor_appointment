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
    <title>view-patients</title>
    <?php include 'css/css-cdn.php';?>
    <link rel="stylesheet" href="css/basic.css">
    
</head>
<style>
    footer{
        bottom:0;
    }
   table{
       width:100%;
   }
</style>
<body>
    <header>
       <?php include 'inc/admin-nav.php'?>
    </header>
    <main class="container mb-5">
        <h1 class="text-center mt-5 strong">patients</h1>
        <input class="form-control mt-5" id="myInput" type="text" placeholder="Search..">
        <a href="add_patient.php" class="btn btn-secondary float-right">Add Patient</a>
        <table id="dtBasicExample" class="table table-striped table-sm mt-5 dataTables_length">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone no.</th>
                    <th>Gender</th>
                    <th>D.O.B</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody id="myTable">
            <?php
                 $sql ="SELECT * FROM users";
                 $result = mysqli_query($conn,$sql);
         
                 if(mysqli_num_rows($result)>0)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                        echo' <tr>
                                <td>'.$row['uid'].'</td>
                                <td>'.$row['uname'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['pno'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['u_dob'].'</td>
                                <td><a href="delete-patient.php?uid='.$row['uid'].'" class="btn btn-danger rounded p-2">delete</a></td>
                                
                            </tr>';
                        }
                    }else{
                        echo "0 results";
                    }
                ?>
            </tbody>
        </table>
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