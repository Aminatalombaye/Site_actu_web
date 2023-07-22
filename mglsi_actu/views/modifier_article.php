<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Modifier l'article</title>
</head>
<body align="center">
    <?php include_once 'entete.php'; ?>

    <h2>Modifier l'article</h2>

    <?php if ($article): ?>
    <form action="index.php?action=modifier_article&id=<?php echo $article['id']; ?>" method="post" class="article-form">
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?php echo $article['titre']; ?>" required>
        <br>

       <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie">
            <option value="">Sélectionnez une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>" <?php if ($categorie['id'] === $article['categorie']) echo 'selected'; ?>><?php echo $categorie['libelle']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>


        <label for="contenu">Contenu :</label>
        <textarea id="contenu" name="contenu" required><?php echo $article['contenu']; ?></textarea>
        <br>

        <input type="submit" value="Modifier">
    </form>
    <?php else: ?>
    <p>L'article n'existe pas ou l'ID de l'article est incorrect.</p>
    <?php endif; ?>

</body>
</html>
