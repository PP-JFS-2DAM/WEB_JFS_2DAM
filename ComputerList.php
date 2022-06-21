<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/css.css">
</head>
<body>

<?php
set_include_path('C:\Users\Joserra\Desktop\MisCursos\DAM\SemanaPracticas2\WEB_JFS_2DAM\localhost\OrderList.php');
$conection = "";
$name="";

include "connection/connection.php";
$query="select * from computer";
$result= mysqli_query($conection,$query);
?>
<div class = "title">LISTA DE ORDENADORES</div>
<div class = "table">
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
    <div class="field">
        <h4>Repaired</h4>
    </div>
</div>
<?php

while ($field = mysqli_fetch_object($result)) {


    echo '
            <div class = "table">
           
                <div class="field">
                
                <p>'.$field->computer_id.'</p>
                </div>
                <div class="field">
                
                <p>'.$field->user_id.'</p>
                 </div>
                 <div class="field">
                
                <p>'.$field->brand.'</p>
                 </div>
                  <div class="field">
                   
                <p>'.$field->model.'</p>
                 </div>
                  <div class="field">
                  
                <p>'.$field->ram.'</p>
                 </div>
                  <div class="field">
                  
                <p>'.$field->isRepaired.'</p>
                 </div>
            </div>';

}
?>
<div class = "cambioListas">
    <button class="btn"><a href="OrderList.php">Lista de ordenes de reparación</a></button>
</div>





