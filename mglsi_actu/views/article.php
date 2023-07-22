<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Affichage d'un article</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include_once 'entete.php'; ?>
        <div id="contenu" style="padding-top: 60px;">
    <?php if (!empty($article)): ?>
        <h1><?php echo $article['titre']; ?></h1>
        <span>Publié le <?php echo $article['dateCreation']; ?></span>
        <p><?php echo $article['contenu']; ?></p>
    <?php else: ?>
        <div class="message">L'article n'existe pas</div>
    <?php endif; ?>
    </div>
    <p>
                    <a href="index.php?action=modifier_article&id=<?= $article['id'] ?>">Modifier</a> |
                    <a href="index.php?action=supprimer_article&id=<?= $article['id'] ?>">Supprimer</a>
                </p>

</body>
</html>
