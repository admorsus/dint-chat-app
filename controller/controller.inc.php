<?php

/*
*	Muestra el contenido de la parte central de la página
*	E:
*	S:
*	SQL:
*/
function show_content() {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {	// GET
		if (!isset($_GET['cmd'])){									// carga inicial de la página
			show_loging();
		}
		else {
			switch ($_GET['cmd']) {									// vemos qué llegóó por el GET
				case 'chats':
					show_chats();
					break;

				case 'chat':
					show_chat();
					break;

				case 'perfil':
					show_perfil();
					break;

				case 'ajustes':
					show_ajustes();
					break;

				case 'logout':
					show_loging();
					show_msg("Ha cerrado la sesión");
					break;	
					
				case '@fulanito':
					mostrar_usuario();
				break;

				default:
					"Error, operación no permitida";
					break;
			}

		}
	}
	else {														// POST
		if (isset($_POST['login'])) {

			if (isset($_SESSION['user'])) {							// login ok en actualizar_sesion()
					show_chats();
				}
			else {
				show_loging();
			}
			
		}

		elseif (isset($_POST['contestar'])) {						//contestar ok
			
			if (tamaño_img()) {

				if (guardar_mensaje()) {
					show_msg("Mensaje enviado");
					show_chats();
				}
				else {
					show_msg("Error no enviado");
				}
				
			}

			else {
				show_msg("Error, imagen demasiado grande");
			}
		}

		elseif (isset($_POST['editar'])) {							//click editar 
			
			if (maximo_caracteres_estado()) {
				
				if (perfil_modificado()) {
					show_msg("Perfil modificado");
					show_chats();
				}
				else {
					show_msg("Error al modificar el perfil");
				}

			}
			else {
				show_msg("Error máximo de caracteres");
			}

			
		}

		elseif (isset($_POST['guardar_color'])) {					//click en guardar color
			
			if (color_seleccionado()) {
				show_msg("Color cambiado");
				show_chats();
			}
			else {
				show_msg("Error no se cambio de color");
			}
		}

		elseif (isset($_POST['backup'])) {							//click en backup
			
			if (backup_chat()) {
				show_msg("backup guardado");
				show_chats();
			}
			else {
				show_msg("Error no realizar el backup");
			}
		}
		
	}
}

/*
* Realiza algunas acciones relacionadas con la sesión
* S: 
* SQL:
*/
function actualizar_sesion() {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {		// POST

		if (isset($_POST['login'])) {

			if (login_ok()) {
				$_SESSION['user'] = $_POST['numero'];	// Creamos la sesión
				/* Esta línea a continuación se usa si tuvieramos una administración 
				* en la aplicación (teléfono 611111111)
				* El resto de funciones (por ejemplo show_menu) miran
				* este valor para saber si tienen que mostrar más o menos opciones
				*/
				$_SESSION['admin'] = ($_POST['numero'] == '611111111');
			}

		}

	} else {											// GET

		if (isset($_GET['cmd'])) {						// comprobamos si entro a cmd
 
			if  ($_GET['cmd'] == 'logout') { 			// logout ?? 

				unset($_SESSION);
				session_destroy();
			}

		}
	}
}


?>
