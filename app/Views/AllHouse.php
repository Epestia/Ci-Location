<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des maisons</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<?= view('navbar'); ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Liste des maisons</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>Adresses</th>
                <th>Descriptions</th>
                <th>Villages</th>
                <th>Pays</th>
                <th>Photos</th>
                <?php if (session()->get('role') === 'ADMIN') : ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($maisons as $maison) : ?>
                <tr class="text-center align-middle">
                    <td><?= esc($maison['id']); ?></td>
                    <td><?= esc($maison['nom']); ?></td>
                    <td><?= esc($maison['description']); ?></td>
                    <td><?= esc($maison['village']); ?></td>
                    <td><?= esc($maison['pays']); ?></td>
                    <td>
                        <?php if (!empty($maison['photo'])) : ?>
                            <img src="<?= base_url($maison['photo']); ?>" alt="Photo de la maison" class="img-thumbnail" width="100">
                        <?php else : ?>
                            <span class="text-muted">Pas d'image</span>
                        <?php endif; ?>
                    </td>
                    <?php if (session()->get('role') === 'ADMIN') : ?>
                        <td>
                            <a href="<?= base_url('house/edit/' . $maison['id']); ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="<?= base_url('house/delete/' . $maison['id']); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Voulez-vous vraiment supprimer cette maison ?');">
                                Supprimer
                            </a>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>