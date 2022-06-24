<?php
$connection = "";
include "../connection/connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $queryDeleteUser = "DELETE FROM user WHERE id=$id" or die(mysqli_error());
    $resultDeleteUser = mysqli_query($connection, $queryDeleteUser);


    header("Location: Read.php");
}