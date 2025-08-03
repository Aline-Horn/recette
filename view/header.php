<?php //control + D para selecionar as ids.?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=home">Recettes</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                <a class="nav-link" href="index.php">Home</a>

                <?php if (!isset($_SESSION['user'])): ?>
               <a class="nav-link" href="?action=register">Register</a>
                <a class="nav-link" href="?action=login">Login</a>

                <?php else: ?>
                 <a class="nav-link" href="index.php?action=addRecette">Add Recette</a>
                <?php endif; ?>
            </div>
            <div class="d-flex align-items-center text-white">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="me-3">Bonjour, <?= htmlspecialchars($_SESSION['user']['firstname']) ?></span>
                    <a class="btn btn-sm btn-outline-light" href="index.php?action=logout">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

 
      <?php 
      if (isset ($_SESSION ["user"])){
        echo $_SESSION ["user"] ["firstname"];
      }
      
      ?>

    </div>
  </div>
</nav>

<?php

//Afichage de messages
if (!empty($_SESSION["error"])) {
    ?>
    <div class="alert alert-danger text-center">
        <?= $_SESSION["error"]; ?>
    </div>
    <?php
    unset($_SESSION["error"]); // destrói a session de erro
} elseif (!empty($_SESSION["success"])) {
    ?>
    <div class="alert alert-success text-center">
        <?= $_SESSION["success"]; ?>
    </div>
    <?php
    unset($_SESSION["success"]); // destrói a session de sucesso
}
?>

</body>
</html>


