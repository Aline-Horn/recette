<?php
namespace App\Model;

use PDO;

class Recette {
    private PDO $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    //Créer recette
    public function add(string $photo, string $nom, string $ingredients, int $auteur): bool 
    {
        $sql = "INSERT INTO recettes (nom, ingredients, auteur, photo) 
                VALUES (:nom, :ingredients, :auteur, :photo)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':nom' => $nom, 
            ':ingredients' => $ingredients,
            ':auteur' => $auteur,
            ':photo' => $photo
        ]);
    }

    //Affichage recette 

    public function read() {
        $sql = "SELECT recettes.*, firstname, lastname 
        FROM recettes INNER JOIN users ON recettes.auteur = users.id";

        return $this->conn->query($sql)->fetchAll();
        
    }

    public function showRecette(int $id) {
        $sql = "SELECT recettes.*, firstname, lastname 
        FROM recettes INNER JOIN users ON recettes.auteur = users.id
        WHERE recettes.id=:id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':id' => $id, 
              ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}
