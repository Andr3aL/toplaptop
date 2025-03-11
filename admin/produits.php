<?php

require_once "../inc/functions.inc.php";





$products = allProducts();
debug($products);


require_once "../inc/header.inc.php";

?>



<div class="d-flex flex-column m-auto mt-5 table-responsive">   
         <!-- tableau pour afficher toutles films avec des boutons de suppression et de modification -->
        <h2 class="text-center fw-bolder mb-5 text-danger">Liste des produits</h2>
        <table class="table table-dark table-bordered mt-5">
            <thead>
                    <tr>
                    
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Infos</th>
                        <th>Description</th>
                        <th>Categorie</th>
                        
                    </tr>
            </thead>
            <tbody>

            <?php 
                foreach($products as $product) { // $users = tableau et $user = chaque utilisateur
                    // je boucle sur le tableau $users et je récupère chaque utilisateur dans la variable $user
            ?>

                    <tr>
                    
                    <td><?= $product['id_product'] ?></td>
                    <td><?= ucfirst($product['name']) ?></td>
                    <td><?= $product['price'] ?></td>
                    <td><?= $product['infos'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><?= $product['category'] ?></td>
                    
                    </tr>

            <?php 
                }
            ?>

            </tbody>
        </table>
    </div>



<?php


require_once "../inc/footer.inc.php";


?>