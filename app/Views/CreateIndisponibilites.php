<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Indisponibilité</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?= view('navbar', ['class' => 'fixed-top']); ?>

<div class="container">
    <h1 class="my-4">Créer une Indisponibilité</h1>

    <form action="<?= base_url('indisponibilites/save') ?>" method="post">
        <div class="form-group">
            <label for="maison_id">Maison :</label>
            <select name="maison_id" id="maison_id" class="form-control" required>
                <option value="">Sélectionnez une maison</option>
                <?php foreach ($maisons as $maison): ?>
                    <option value="<?= esc($maison['id']) ?>"><?= esc($maison['nom']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="debut">Date de début :</label>
            <input type="date" name="debut" id="debut" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fin">Date de fin :</label>
            <input type="date" name="fin" id="fin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="raison">Raison :</label>
            <textarea name="raison" id="raison" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
    </form>
</div>

</body>
</html>
