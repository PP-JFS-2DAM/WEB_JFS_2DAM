<?php
$connection = "";
include "../connection/connection.php";

function renderForm($name, $surname, $dni, $vip_user, $error)
{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/css_form.css">
    <title>Create User</title>
</head>
<body>

<div id="content">
    <h1 class="register">REGISTER A CLIENT</h1>

    <form class ="registerUser" action="" method="post">
        <!--<input type="hidden" name="id" value="<?php //echo $id; ?>"/>-->
        <div class="field">
            <label class="label" >*Name</label>
            <input class="inp" type="text" name="name" value="<?php echo $name; ?>"
        </div>
        <div class="field">
            <label class="label" >*Surname</label>
            <input class="inp" type="text" name="surname" value="<?php echo $surname; ?>"
        </div>
        <div class="field">
            <label class="label" >*DNI</label>
            <input class="inp" type="text" name="dni" value="<?php echo $dni; ?>"
        </div>

        <div class="check">
            <label class="label" >Is this user VIP?:</label>
            <input class="inp" type="checkbox" name="vip_user" value="<?php echo $vip_user; ?>">

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


    $vip_user = htmlspecialchars($_POST['vip_user']);

    if(isset($_POST['vip_user']) &&
        $_POST['vip_user'] == '1')
    {
        echo $name . " is VIP";
        $vip_user = (string)$vip_user;
        $vip_user = "VIP";
    }
    else
    {
        echo $name . " is not VIP";
        $vip_user = 0;
    }

    if ($name == '' || $surname == '' || $dni == '') {
        $error = 'ERROR: Please, Introduce the required field!';
        renderForm($name, $surname,$dni,$vip_user, $error);
    } else {
        $query = "INSERT user SET name='$name', surname = '$surname', dni = '$dni', vip_user = '$vip_user'"
        or die(mysqli_error());
        mysqli_query($connection, $query);

        header("Location: Read.php");
    }
    } else {
        renderForm('', '', '', '',"");
    }
?>
