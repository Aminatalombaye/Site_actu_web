	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Actualités </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div style="text-align: right; margin-bottom: 2px;"class="button-deconnecter">
    <a href="index.php?action=login">Se Deconnecter</a>

</div>
   
<div id="entete">
    
    <br>
    <br>
    
    <h1>ACTUALITÉS POLYTHECHNICIENNES</h1> 
    
    <br>
    <br>
    <hr>

    <table id="menu" align="center">
        <tr>
            <td class="menu-item"><a href="index.php">Accueil</a></td>
            <?php foreach ($this->categories as $index => $categorie): ?>
                <td<?= ($index === count($this->categories) - 1) ? ' class="menu-item last-item"' : ' class="menu-item"' ?>><span style="padding: 0 10px;">|</span><a href="index.php?action=categorie&id=<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></a></td>
            <?php endforeach ?>
        </tr>
    </table>
    

</div>

</body>
</html>
