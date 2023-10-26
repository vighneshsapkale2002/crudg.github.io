<?php

 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user1";

 

$connection = new mysqli($servername, $username, $password, $dbname);






$USerSno = "";
$UserName = "";
$Email = "";
$Password = "";
$ContactNo = "";


$errorMessage = "";

$successMessage = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET the method show the data of the client

    if (!isset($_GET["USerSno"])) {
        header("location: /Crud/Crudg/index1.php");
        exit;
    }

    $USerSno = $_GET["USerSno"];

    // read the row of the selected client from database table
    $sql = "SELECT * FROM user1 WHERE USerSno=$USerSno";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: /Curd/Crudg/index1.php");
        exit;
    }

    $USerSno = $row["USerSno"];
    $UserName = $row["UserName"];
    $Email = $row["Email"];
    $Password = $row["Password"];
    $ContactNo = $row["ContactNo"];


} else {
    // POST method update the data of the client

    $USerSno = $_POST["USerSno"];
    $UserName = $_POST["UserName"];
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];
    $ContactNo = $_POST["ContactNo"];


    do {

        if (empty($USerSno) || empty($UserName) || empty($Email) || empty($Password) || empty($ContactNo)) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE user1 " .
            "SET USerSno = '$USerSno', UserName = '$UserName', Email = '$Email', Password = '$Password', ContactNO = 'ContactNo' " .
            "WHERE USerSno = $USerSno";

        $result = $connection->query($sql);


        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $successMessage = "client  update correctly";

        header("location: /Crud/Crudg/index1.php");
        exit;

    } while (true);

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>New Client</h2>

        <?php
        if (!empty($errorMessage)) {
            echo "
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>$errorMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
      </div>
      ";
        }



        ?>

        <form method="post">
            <!-- this line change the id -->
            <input type="hidden" name="USerSno" value="<?php echo $USerSno; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">USerSno</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="USerSno" value="<?php echo $USerSno; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">UserName</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="UserName" value="<?php echo $UserName; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email; ?>">
                </div>
            </div>

        
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Password" value="<?php echo $Password; ?>">
                </div>
            </div>

            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ContactNo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ContactNo" value="<?php echo $ContactNo; ?>">
                </div>
            </div>

            <?php
            if (!empty($successMessage)) {
                echo "
        <div class='row mb-3'>
        <div class='offset-sm-3 col-sm-6'>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>$successMessage</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='cole'></button>
        
        ";
            }



            ?>


            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/Curd/Crudg/index1.php" role="button">Cancel</a>
                </div>
            </div>



        </form>

    </div>
</body>

</html>