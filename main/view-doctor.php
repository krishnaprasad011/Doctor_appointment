<?php include '../inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>view-doctor</title>
    <?php include '../css/css-cdn.php';?>
    <link rel="stylesheet" href="../css/basic.css">
    
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
       <?php include '../inc/admin-nav.php'?>
    </header>
    <main class="container mb-5">
        <h1 class="text-center mt-5 strong">doctors</h1>
        <input class="form-control mt-5" id="myInput" type="text" placeholder="Search..">
        <table id="dtBasicExample" class="table table-striped table-sm mt-5 dataTables_length">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>D.O.B</th>
                    <th>Place</th>
                    <th>Qualification-1</th>
                    <th>Qualification-2</th>
                    <th>Department</th>
                    <th>More</th>
                </tr>
            </thead>
            <tbody id="myTable">
            <?php
                 $sql ="SELECT * FROM doctors";
                 $result = mysqli_query($conn,$sql);
         
                 if(mysqli_num_rows($result)>0)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                        echo' <tr>
                                <td>'.$row['id'].'</td>
                                <td><img src="data:image/jpeg;base64,'.base64_encode($row["images"]).'" class="img-fluid rounded" alt="" width="60" height="60"></td>
                                <td>'.$row['d_fname']." ".$row['d_lname'].'</td>
                                <td>'.$row['d_dob'].'</td>
                                <td>'.$row['place'].'</td>
                                <td>'.$row['quali1'].'</td>
                                <td>'.$row['quali2'].'</td>
                                <td>'.$row['dept'].'</td>
                                <td><a href="" class="btn btn-success rounded p-2">more</a></td>
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
        <div class="footer-copyright text-center py-3 primary-color">© 2019 Copyright:<a href="#"> Health Care +</a>
        </div>
    </footer>
<?php include '../js/js-cdn.php';?> 
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