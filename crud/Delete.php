<?php
$connection = "";
include "../connection/connection.php";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM user WHERE id='$id'"
    or die(mysqli_error());

    $result = mysqli_query($connection, $query);
    header("Location: Read.php");
}