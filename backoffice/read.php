<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    // Prepare a select statement
    $sql = "SELECT * FROM account WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);
        // Set parameters
        $param_id = trim($_GET["id"]);
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                // Retrieve individual field value
                $name = $row["name"];
                $email = $row["email"];
                $message = $row["message"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    unset($stmt);
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<!-- header -->
<?php
include_once('header.php'); 
?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-10">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <!-- date form -->
                    <div class="form-group">
                        <label>Name: </label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Email: </label>
                        <p><b><?php echo $row["email"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Message: </label>
                        <p><b><?php echo $row["message"]; ?></b></p>
                    </div>
                    <p><a href="index.php" class="btn btn-warning text-white">Back</a></p>
                </div>
            </div>        
        </div>
    </div>

<?php require_once ('footer.php'); ?>
</div>

</body>
</html>