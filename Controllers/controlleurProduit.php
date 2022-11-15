<?php
// récupération des données depuis le formulaire

$libelle = $_POST['libelle'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];

// création d'un objet Produit
require_once("../Models/Modeles.php");
$produit = new Produit($libelle,$prix,$quantite);

// création du manager (persister vers la base de données)
require_once("../Models/Repository.php");
$manager = new DaoProduit();
$manager->createProduit($produit);
header("Location:../index.php")

?>