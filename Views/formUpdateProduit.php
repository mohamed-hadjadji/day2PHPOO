<html>
<head><title>PDO-DAO</title></head>

<body>
    <?php
    require_once("../Models/Repository.php");
    $manager = new DaoProduit();
    $id = $_GET['id'];
    $produits = $manager->listProduitId($id);
    ?>
    <h1 align="center">Formulaire d'ajout d'un nouveau produit</h1>
    <form method="post" action="../Controllers/controlleurProduit.php">
    <?php
    
    foreach($produits as $produit)
    { ?>
        Libelle : <input type="text" name="libelle" value="<?php echo $produit->getLibelle()?>"/>
        <br/>
        Prix : <input type="text" name="prix" value="<?php echo $produit->getPrix()?>"/>
        <br/>
        Quantité : <input type="number" name="quantite" value="<?php echo $produit->getQuantite()?>"/>
        <br/>
    <?php
    }?>
       <input type="submit" value="Ajouter" />
    </form>
</body>

</html>