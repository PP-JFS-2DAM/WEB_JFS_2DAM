<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/css.css">
    <title>Computer List</title>
</head>
<body>

<div class = "title">COMPUTER LIST</div>
<div class = "column_name">
    <div class="field">
        <h4>Computer_id</h4>
    </div>
    <div class="field">
        <h4>User_id</h4>
    </div>
    <div class="field">
        <h4>Brand</h4>
    </div>
    <div class="field">
        <h4>Model</h4>
    </div>
    <div class="field">
        <h4>RAM</h4>
    </div>
</div>

<?php
$connection = "";
include "connection/connection.php";

$result= mysqli_query($connection,"SELECT * FROM computer") or die(mysqli_error());

while($field = mysqli_fetch_array( $result )){

    echo '<div class = "registers">
                <div class="field">       
                <p>'. $field['id'] .'</p>
                </div>
                <div class="field">
                <p>'. $field['user_id'].'</p>
                 </div>
                  <div class="field">
                <p>'. $field['brand'] .'</p>
                 </div>
                 <div class="field">
                <p>'. $field['model'] .'</p>
                 </div>
                  <div class="field">
                <p>'. $field['ram'] .'</p>
                 </div>
            </div>';
}
?>
<div class = "cambioListas">
    <button class="btn"><a href="WorkOrderList.php">Order list</a></button>
    <button class="btn"><a href="../crud/Read.php">Client list</a></button>
</div>





