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
$query="select * from computers";
$result= mysqli_query($conection,$query);
?>
<div class = "title">LISTA DE ORDENADORES</div>
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
                <p>'.$field->repaired.'</p>
                 </div>
            </div>';
}


?>

