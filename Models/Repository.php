<?php
require_once(dirname(__FILE__)."/../Config/Connexion.php"); 
require_once("Modeles.php");  

class DaoProduit{


    public function createProduit(Produit $produit)
    {
        //appel au PDO pour faire l'insertion
       
        $pdoConnexion = new PDOConnexion();
        $pdo = $pdoConnexion->createConnexion();

        $sql = "INSERT INTO Produit (libelle, prix, quantite)
                VALUES ('".$produit->getLibelle()."', '".$produit->getPrix()."', '".$produit->getQuantite()."')";
        $pdo->exec($sql);
        echo "<br/>New product created successfully";
    }

    public function listProduit()
    {
        //appel au PDO pour faire l'affichage

        $produits=array();
        $i=0;
        $pdoConnexion = new PDOConnexion();
        $pdo = $pdoConnexion->createConnexion();
        $strSQL = "SELECT * FROM produit";
        //execution de la requête et affichage des résultats
        foreach ($pdo->query($strSQL) as $row) {
            $produit = new Produit($row['libelle'],$row['prix'],$row['quantite']);
            $produit->setId($row['id']);
            //echo $row['libelle']." ".$row['prix']." ".$row['quantite']."<br/>";
            $produits[$i]=$produit;
            $i++;
        }
        return $produits;

        //$stmt = $pdo->prepare("SELECT * FROM produit");
        //$stmt->execute();
        //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //return $result;
        //var_dump($result);
    }

    public function deleteProduit(Produit $produit)
    {
        //appel au PDO pour faire la suppression
    }

    public function updateProduit(Produit $produit)
    {
        //appel au PDO pour faire la mise à jour
    }
}
?>