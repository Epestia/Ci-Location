<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Indisponibilité</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?= view('navbar'); ?>

<div class="container">
    <h1 class="my-4">Modifier une Indisponibilité</h1>

    <form action="<?= site_url('indisponibilites/update/' . $indisponibilite['id']); ?>" method="post">
        <div class="form-group">
            <label for="maison_id">Maison :</label>
            <input type="text" name="maison_id" id="maison_id" class="form-control" value="<?= esc($indisponibilite['maison_id']); ?>" required>
        </div>

        <div class="form-group">
            <label for="debut">Date de début :</label>
            <input type="date" name="debut" id="debut" class="form-control" value="<?= esc($indisponibilite['debut']); ?>" required>
        </div>

        <div class="form-group">
            <label for="fin">Date de fin :</label>
            <input type="date" name="fin" id="fin" class="form-control" value="<?= esc($indisponibilite['fin']); ?>" required>
        </div>

        <div class="form-group">
            <label for="raison">Raison :</label>
            <textarea name="raison" id="raison" class="form-control"><?= esc($indisponibilite['raison']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="<?= base_url('indisponibilites/all'); ?>" class="btn btn-secondary">Annuler</a>
    </form>
</div>

</body>
</html>
