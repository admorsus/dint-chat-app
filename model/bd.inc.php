<?php	
/*
*    Conexión a la base de datos
*    E:
*    S: conn (variable de tipo connection)
*    SQL:
*/
function connection() {

	include 'configuration.inc.php';
			/* servidor de la BD */
	//
	$conexion = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
    if($conexion == true){
        echo "<p>Conexión realizada correctamente</p>";
        return $conexion;
    }
    else
        echo "<p>Conexión fallida</p>";
        return null;
 }
/*
*    Comprueba login
*    E:
*    S: booleano: conexión correcta
*    SQL: select * from usuarios WHERE ...
*/

function login_ok()    {
	include("configuration.inc.php");
	$ret = true;
	$conexion = mysqli_connect($SERVER, $USER, $PASSWORD, $DB);
	if($conexion){
		$sql = 'SELECT tfno,pass from usuario where tfno = "'.$_POST['numero'].'" and pass = "'.$_POST['pass_user'].'"';
		$resultado = mysqli_query($conexion,$sql);
		$fila = mysqli_num_rows($resultado);
		$ret = ($fila != 0);
	}
	mysqli_close($conexion);
	return $ret;
}


	/*
	*	Guardar el mensaje en la BD
	*	E:
	*	S:boolean: operación correcta
	*	SQL: INSERT into Escribe (texto, adjunto) values ($_POST['contestar'], $_POST['b1']);
	*		 
	*		 SELECT idMensaje, texto, fecha, hora, fichero, telefono from Escribe
	*/
	function guardar_mensaje() {
		return true;
	}

	/*
	*	Funcion que modifica el perfil
	*	E:
	*	S:
	*	SQL: UPDATE into usuario SET
			nick = $_POST['nombre'],
			avatar = $_POST['b1'],
			estado = $_POST['estado']
			WHERE tfno = $_POST['usuario'];
	*/
	function perfil_modificado() {
		return true;
	}

	/*
*	Comprueba el máximo número de caracteres del texto del estado del 
* 	usuario, configurable 
*	E:
*	S: booleano: ($_POST['estado'] <= $LONG_TEXTO)
*	SQL: 
*/
function maximo_caracteres_estado() {
	return true;
}

/*
*	Guarda el color seleccionado en el fichero de configuración
*	E:
*	S: 
*	SQL:
*		$BACK_COLOR = $_POST['']
*/
function color_seleccionado() {
	return true;
}

/*
*	Comprueba el tamaño de la imagen seleccionada, el tamaño de la 
* 	imagen estara en el fichero de configuración
*	E:
*	S: booleano: tamaño correcto
*	SQL: 
*/
function tamaño_img() {
	return true;
}


/*
*	Función que guarda el chat en un fichero backup.txt
*	E:
*	S: booleano: guardado correctamente
*	SQL:
*/
function backup_chat() {
	return true;
}

?>