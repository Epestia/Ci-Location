<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Maison</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<?= view('navbar'); ?>
    <h2>Formulaire de Création de Maison</h2>
    <form action="#" method="post">
        <label for="nom">Nom de la maison :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required>

        <label for="superficie">Superficie (m²) :</label>
        <input type="number" id="superficie" name="superficie" required>

        <label for="nombre_pieces">Nombre de pièces :</label>
        <input type="number" id="nombre_pieces" name="nombre_pieces" required>

        <label for="type">Type de maison :</label>
        <select id="type" name="type" required>
            <option value="appartement">Appartement</option>
            <option value="maison_individuelle">Maison individuelle</option>
            <option value="villa">Villa</option>
            <option value="autre">Autre</option>
        </select>

        <label for="description">Description :</label>
        <textarea id="description" name="description" rows="4"></textarea>

        <button type="submit">Créer</button>
    </form>
</body>
</html>
