<?php
namespace App\Model;

require_once __DIR__.'/../config/Mongo.php';

use App\config\Mongo;

class Comment {
    private $collection;

    public function __construct () 
    {
        $this->collection = Mongo::getDB()->selectCollection('comments');
    }

    public function addComment(array $data) {

        $this->collection->insertOne([
            "recette_id" =>$data["recette_id"],
            "auteur" =>$data["auteur"],
            "texte" =>$data["texte"],
            //"created_at" =>$data["created_at"],
            "created_at" =>date("d/m/Y \à H:i"),
            "note" =>(int)$data["note"]
        ]);
    }
 
   //Recupération de tous les commentaires de chaque recette
    public function getCommentsByRecipe(string $recipeId){

        return $this->collection->find(
            ['recette_id' =>  $recipeId ],
            ['sort' => ['created_at' => -1 ]]
        )->toArray();
    }

}