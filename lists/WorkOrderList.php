<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/list.css">
</head>
<body>

<div class = "title">ORDER LIST</div>
<div class = "column_name">
    <div class="field">
        <h4>Order_id</h4>
    </div>
    <div class="field">
        <h4>Computer_id</h4>
    </div>
    <div class="field">
        <h4>Technical_id</h4>
    </div>
    <div class="field">
        <h4>Component</h4>
    </div>
    <div class="field">
        <h4>Repair Date</h4>
    </div>
</div>

<?php
$connection = "";
include "../connection/connection.php";

$result= mysqli_query($connection,"SELECT * FROM work_order") or die(mysqli_error());

while($field = mysqli_fetch_array( $result ))
{
    echo '<div class = "registers">
                <div class="field">       
                <p>'. $field['id'] .'</p>
                </div>
                <div class="field">
                <p>'. $field['computer_id'] .'</p>
                 </div>
                  <div class="field">
                <p>'. $field['technical_id'] .'</p>
                 </div>
                 <div class="field">
                <p>'. $field['description'] .'</p>
                 </div>
                  <div class="field">
                <p>'. $field['order_date'] .'</p>
                 </div>
            </div>';
}
?>
<div class = "cambioListas">
    <button class="btn"><a href="ComputerList.php">Computer list</a></button>
    <button class="btn"><a href="../crud/Read.php">Client list</a></button>
</div>





