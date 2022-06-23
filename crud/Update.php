
<?php
$connection = "";
include "../connection/connection.php";

function renderForm($id, $name, $surname, $dni, $vip, $error)
{

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/css_form.css">
    <title>Update Client</title>
</head>
<body>
<?php

if ($error != '') {
    echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';
}
?>
<div id="content">
    <h1 class="update">UPDATE A CLIENT</h1>

<form class ="updateUser" action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
    <div class="fieldID">
        <strong><label class="labelID" >ID: <?php echo $id; ?></strong>
    </div>
        <div class="field">
            <label class="label" >Name</label>
                <input class="inp" type="text" name="name" value="<?php echo $name; ?>"
        </div>
            <div class="field">
                <label class="label" >Surname</label>
                <input class="inp" type="text" name="surname" value="<?php echo $surname; ?>"
            </div>
    <div class="field">
        <label class="label" >Personal ID</label>
        <input class="inp" type="text" name="dni" value="<?php echo $dni; ?>"
    </div>
    <div class="check">
        <label class="label" >Is this user VIP?:</label>

        <?php if ($vip== 1) {
            echo '<input class="inp" type="checkbox" checked="checked" name="vip" value='.$vip.'>';
        }else
            echo '<input class="inp" type="checkbox" name="vip" value='.$vip.'>'?>

    </div>
        <input class = "btn-log-reg" type="submit" name="submit" value="Update">
    </div>
</form>
</div>
</body>
</html>
<?php
}

if (isset($_POST['submit'])) {

    if (is_numeric($_POST['id'])) {

        $id = $_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $surname = htmlspecialchars($_POST['surname']);
        $dni = htmlspecialchars($_POST['dni']);

        $vip = htmlspecialchars($_POST['vip']);

    if(isset($_POST['vip']) &&
        $_POST['vip'] == '1')
    {
        echo $name . " is VIP";
    }
    else
    {
        echo $name . " is not VIP";
    }
        $query = "UPDATE user SET name = '$name', surname = '$surname', dni = '$dni', vip = '$vip' WHERE id = '$id'";
        mysqli_query($connection, $query) or die(mysqli_error());

        header("Location: Read.php");
    }
} else {

    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

        $id = $_GET['id'];
        $query = "SELECT * FROM user WHERE id='$id'";
        $result = mysqli_query($connection, $query) or die(mysqli_error());
        $row = mysqli_fetch_array($result);

        if ($row) {

            $name = $row['name'];
            $surname = $row['surname'];
            $dni = $row['dni'];
            $vip = $row['vip'];

            renderForm($id, $name, $surname, $dni,$vip, '');
        } else {
            echo "No hay resultados";
        }
    } else {
        echo "Error!";
    }
}
?>
