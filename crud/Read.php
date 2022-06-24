<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/list.css">
    <title>Clients List</title>
</head>
<body>

<header>
<div class = "title">CLIENT LIST</div>
    <div class = "cambioListas">
        <div class="boton">
                <a href="../lists/ComputerList.php"><img src="/media/images/computer.png" alt="computer" class="btn"></a>
        </div>
        <div class="boton">
                <a href="../lists/WorkOrderList.php"><img src="/media/images/workorder.png" alt="order" class="btn"></a>
        </div>
</header>

<div class = "column_name">
    <div class="field">
        <h4>User_id</h4>
    </div>
    <div class="field">
        <h4>Name</h4>
    </div>
    <div class="field">
        <h4>Surname</h4>
    </div>
    <div class="field">
        <h4>Personal ID</h4>
    </div>
    <div class="field">
        <h4>VIP</h4>
    </div>
    <div class="field" style="background-color:darkblue; color: bisque";>
        <h4>Functions</h4>
    </div>
</div>
<?php
$connection = "";
include "../connection/connection.php";

$isVIP="";

$result = mysqli_query($connection,"SELECT * FROM user")
or die(mysqli_error());



while($field = mysqli_fetch_array( $result )) {

    if($field['vip'] == 1){
        $field['vip'] = $isVIP;
        $isVIP = $field['name']." is VIP";


    } else{
        $field['vip'] = $isVIP;
        $isVIP = $field['name']." is not VIP";



    }




    echo '<div class = "registers">
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
                <p>'. $field['dni'] .'</p>
                 </div>
                  <div class="field">
                <p>'.$isVIP. '</p>
                 </div>
                  <div class="crud">
                <a href="Create.php"><img class="icon" src="../media/icons/add.png" alt="Register"></a>
                <a href="Update.php?id=' . $field['id'] . '"><img class="icon" src="../media/icons/edit.png" alt="Edit"></a>
                <a href="Delete.php?id=' . $field['id'] . '"><img class="icon" src="../media/icons/delete.png" alt="Delete"></a>
                 </div>
            </div>
          ';


}

?>
</body>
</html>
