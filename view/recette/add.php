<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

  <div class="container mt-5">
    <form method="post" enctype="multipart/form-data">

      <div class="form-group mb-3">
        <label for="nom">Nom de votre plat</label>
        <input type="text" class="form-control" id="nom" name="nom">
      </div>

      <div class="form-group mb-3">
        <label for="ingredients">Ingrédients</label>
        <textarea id="ingredients" name="ingredients" cols="30" rows="5" class="form-control"></textarea>
      </div>

      <div class="form-group mb-3">
        <label for="photo">Photo recette</label>
        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary" name="addRecette">Partager</button>

    </form>
  </div>

</body>
</html>

