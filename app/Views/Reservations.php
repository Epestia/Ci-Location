<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Réservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?= view('navbar', ['class' => 'fixed-top']); ?>
<div class="container">
    <h1 class="my-4">Créer une Réservation</h1>

    <form action="<?= site_url('reservation/save'); ?>" method="POST">
        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <input type="hidden" id="user_id" name="user_id" value="<?= esc(session()->get('user_id')); ?>">
            <p class="form-control-plaintext">
                <?= esc(session()->get('username')); ?> - <?= esc(session()->get('email')); ?>
            </p>
        </div>

        <div class="form-group">
            <label for="maison_id">Maison</label>
            <select id="maison_id" name="maison_id" class="form-control" required>
                <option value="">Sélectionner une maison</option>
                <?php foreach ($maisons as $maison): ?>
                    <option value="<?= esc($maison['id']); ?>"><?= esc($maison['nom']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="debut">Date de début</label>
            <input type="date" id="debut" name="debut" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fin">Date de fin</label>
            <input type="date" id="fin" name="fin" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="statut">Statut</label>
            <select id="statut" name="statut" class="form-control" required>
                <option value="En attente">En attente</option>
                <option value="Confirmée">Confirmée</option>
                <option value="Annulée">Annulée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Réserver</button>
    </form>
</div>
</body>
</html>