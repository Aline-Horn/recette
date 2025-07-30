<?php
namespace App\Controller; //pour chaque entité (table) dans le model, on a un controller; par exemple: model/ user.php ===>controller/UserController.php.

require_once "./Model/User.php";
use App\Model\User;

class UserController {

    private User $user;

    public function __construct ($db) {
        $this->user = new User ($db);
    }

   public function register()
{
    // Affichage du formulaire de création de compte
    if (isset($_POST["submit"])) {

        $firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]) : "";
        $lastname = isset($_POST["lastname"]) ? trim($_POST["lastname"]) : "";
        $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
        $password = $_POST["pwd"] ?? "";

        if ($this->user->findByEmail($email)) {
            $_SESSION["error"] = "Email já existe.";
        } else {
            $this->user->create($firstname, $lastname, $email, $password);
            $_SESSION["success"] = "Conta criada com sucesso!";
        }

        // Redireciona para pagina login apos inscricao
        header('Location: ?action=login');
        exit;
    }

    // Exibe o formulário de Criacao de conta
    require __DIR__ . '/../view/user/register.php';
}

    /* Appel de la fonction Login depuis le model */

    public function connection() {

        if (isset($_POST["login"])) { 

        if ($this->user->login($_POST["email"], $_POST["pwd"])) {
         $_SESSION ["user"] =  ($this->user->login($_POST["email"], $_POST["pwd"]));
            header ("Location: ?action=home");
            exit;
        } else {
            
         $_SESSION ["error"]= "Email ou mot de passe incorrects";
                 require __DIR__.'/../view/user/login.php';
                 return;
        } 
    }

        require __DIR__.'/../view/user/login.php';
    }

public function deconnection () {
session_destroy();
header ("Location: ?action=login");
exit;
}

}