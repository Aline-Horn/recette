<div class="container mt-4">
    <div class="row">
        <?php foreach ($list as $recette) { ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                <img src="../uploads/recette/<?= $recette['photo'] ?>" class="card-img-top" alt="<?= $recette['nom'] ?>" width="300">

                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($recette['nom']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($recette['ingredients']) ?>
                        <p class="card-text"><small class="text-muted">Par: <?= htmlspecialchars($recette['firstname']) . " " . htmlspecialchars($recette['lastname']) ?></small></p>
                        <a href="?action=listDetails&id=<?= $recette['id'] ?>" class="btn btn-primary">Voir Détails</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>