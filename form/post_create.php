<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="d-flex flex-column min-vh-100">

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

    <!-- <div class="container"> -->

        <h3>Message successfully added!</h3>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo 'OK'; ?></h5>
                <p class="card-text"><b>Name</b> : <?php echo $_POST['first_name']; ?></p>
                <p class="card-text"><b>Email</b> : <?php echo $_POST['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo $_POST['textarea']; ?></p>
            </div>
        </div>
    <!-- </div> -->

    <?php
    $insertNew = $conn->prepare("INSERT INTO messages(firstname, email, message) VALUES ('$first_name', '$email', '$textarea')");
    $insertNew->execute([
        'firstname' => $first_name,
        'email' => $email,
        'textarea' => $textarea,
    ]);
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
    </div>
</body>
</html>