<?php

require_once "../inc/functions.inc.php";

$info = "";
debug($_POST);

if (!empty($_POST)) {
    
    $verif = true;
    foreach($_POST as $key=> $value) {

        if(empty(trim($value))) {
            $verif = false;
        }
    }

    if ($verif === false) {
        $info = message("Veuillez renseigner tous les champs", "danger");
    } else {

        if (!isset($_POST['name']) || strlen(trim($_POST['name'])) < 3) {
            $info .= message("Le champ nom du produit n'est pas valide", "danger");
        }

        if (!isset($_POST['price']) || !preg_match('/[0-9]/', $_POST['price'])) {
            $info .= message("Le champ prix n'est pas valide", "danger");
        }

        if (!isset($_POST['infos'])) {
            $info .= message("Le champ infos n'est pas valide", "danger");
        }
        if (!isset($_POST['description'])) {
            $info .= message("Le champ description n'est pas valide", "danger");
        }
        if (!isset($_POST['category'])) {
            $info .= message("Le champ category n'est pas valide", "danger");
        }

        if (empty($info)) { // = "si on a pas de message d'erreur"

            // on récupère les valeurs de nos champs et on les stocke dans des variables
            $name = trim($_POST['name']);
            $price = trim($_POST['price']);
            $infos = trim($_POST['infos']);
            $description = trim($_POST['description']);
            $category = trim($_POST['category']);
            
            // variables pour stocker les infos de la table image
            
     
// $info = message($price, 'danger');
            // $emailExist = checkEmailUser($email);
            // // debug($emailExist);
            // $pseudoExist = checkPseudoUser($pseudo);
            // // debug($pseudoExist);
            // $userExist = checkPseudoEtEmailUser($pseudo, $email);
            // // debug($userExist);

            // die;


            // if ($emailExist) { // on vérifie si l'email existe dans la BDD //En gros on va : "SELECT * FROM users WHERE (email = email input du formulaire)"
                
            //     $info = alert("Ce mail n'est pas disponible", "danger");
            // }

            // elseif ($pseudoExist) { // on vérifie si le pseudo existe dans la BDD

            //     $info = alert("Ce pseudo n'est pas disponible", "danger");
            // }

            // if ($userExist) { // on vérifie si l'email ET le pseudo correspondent au même utilisateur

            //     $info = alert("Vous avez déjà un compte", "danger");
            // }

        } if (empty($info)) {

                addProduct($name, $price, $infos, $description, $category);

                $info = message("Vous êtes bien inscrit, vous pouvez vous connecter <a href='authentication.php' class='text-danger fw-bold'>ici</a>", 'success');

                $product_id = showUserId($name); // on récupère l'id
                debug($product_id);

            }

        }

    }

require_once "../inc/header.inc.php";

?>


<main>

    <div class="w-75 m-auto p-5">
        <h2 class="text-center mb-5 p-3">Ajouter un produit</h2>
        <?php
        echo $info;

        // echo alert("test pour les terragois", "success");
        ?>
<!-- action dans un form, c'est le chemin de la page sur laquelle on veut faire le traitement des données ! -->
<!-- l'attribut "name" permet de faire le lien entre input html et php POST ! -->
        <form action="" method="post" class="p-5"> 
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="name" class="form-label mb-3">Nom</label>
                    <input type="text" class="form-control fs-5" id="name" name="name">
                </div>
                <div class="col-md-6 mb-5">
                    <label for="price" class="form-label mb-3">Prix</label>
                    <input type="text" class="form-control fs-5" id="price" name="price">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 mb-5">
                    <label for="infos" class="form-label mb-3">Infos</label>
                    <input type="text" class="form-control fs-5" id="infos" name="infos">
                </div>
                <div class="col-md-4 mb-5">
                    
                </div>
                <label for="description" class="form-label mb-3">Descritpion</label>
                    <textarea id="description" name="description" rows="5" cols="33">
                    
                    </textarea>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label class="form-label mb-3">Categorie</label>
                    <select class="form-select fs-5" name="category">
                        <option value="Gamer">Gamer</option>
                        <option value="Ultrabooks">Ultrabooks</option>
                        <option value="Hybrides">Hybrides</option>
                        <option value="Entrée de gamme">Entrée de gamme</option>
                    </select>
                </div>
            </div>
            
            <div class="row mt-5">
                <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">Ajouter le produit</button>
                <!-- <p class="mt-5 text-center">Vous avez dèjà un compte ! <a href="authentication.php" class=" text-danger">connectez-vous ici</a></p> -->
            </div>
        </form>
    </div>



</main>





<?php

require_once "../inc/footer.inc.php";

?>