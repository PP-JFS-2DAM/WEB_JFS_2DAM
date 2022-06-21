
<?php
$connection = "";
include "../connection/connection.php";

function renderForm($id, $name, $surname,$dni, $error)
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
    <h1 class="update">Update a client</h1>

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
        <label class="label" >DNI</label>
        <input class="inp" type="text" name="dni" value="<?php echo $dni; ?>"
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
        $query = "UPDATE user SET name = '$name', surname = '$surname', dni = '$dni' WHERE id = '$id'";
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

            renderForm($id, $name, $surname, $dni, '');
        } else {
            echo "No hay resultados";
        }
    } else {
        echo "Error!";
    }
}
?>
