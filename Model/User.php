<?php
namespace App\Model;

use PDO;

class User {
private PDO $conn;
public function __construct($db)
{
    $this->conn = $db;
}

//création d'un utilisateur CRUD -->

public function create (string $firstname, string $lastname, string $email, string $pwd){

    $sql = "INSERT INTO users (firstname, lastname, email, pwd) VALUES
    (:firstname, :lastname, :email,:pwd)
    ";
$smt = $this ->conn->prepare ($sql); //pour sécuriser; protéeger contre SQL injection

$hash= password_hash ($pwd, PASSWORD_BCRYPT);

return $smt->execute ([
    ':firstname'=> $firstname, //:firstname - placeholders
    ':lastname'=> $lastname,
    ':email'=> $email,
    ':pwd'=> $hash

        ]);
    }

//Check if mail exist

public function findByEmail(string $email): array|false{
$sql = "SELECT * FROM users WHERE email =:email";
$stmt = $this->conn->prepare ($sql);
$stmt ->execute ([
    ":email"=>$email
    
]);

return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    /*LOGIN  */

public function login (string $email, string $pwd): array | false {
    $user = $this->findByEmail ($email); 
    if (password_verify($pwd, $user["pwd"])) {
 return $user;
    }
    return false;
    }

}