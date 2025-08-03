<div class="container mt-5">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="../uploads/recette/<?= $detail['photo'] ?>" class="card-img-top" alt="<?= $detail['nom'] ?>">

                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <h1 class="h2 mb-3"><?= htmlspecialchars($detail['nom']) ?></h1>
                <div class="mb-3">
                    <span class="h4 me-2">Par: <?= htmlspecialchars($detail['firstname']) ." ".
                     htmlspecialchars($detail['lastname']) ?></span>
                </div>

                <p class="mb-4"><?= htmlspecialchars($detail['ingredients'])?></p>

            </div>
    </div>

    
    <div class="comment">
        <form action="" method="post">
        <input type="hidden" name="recette" placeholder="recette" value="<?= $detail['id'] ?>" /> <br>

        <textarea name="texte" id="" cols="30" rows="10"></textarea> <br>
        <select name="note" id="note">

            <option value="5">★★★★★</option>
            <option value="4">★★★★</option>
            <option value="3">★★★</option>
            <option value="2">★★</option>
            <option value="1">★</option>

        </select>

       <button type="submit" name="addComment" class="btn btn-outline-warning">Je commente</button>
    </form>

    </div>

    </div>
 