<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<?= view('navbar'); ?>
<div class="container mt-5">
    <h2 class="text-center">Liste des Utilisateurs :</h2>

    <table class="table table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Rôle</th>
                <th>Modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['username']) ?></td>
                    <td>
                        <form action="<?= base_url('update-role') ?>" method="post">
                            <input type="hidden" name="username" value="<?= esc($user['username']) ?>">
                            <select name="role" class="form-select">
                                <option value="UTILISATEUR" <?= $user['role'] == 'UTILISATEUR' ? 'selected' : '' ?>>UTILISATEUR</option>
                                <option value="ADMIN" <?= $user['role'] == 'ADMIN' ? 'selected' : '' ?>>ADMIN</option>
                            </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                        </form>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
