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

    <form method="post" action="">

  <div class="form-group">
    <label for="firstname">Votre prénom</label>
    <input type="firstname" class="form-control" id="exampleInputEmail1" name="firstname" aria-describedby="emailHelp">
  
  </div>

 <div class="form-group">
     <label for="lastname">Votre nom</label>
    <input type="lastname" class="form-control" id="exampleInputEmail1" name="lastname" aria-describedby="emailHelp">

  </div>

   <div class="form-group">
     <label for="email">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pwd">
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

</form>