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

include "conection/conection.php";
$query="select * from orders";
$result= mysqli_query($conection,$query);
?>
<div class = "title">LISTA DE ORDENES</div>
<?php
        while ($field = mysqli_fetch_object($result)) {
        echo '
            <div class = "table">
                <div class="field">
                <p>'.$field->order_id.'</p>
                </div>
                <div class="field">
                <p>'.$field->computer_id.'</p>
                 </div>
                 <div class="field">
                <p>'.$field->date.'</p>
                 </div>
                  <div class="field">
                <p>'.$field->description.'</p>
                 </div>
            </div>';
        }
?>




