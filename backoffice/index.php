<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <!-- link bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<!-- header -->
<?php
include_once('header.php'); 
?>

<body>
    <!-- <div class="wrapper"> -->
    <div class="container g-5 p-3">
        <div class="row">
            <div class="col-md-12 col-sm-10">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Messages <i class="fa-regular fa-envelope-open"></i></h2>
                    <a href="create.php" class="btn btn-warning pull-right"><i class="fa fa-plus"></i> Add new message</a>
                </div>
    <?php
    // Include config file
    require_once "config.php";
    // Attempt select query execution
    $sql = "SELECT * FROM account";
    if($result = $pdo->query($sql)){
    if($result->rowCount() > 0){
    echo '<table class="table table-responsive-sm table-bordered table-striped">';
        echo "<thead>";
            echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Name</th>";
                echo "<th>Email</th>";
                echo "<th>Message</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            while($row = $result->fetch()){
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>";
                    // icons view - edit - delete // 
                    echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                    // echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Edit" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                    echo '<a href="delete.php?id='. $row['id'] .'" title="Delete" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                    echo "</td>";
                echo "</tr>";
            }
        echo "</tbody>";                            
    echo "</table>";
    // Free result set
    unset($result);
        } else{
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    // Close connection
    unset($pdo);
    ?>
            </div>
        </div>        
    </div>
<!-- </div> -->

<?php
require_once ('footer.php');
?>
</div>

</body>
</html>
