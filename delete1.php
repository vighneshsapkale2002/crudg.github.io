<?php
if (isset($_GET["USerSno"])) {
    $USerSno = $_GET["USerSno"];

 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user1";

 

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM user1 WHERE USerSno=$USerSno";
    $connection->query($sql);

}

header("location: /Crud/Crudg/index1.php");
exit;







?>