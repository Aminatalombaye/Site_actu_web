<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualités</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php require_once 'entete.php'; ?>

    <div id="contenu">

        <div style="text-align: right; margin-bottom: 20px;">
        <a href="index.php?action=ajouter_article" class="button-ajouter">Ajouter article</a>
    </div>
    <br>
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h1><a href="index.php?action=article&id=<?= $article['id'] ?>"><?php echo $article['titre']; ?></a></h1>
                <p><?php echo substr($article['contenu'], 0, 600) . '...'; ?></p>
                <p>
                    <a href="index.php?action=modifier_article&id=<?= $article['id'] ?>">Modifier</a> |
                    <a href="index.php?action=supprimer_article&id=<?= $article['id'] ?>">Supprimer</a>
                </p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="message">Pas d'article</div>
    <?php endif; ?>
    </div>
</body>
</html>
