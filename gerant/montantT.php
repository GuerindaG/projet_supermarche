<?php
// Connexion à la base de données
include("connexion.php");

// Récupérer l'ID du client
$id_prod = $afficher['id_prod'];

// Initialiser le montant total
$prix_total = 0;

// Requête pour obtenir l'historique d'achat du client
$req_vente = "
    SELECT v.quantite AS quantite, p.prix_vente
    FROM vente AS v
    JOIN produit AS p ON v.id_prod = p.id_prod
    WHERE v.id_prod = $id_prod ";
    

if ($stmt = $connexion->prepare($req_vente)) {
    
    $stmt->execute();
    $show=$req_vente->fetch();
  $quantite=$show['quantite'];

    // Calculer le montant total des achats
    while ($stmt->fetch()) {
        $prix_total += $quantite * $prix_vente;
    }

    $stmt->close();
} else {
    echo "Erreur lors de la préparation de la requête : " . $connexion->error;
}


// Afficher le montant total
echo htmlspecialchars($prix_total);
?>
