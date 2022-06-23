<?php
$connection = "";
include "../connection/connection.php";

function renderForm($name, $surname, $dni, $vip, $error)
{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../style/form.css">
    <title>Create User</title>
</head>
<body>

<div id="content">
    <h1 class="register">REGISTER A CLIENT</h1>

    <form class ="registerUser" action="" method="post">
        <!--<input type="hidden" name="id" value="<?php //echo $id; ?>"/>-->
        <div class="field">
            <label class="label" >*Name</label>
            <input class="inp" type="text" name="name" value="">
        </div>
        <div class="field">
            <label class="label" >*Surname</label>
            <input class="inp" type="text" name="surname" value="">
        </div>
        <div class="field">
            <label class="label" >*Personal ID</label>
            <input class="inp" type="text" name="dni" value=""
        </div>

        <div class="check">
            <label class="label" >Is this user VIP?:</label>
            <input class="inp" type="checkbox" name="vip" value="1">

        </div>


        <input class = "btn-log-reg" type="submit" name="submit" value="Register">

        <?php
        if ($error != '') {
            echo '<div style="background-color: red; margin:20px; padding:4px; border:1px solid red;color:#fff;">' . $error . '</div>';
        }
        ?>
</form>
</div>

</body>
</html>
<?php
}

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $dni = htmlspecialchars($_POST['dni']);

    $vip = htmlspecialchars($_POST['vip']);


    if(isset($_POST['vip']) &&
        $_POST['vip'] == 'value')
    {
        echo $name . " is VIP";
    }
    else
    {
        echo $name . " is not VIP";

    }

    if ($name == '' || $surname == '' || $dni == '') {
        $error = 'ERROR: Please, Introduce the required field!';
        renderForm($name, $surname,$dni,$vip, $error);
    } else {
        $query = "INSERT user SET name='$name', surname = '$surname', dni = '$dni', vip= '$vip'"
        or die(mysqli_error());
        mysqli_query($connection, $query);

        header("Location: Read.php");
    }
    } else {
        renderForm('', '', '', '',"");
    }
?>
