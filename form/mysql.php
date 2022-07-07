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
    <script src="https://kit.fontawesome.com/b0a60d99d5.js" crossorigin="anonymous"></script>
    <!-- font awesome icons -->
    <title>Contact Soookies</title>
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


        <?php
// Souvent on identifie cet objet par la variable $conn ou $db
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=back_office;charset=utf8',
    'root',
    'root'
);

?>

<?php
// $messagesStatement = $db->prepare('SELECT * FROM messages');
$sqlQuery = 'SELECT * FROM `messages`';

// $sqlQuery = 'SELECT * FROM `messages` WHERE email = email';

$messagesStatement = $mysqlConnection->prepare($sqlQuery);
$messagesStatement->execute();

$messages = $messagesStatement->fetchAll();

foreach ($messages as $message){
?> 
<p><?php echo $message['message']; ?> <?php
}
?>

<?php
$sqlQuery = 'INSERT INTO messages(full_name, email, message) VALUES (:title, :recipe, :author, :is_enabled)';
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

