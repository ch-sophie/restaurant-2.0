<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    // Validate address email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an email.";     
    } else{
        $email = $input_email;
    }
    // Validate message
    $input_message = trim($_POST["message"]);
    if(empty($input_message)){
        $message_err = "Please enter a message.";     
    } else{
        $message = $input_message;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($message_err)){
        // Prepare an update statement
        $sql = "UPDATE account SET name=:name, email=:email, message=:message WHERE id=:id";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":message", $param_message);
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_address = $email;
            $param_message = $message;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        unset($stmt);
    }
    // Close connection
    unset($pdo);

} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM account WHERE id = :id";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);
            
            // Set parameters
            $param_id = $id;
            
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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit message</title>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<!-- header -->
<?php include_once('header.php'); ?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Edit message</h2>
                    <p>Please edit the input values and submit.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" placeholder="Write your message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                            <span class="invalid-feedback"><?php echo $message_err;?></span>
                        </div>
                        <div class="mt-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-warning text-white" value="Submit">
                        <a href="index.php" class="btn btn-danger ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>