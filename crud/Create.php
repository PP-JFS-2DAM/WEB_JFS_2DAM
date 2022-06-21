<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/css_form.css">
    <title>Create User</title>
</head>
<body>

<div id="content">
    <h1 class="register">Add a client</h1>

    <form class="registerUser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <!-- Nombre de usuario -->
        <div class="field">
        <label class="label">Name:</label>
        <input class="placeholder" name="new-username" class="form-control"
        </div>

        <!-- Apellido de usuario -->
        <div class="field">
        <label class="label" class="label">Surname:</label>
        <input class="placeholder" name="new-username" class="form-control"
        </div>

        <!-- DNI de usuario -->
        <div class="field">
        <label id="label" class="label">DNI</label>
        <input class="placeholder" name="new-username" class="form-control"
        </div>

        <!-- ¿esVIP? -->
        <div class="check">
            <label for="VIP">VIP</label>
            <input type="checkbox" id="esVIP" name="VIP" value="VIP">


        </div>


        <button class="btn-log-reg" type="submit">Register</button>
    </form>
</div>
</body>

<?php
/*
Permite a los usuarios crear una nueva entrada en la base
de datos
*/
// crear el nuevo formulario de nuevo registro
function renderForm($name, $surname, $dni, $vip_user, $error)
{
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Register User</title>
</head>
<body>
<?php
// Si hay errores, los muestra en pantalla
if ($error != '') {
    echo '<div style="padding:4px; border:1px solid red;color:#ff0000;">' . $error . '</div>';
}
?>
<form action="" method="post">
    <div>
        <strong>Nombre: *</strong> <input type="text" name="nombre" value="<?php echo $nombre; ?>"
        /><br/>
        <strong>Apellido: *</strong> <input type="text" name="apellido" value="<?php echo $apellido; ?>"/><br/>
        <p>* Requerido</p>
        <input type="submit" name="submit" value="Submit">
    </div>
</form>
</body>
</html>
<?php
}

// conectamos a la base de datos
include('connect-db.php');
// Comprueba si el formulario ha sido enviado.
// Si se ha enviado, comienza el proceso el formulario y guarda los datos en la DB
if (isset($_POST['submit'])) {
// Obtenemos los datos del formulario, asegur ndonos que son validos .
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
// Comprueba que ambos campos han sido introducidos
    if ($nombre == '' || $apellido == '') {
// Genera el mensaje de error
        $error = 'ERROR: Por favor, introduce todos los
campos requeridos.!';
// Si ninguún campo esta en blanco, muestra el formulario otra vez
        renderForm($nombre, $apellido, $error);
    } else {
// guardamos los datos en la base de datos
        $sentencia = "INSERT players SET nombre='$nombre', apellido = '$apellido' " or die(mysqli_error());
        mysqli_query($connection, $sentencia);
        /* Una vez que han sido guardados, redirigimos a la página de vista principal*/
        header("Location: VIEW.php");
    }
} else { // Si el formulario no han sido enviado, muestra el formulario
    renderForm('', '', '');
}
?>
