APLICACIÓN WEB TOPLAPTOP

CARPETAS:

    - connection: fichero php que contiene los datos de registro para conectar con la base de datos de la API.

    - crud: archivos PHP que permite, desde el archivo READ.php convenientemente, registrar (CREATE.php), modificar o actualizar (UPDATE.php) y borrar registros de cada Usuario.

        - Cuando queremos borrar un usuario o cliente, si hay un ordenador enlazado al ID de dicho cliente, 
        toda información relacionada con este ordenador en concreto se borra. Lo mismo ocurre si hay 
        una orden de reparación perteneciente a dicho ordenador.

    - lists: Aqui se muestran dos archivos ".php". Cada archivo muestra una página con un listado de Ordenadores y otra página con el listado de Ordenes o peticiones de reparación.

    - media: en esta carpeta se encuentran los iconos utilizados para las funcionalidades de registrar, modificar y eliminar usuario

    - style: contiene la hoja de estilo css utilizada para la lista de ordenadores, ordenes y usuarios
    y otra hoja de estilo usada para los formularios.