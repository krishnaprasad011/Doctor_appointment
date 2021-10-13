<?php include '../inc/connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php include '../css/css-cdn.php';?>
    
    <link rel="stylesheet" href="../css/basic.css">
</head>
<style>
    
</style>
<body>
<?php include '../inc/nav.php';?>
    
    <main class="container">
        <br>
    <h1 class="text-center">OUR DOCTORS</h1>
    <br>
    <div class="form-inline md-form form-sm justify-content-center">
        
        <input id="search" class="form-control search-doc form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search">
            <i class="fas fa-search" aria-hidden="true"></i>
        
    </div>
    <div class="row">

    <?php 
        $sql ="SELECT * FROM doctors";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
            echo"
            <div class='col-md-4'>
            <div class='card card-cascade wider'>

               
                <div class='view view-cascade overlay'>
                <img  class='card-img-top' src='data:image/jpeg;base64,".base64_encode($row['images'])."' alt='Card image cap'>
                <a href='#!'>
                    <div class='mask rgba-white-slight'></div>
                </a>
                </div>

             
                <div class='card-body card-body-cascade text-center'>

             
                <h4 class='card-title'><strong class='dt'>".$row['d_fname']." ".$row['d_lname']."</strong></h4>
                
                <p class='card-text'>".$row['dept']."</p>
                <h5 class='blue-text pb-2'><strong>".$row['place']."</strong></h5>

              
                <a class='px-2 fa-lg li-ic'><i class='fab fa-linkedin-in'></i></a>
              
                <a class='px-2 fa-lg tw-ic'><i class='fab fa-twitter'></i></a>
               
                <a class='px-2 fa-lg fb-ic'><i class='fab fa-facebook-f'></i></a>
                    <br>
                <a class='btn primary-color'>Book Appointment</a>
                </div>
            </div>
        </div>
        ";
            }
        }else{
            echo "0 results";
        }
     ?>

    </div>
    </main>
<!-- Footer -->
<?php include '../inc/footer.php';?>
<?php include '../js/js-cdn.php';?>
<!-- <script src="e-search.js"></script> -->
<script type="text/javascript">
   
$(document).ready(function($){
    $("#search").keyup(function() {

var filter = $(this).val(),
  count = 0;

$('.row .col-md-4').each(function() {

  if ($(this).text().search(new RegExp(filter, "i")) < 0) {
    $(this).hide();
  } else {
    $(this).show();
    count++;
  }
});
});


});
   
</script>
</body>
</html>
<!-- var value = $(this).val().toLowerCase(); -->
<!-- // $(".col-md-4 .dt").filter(function() {
    //  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            
  $('.search-doc').search(function(){

        });
    // }); -->

    <!-- $(document).ready(function(){
  var $search = $("#search").on("input", function() {
      $btns.removieClass('active');
      var matcher = new RegExp($(this).val(),'gi');
      $('.col-md-4').show().not(function(){
          return matcher.test($(this).find('.dt').text())
      }).hide();
  });
}); -->


<!-- $('.col-md-4 .dt').each(function(){
$(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.search-doc').on('keyup', function(){

var searchTerm = $(this).val().toLowerCase();

    $('.dt').each(function(){

        if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
            $(this).show();
        } else {
            $(this).hide();
            
        }

    });

}); -->