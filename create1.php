<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user1";


  
$connection = mysqli_connect($servername, $username, $password, $dbname);

?>



<?php
$USerSno = "";
$username = "";
$Email = "";
$Password = "";
$ContactNo = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $USerSno = $_POST["USerSno"];
  $username = $_POST["username"];
  $Email = $_POST["Email"];
  $Password = $_POST["Password"];
  $ContactNo = $_POST["ContactNo"];

  do {
    if (empty($USerSno) || empty($username) || empty($Email) || empty($Password) || empty($ContactNo)) {
      $errorMessage = "All the fields are required";
      break;
    }

    // add new client database


    $sql = "INSERT INTO user1 (USerSno, username, Email, Password, ContactNo)" .
      "VALUES ('$USerSno', '$username', '$Email', '$Password', '$ContactNo')";
    $result = $connection->query($sql);


    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }


    $USerSno = "";
    $username = "";
    $Email = "";
    $Password = "";
    $ContactNo = "";

    $successMessage = "client added correctly";

    header("location: /Crud/Crudg/index1.php");
    exit;




  } while (false);

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
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">USerSno</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="USerSno" value="<?php echo $USerSno; ?>">
        </div>
      </div>

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">UserName</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="Email" value="<?php echo $Email; ?>">
        </div>
      </div>


      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="Password" value="<?php echo $Password; ?>">
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