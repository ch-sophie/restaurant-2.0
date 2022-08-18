<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- link bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link bootstrap js -->
    <!-- link font awesome -->
    <script src="https://kit.fontawesome.com/b0a60d99d5.js" crossorigin="anonymous"></script>
    <title>Contact</title>
</head>

<body>
    <!-- header -->
<div class="container g-5 p-3">
      <nav class="navbar my-3 navbar-expand-sm navbar-expand-md bg-warning">
        <div class="container-fluid">
          <a href="https://ch-sophie.github.io/restaurant-css-framework/Welcome" class="navbar-brand fw-semibold text-light"><i class="fa-solid fa-dice"></i> Soookies </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link text-white fw-semibold" href="https://ch-sophie.github.io/restaurant-css-framework/Welcome">Home</a>
              <a class="nav-link text-white fw-semibold" href="https://ch-sophie.github.io/restaurant-css-framework/Menu">Menu</a>
              <a class="nav-link text-white fw-semibold" href="https://ch-sophie.github.io/restaurant-css-framework/gallery">Gallery</a>
              <a class="nav-link text-white fw-semibold" href="https://ch-sophie.github.io/restaurant-css-framework/restaurant">Locations</a>
            </div>
          </div>
        </div>
      </nav>
        <h4 class="my-2">Contact us</h4>

<h2>Thank you for your message!</h2>
        
<div class="card">
    <div class="card-body">
        <h5 class="card-title">A copy of your form</h5>
        <p class="card-text"><b>Date</b> : <?php echo $_POST['date']; ?></p>
        <p class="card-text"><b>Name</b> : <?php echo $_POST['first_name']; ?></p>
        <p class="card-text"><b>Email</b> : <?php echo $_POST['email']; ?></p>
        <p class="card-text"><b>Message</b> : <?php echo $_POST['textarea']; ?></p>
    </div>
</div>

<?php
  // servername => localhost
  $conn = mysqli_connect("localhost", "root", "root", "back_office");

  // // Check connection
  if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
  }

  // Taking all values from the form data
  $date = $_REQUEST['date'];
  $first_name =  $_REQUEST['first_name'];
  $email = $_REQUEST['email'];
  $textarea = $_REQUEST['textarea'];

  // Performing insert query execution
  $sql = "INSERT INTO messages(firstname, email, message) VALUES ('$first_name', '$email', '$textarea')";

  if(mysqli_query($conn, $sql)){
    echo "<hr><h6>Data stored in a database successfully.</h6>";
    echo nl2br("Date: $date\n Name:  $first_name\n Email: $email\n Message: $textarea");
  } else{
      echo "Hush! Sorry $sql. "
      . mysqli_error($conn);
  }
  ?>


<!-- footer -->
<hr>
    <footer class="my-3">
      <nav class="navbar-expand navbar-expand-lg bg-light">
        <div class="container-fluid">
          <!-- <a class="navbar-brand"><i class="fa-solid fa-copyright fa-2xs"></i>  Soookies</span></a> -->
          <!-- <button class="navbar-toggler d-inline-flex" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button> -->
          <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link mx-4" href="#"><i class="fa-brands fa-facebook fa-fade"></i></a>
              <a class="nav-link mx-4" href="#"><i class="fa-brands fa-instagram"></i></a>
              <a class="nav-link mx-4" href="#"><i class="fa-brands fa-twitter"></i></a>
              <a class="nav-link mx-4" href="#"><i class="fa-brands fa-cc-apple-pay fa-flip"></i></a>
            </div>
          </div>
          <a class="navbar-brand"><i class="fa-solid fa-copyright fa-2xs"></i>  Soookies</span></a>
        </div>
        </nav>
      </footer>
</body>
</html>
