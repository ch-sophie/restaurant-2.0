<?php
// Include config file
require_once('config.php');
// Define variables and initialize with empty values
$name = $email = $message = "";
$name_err = $email_err = $message_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    // Validate email
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
        // Prepare an insert statement
        $sql = "INSERT INTO account (name, email, message) VALUES (:name, :email, :message)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters //
            // date 
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":message", $param_message);
            
            // Set parameters
            // $param_date = $date;
            $param_name = $name;
            $param_email = $email;
            $param_message = $message;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
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
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Message</title>
    <!-- style -->
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
                    <h2 class="mt-5">Write a new message</h2>
                    <p>Please fill in this form and submit.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  
                    <!-- date form -->

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" placeholder="Email Address" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message" placeholder="Write your message" class="form-control <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>"><?php echo $message; ?></textarea>
                        <span class="invalid-feedback"><?php echo $message_err;?></span>
                    </div>
                    <div class="mt-4">
                    <input type="submit" class="btn btn-warning text-white" value="Submit">
                    <a href="index.php" class="btn btn-danger ml-2">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    
    <?php
require_once ('footer.php');
?>
</div>
</body>
</html>