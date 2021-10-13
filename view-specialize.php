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
    <title>view-specialization</title>
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
        <h1 class="text-center mt-5 strong">Specializations</h1>
        <input class="form-control mt-5" id="myInput" type="text" placeholder="Search..">
        <p class="p-3"><a href="#myModal" data-toggle="modal" value="add" name="add" class="btn btn-success float-right open-dialog">
                                Add new Specialization
                                </a></p>
        <table id="dtBasicExample" class="table table-striped table-sm mt-5 dataTables_length">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="myTable">
            <?php
                 $sql ="SELECT * FROM Specialize";
                 $result = mysqli_query($conn,$sql);
         
                 if(mysqli_num_rows($result)>0)
                 {
                     while($row = mysqli_fetch_assoc($result))
                     {
                        echo' <tr>
                                <td>'.$row['sid'].'</td>
                                <td>'.$row['sname'].'</td>
                                <td><a href="#myModa2" data-id='.$row["sid"].' data-toggle="modal" value="up" name="up" class="btn btn-warning open-dialog">
                                Update
                                </a></td>
                                <td><a href="#myModa3" data-id='.$row["sid"].' data-toggle="modal" value="del" name="del" class="btn btn-danger open-dialog">
                                Delete
                                </a></td>
                            </tr>';
                        }
                    }else{
                        
                        echo '
                        <td></td><td></td>
                        <td><a href="#myModal" data-toggle="modal" value="add" name="add" class="btn btn-success open-dialog">
                        Add
                        </a></td>';
                    }
                ?>
            </tbody>
        </table>

        <form action="" method="post" name="add">
        <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Add New Specialization</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
        <!-- <input type="hidden" name="appoint_id" id="aaaa" value="">     -->
        <label for="">
                Name:
                <input type="text" name="sname" id="" required>
        </label>                                     
        </div>         
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        <input type="submit" value="confirm" class="btn btn-success" name="add">
        </div>
        </div>
        </div>
        </div>
        </form>

        <form action="" method="post" name="update">
        <div class="modal fade" id="myModa2">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Update Specialization</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">
        <input type="hidden" name="sid" id="aaaa" value="">    
        <label for="">
                Name:
                <input type="text" name="sname" id="" required>
        </label>                                     
        </div>         
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        <input type="submit" value="confirm" class="btn btn-success" name="update">
        </div>
        </div>
        </div>
        </div>
        </form>

<form action="" method="post" name="delete">
        <div class="modal fade" id="myModa3">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Delete Specialization</h4>
        <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        <div class="modal-body">   
        <input type="hidden" name="sid" id="aaaa" value="">                                 
        </div>         
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
        <input type="submit" value="confirm" class="btn btn-warning" name="delete">
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
<script>
   $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  $("body").on('click','.open-dialog',function(){
        var myid = $(this).attr('data-id');
        $(".modal-body #aaaa").val(myid);
    });
});
</script>  
</body>
</html>
<?php
    if(isset($_POST['add'])){
        $sname =$_POST['sname'];

        $sql1="INSERT INTO specialize (sname)VALUES('$sname')";
        if(mysqli_query($conn,$sql1)){
            echo'<script>alert("Added successfully");</script>';
            
        }else{
            echo'<script>alert("unsuccessfull");</script>';

        }
    }
?>
<?php
    if(isset($_POST['update'])){
        $sid=$_POST['sid'];
        $sname =$_POST['sname'];
        $sql2="UPDATE specialize 
        SET sname='$sname' WHERE `sid`='$sid'";
        if(mysqli_query($conn,$sql2)){
            echo'<script>alert("updated successfully");</script>';
            
        }else{
            echo'<script>alert("unsuccessfull");</script>';

        }
    }
?>

<?php
    if(isset($_POST['delete'])){
        $sid=$_POST['sid'];
        $sql2="DELETE FROM specialize 
        WHERE `sid`='$sid'";
        if(mysqli_query($conn,$sql2)){
            echo'<script>alert("Delete successfully");</script>';
            
        }else{
            echo'<script>alert("unsuccessfull");</script>';

        }
    }
?>