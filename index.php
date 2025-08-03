<?php 

session_start();
require_once "./view/header.php"; 
require_once "./controller/UserController.php";
require_once "./controller/RecetteController.php";
require_once "./config/Database.php";

use App\Controller\UserController;
use App\Config\Database;
use App\Controller\RecetteController;

//Instanciation de la BDD et appel de la fonction getConnection

$db =(new Database ())->getConnection ();

$userController = new UserController($db);
$recetteController = new RecetteController($db);

$action = $_GET ['action'] ?? 'home';

switch ($action) {
    case 'register':
        $userController->register(); //function do usercontroller
        break;

    case 'login':
        $userController->connection(); //function do usercontroller
        break;

        case 'logout':
        $userController->deconnection(); //function do usercontroller
        break;

    case 'addRecette':
        $recetteController->addRecette(); //function do addRecette
    break;

    case 'listDetails':
        $recetteController->show($_GET["id"]); //function do addRecette
    break;
    
    default:
        $recetteController->home();
        break;


}

