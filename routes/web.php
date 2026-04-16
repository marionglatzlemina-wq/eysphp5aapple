<?php
session_start();

require_once '../app/controllers/SexoController.php';

$requestUri = $_SERVER["REQUEST_URI"];
$basePath = '/eysphp5aapple/public/';
// Remover el prefijo basePath
$route = str_replace($basePath, '', $requestUri);
$route = strtok($route, '?'); // Quitar parámetros GET

$controller = new SexoController();

switch ($route) {
    case '':
    case 'idsexo':
    case 'idsexo/index':
        $controller->index();
        break;

    case 'idsexo/edit':
        if (isset($_GET['idsexo'])) {
            $controller->edit($_GET['idsexo']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
    case 'idsexo/eliminar':
        if (isset($_GET['idsexo'])) {
            $controller->eliminar($_GET['idsexo']);
        } else {
            echo "Error: Falta el ID para editar.";
        }
        break;
	
case 'idsexo/delete':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->delete();
    }
    break;




case 'id/update':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->update();
    }
    break;



    default:
        echo "Error 404: Página no encontrada.";
        break;
}
