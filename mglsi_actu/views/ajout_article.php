<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ajouter un article</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body align="center">

    <?php include_once 'entete.php'; ?>
    <h2>Ajouter un article</h2>
<form action="index.php?action=ajouterArticle" method="post" class="article-form">

        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" required>
        <br>
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            <option value="">Sélectionnez une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['libelle']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" required></textarea>
        <br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
