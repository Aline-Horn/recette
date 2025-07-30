<?php
namespace App\Controller;

require_once __DIR__ . '/../Model/Recette.php';
require_once __DIR__ . '/../Model/Comment.php'; 

use App\Model\Comment;
use App\Model\Recette;

class RecetteController {
    private Recette $recette;

    public function __construct($db)
    {
        $this->recette = new Recette ($db);
    }
//function qui va appaler dans le index
    public function addRecette (){
        if (isset ($_POST ['addRecette']) && isset ($_FILES ['photo'])) {
        //$this->recette->add();
           
        //UPLOAD FILE
        
        $image_name =$_FILES ["photo"]["name"];

        $destination = "uploads/recette";

        //CREATION DU DOSSIER -> UPLOAD/RECETTE

        if (!is_dir($destination)) {
            mkdir ($destination,0777,true); //NUMERO CORRESPONDE A PERMISSAO
        }

        move_uploaded_file ($_FILES["photo"]["tmp_name"], "$destination/$image_name");

        if ($this->recette->add ($image_name, $_POST["nom"], $_POST["ingredients"], $_SESSION["user"]["id"])) {
            header ("Location:index.php");
            exit;
        }

    }

    require_once __DIR__."/../view/recette/add.php";
    }

    public function home () {
        $list = $this->recette->read();
        require_once __DIR__."/../view/recette/home.php"; 
    }

    public function show (int $id) {

        //APPEL MODEL COMMENTAIRE

        $commentModel = new Comment (); 
        if (isset($_POST['addComment'])) {
            $commentModel->addComment([
            "recette_id"=> $_POST ['recette'],
            "auteur"=> $_SESSION ['user']['firstname']. " ". $_SESSION['user']['lastname'],
            "texte"=> $_POST ['texte'],
            "note"=> $_POST ['note'],
            ]);
        }

            
        // AFFICHAGE DES COMMENTAIRES PAR RECETTE
        $comments = $commentModel->getCommentsByRecipe($id);

        $detail = $this->recette->showRecette($id);

        require_once __DIR__."/../view/recette/show.php"; 
    }
}