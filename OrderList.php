<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css.css">
</head>
<body>

<?php
//set_include_path('C:\Users\Joserra\Desktop\MisCursos\DAM\SemanaPracticas2\WEB_JFS_2DAM\localhost\OrderList.php');
$connection = "";

include "connection/connection.php";
$query= "SELECT * FROM 'order'";
$result= mysqli_query($connection,$query);


if (!$result) {
    echo(mysqli_error($connection));
}
?>
<div class = "title">LISTA DE ORDENES</div>

    <div class = "table">
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
            <h4>Date</h4>
        </div>
        <div class="field">
            <h4>Description</h4>
        </div>
    </div>
<?php
        /*while ($field = mysqli_fetch_object($result)) {
        echo '
            <div class = "table">
                <div class="field">       
                <p>'.$field->order_id.'</p>
                </div>
                <div class="field">
                <p>'.$field->computer_id.'</p>
                 </div>
                  <div class="field">
                <p>'.$field->technical_id.'</p>
                 </div>
                 <div class="field">
                <p>'.$field->order_date.'</p>
                 </div>
                  <div class="field">
                <p>'.$field->description.'</p>
                 </div>
            </div>';
        }
*/
while($field = mysqli_fetch_array( $result ))
{
    echo '<div class = "table">
                <div class="field">       
                <p>'. $field['id'] .'</p>
                </div>
                <div class="field">
                <p>'. $field['name'] .'</p>
                 </div>
                  <div class="field">
                <p>'. $field['surname'] .'</p>
                 </div>
                 <div class="field">
                <p>'. $field['DNI'] .'</p>
                 </div>
                  <div class="field">
                <p>'. $field['isVIP'] .'</p>
                 </div>
            </div>';
}
?>
<div class = "cambioListas">
    <button class="btn"><a href="ComputerList.php">Lista de ordenadores</a></button>
</div>





