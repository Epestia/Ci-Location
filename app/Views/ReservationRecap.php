<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de la Réservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?= view('navbar', ['class' => 'fixed-top']); ?>
<div class="container">
    <h1 class="my-4">Récapitulatif de votre Réservation</h1>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Informations de la réservation</h4>
            <p><strong>Utilisateur :</strong> <?= esc($username); ?> (<?= esc($email); ?>)</p>
            <p><strong>Maison :</strong> <?= esc($maison_nom); ?></p>
            <p><strong>Date de début :</strong> <?= esc($debut); ?></p>
            <p><strong>Date de fin :</strong> <?= esc($fin); ?></p>
            <p><strong>Statut :</strong> <?= esc($statut); ?></p>
        </div>
    </div>

    <a href="<?= site_url('reservation/create'); ?>" class="btn btn-primary mt-3">Nouvelle réservation</a>
</div>
</body>
</html>
