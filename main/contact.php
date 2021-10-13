<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <?php include '../css/css-cdn.php';?>
    

    <link rel="stylesheet" href="../css/basic.css">
</head>
<style>
       
</style>
<body>
<?php include '../inc/nav.php';?>
    <div class="container">
        <div>
        <img src="../images/contact.jpg" class="img-fluid" alt="">
        </div>
        <!-- <p class="p-5 bg-primary text-white font-weight-bolder text-center" style="font-size:30px">Contact us</p> -->
              <!--Section: Contact v.2-->
<section class="mb-4">

<!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
<!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? 
                Please do not hesitate to contact us directly. Our team will come back to you within
             a matter of hours to help you.</p>

        <div class="row">

    <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="name" class="form-control">
                        <label for="name">Your name</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">Your email</label>
                    </div>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="subject" name="subject" class="form-control">
                        <label for="subject" class="">Subject</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        <label for="message">Your message</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->
            <div class="text-center text-md-left">
            <a class="btn btn-primary">Send</a>
            </div>
            <div class="status"></div>
            </div>
            </form>
    <!--Grid column-->
    <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p> 3<sup>rd</sup> Block Jayanagar, Bangalore, IND</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+ 91 234 567 89</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>info@healthcareplus.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>
<!--Section: Contact v.2-->
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1374.8437371173368!2d77.58162903575497!3d12.930502845854914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1565364937961!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  <br>
    </div>
<!-- Footer -->
<?php include '../inc/footer.php';?>
<?php include '../js/js-cdn.php';?>
</body>
</html>