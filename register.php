<?php

require_once "inc/functions.inc.php";

// if (isset($_SESSION['client'])) { // si une session existe avec un identifiant user, je me redirige vers la page de profil
//     header("location:profil.php");
// }

$info = ""; // variable dans laquelle on va stocker les erreurs

// var_dump((int) date('Y'));

// $_POST c'est un array, superglobale, donc accessible partout (qui est vide de base, car elle est faite pour être remplie)
// var_dump($_POST);

// Si on a des valeurs dans notre formulaire (=$_POST non vide), on va les traiter, sinon on dit au visiteur de remplir les champs



if (!empty($_POST)) {
    



    // On vérifie si un champs est vide 

    // trim en js, ça permet d'enlever les espaces ; en php, trim permet d'enlever aussi les / et autres caractères spéciaux
    $verif = true;
    foreach($_POST as $key=> $value) { // je prend les valeurs de mon tableau en le parcourant

        if(empty(trim($value))) { // si une de ces valeurs est vide, je passe verif en false
            $verif = false;
        }
    }




    if ($verif === false) {
        $info = message("Veuillez renseigner tous les champs", "danger");
    } else {

        if (!isset($_POST['lastName']) || strlen(trim($_POST['lastName'])) < 2 || strlen(trim($_POST['lastName'])) > 50) {
            $info .= message("Le champ nom n'est pas valide", "danger");
        }

        if (!isset($_POST['firstName']) || strlen(trim($_POST['firstName'])) > 50) {
            $info .= message("Le champ prénom n'est pas valide", "danger");
        }

        if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 3 || strlen(trim($_POST['email'])) > 100 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $info .= message("Le champ email n'est pas valide", "danger");
        }

        $regexPhone = "/^[0-9]{10}$/";

        // if (!preg_match($regexPhone, $_POST['phone'])) { // Vérifie si le téléphone contient 10 chiffres
        //     $info .= message("Le champ phone n'est pas valide", "danger");
        // }

        $regexMdp = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        /*
            ^ : Début de la chaîne.
            (?=.*[A-Z]) : Doit contenir au moins une lettre majuscule.
            (?=.*[a-z]) : Doit contenir au moins une lettre minuscule.
            (?=.*\d) : Doit contenir au moins un chiffre.
            (?=.*[@$!%*?&]) : Doit contenir au moins un caractère spécial parmi @$!%*?&.
            [A-Za-z\d@$!%*?&]{8,} : Doit être constitué uniquement de lettres majuscules, lettres minuscules, chiffres et caractères spéciaux spécifiés, et doit avoir une longueur minimale de 8 caractères.
            $ : Fin de la chaîne.
       */

       if (!isset($_POST['mdp']) || !preg_match($regexMdp, $_POST['mdp'])) {
            $info .= message("Le champ mot de passe n'est pas valide", "danger");
        }

       if (!isset($_POST['confirmMdp']) || $_POST['mdp'] !== $_POST['confirmMdp']) {
            $info .= message("La confirmation et le mot de passe doivent être identiques", "danger");
        }

       if (!isset($_POST['civility']) || !in_array($_POST['civility'], ['f','h'])) {
            $info .= message("La civilité n'est pas valide", "danger");
        }

        $year1 = ((int) date('Y')) - 13; // 2012
        $year2 = ((int) date('Y')) - 90; // 1935

        // $birthdayYear = explode('-', $_POST['birthday']);
        // var_dump((int) $birthdayYear[0]); 

        // on récupère l'année grâce au explode, qui nous explose la chaine de caractère date en un tableau (de chaines de caractères) quand il tombe sur le séparateur '-', puis on (int) l'indice 0 du tableau, qui correpond à l'année. Grâce à cela, on peut ensuite faire des opérations numériques avec les dates pour après. 

    //    if ( (int) $birthdayYear[0] > $year1 || (int) $birthdayYear[0] < $year2 ) {
    //         $info .= message("La date de naissance n'est pas valide", "danger");
    //    }

    //     if ( strlen(trim($_POST['address'])) < 5 || strlen(trim($_POST['address'])) > 50) {
    //         $info .= message("L'adresse n'est pas valide", "danger");
    //     }
       
    //     if ( !preg_match('/^[0-9]{5}$/', $_POST['zip'])) {
    //         $info .= message("Le code postal n'est pas valide", "danger");
    //     }

    //     if ( strlen(trim($_POST['city'])) < 5 || strlen(trim($_POST['city'])) > 50 || preg_match('/[0-9]/', $_POST['city'])) {
    //         $info .= message("La ville n'est pas valide", "danger");
    //     }

    //     if ( strlen(trim($_POST['country'])) < 5 || strlen(trim($_POST['country'])) > 50 || preg_match('/[0-9]/', $_POST['country'])) {
    //         $info .= message("Le pays n'est pas valide", "danger");
    //     }

        if (empty($info)) { // = "si on a pas de message d'erreur"

            // on récupère les valeurs de nos champs et on les stocke dans des variables
            $lastName = trim($_POST['lastName']);
            $firstName = trim($_POST['firstName']);
            
            $email = trim($_POST['email']);

            $mdp = trim($_POST['mdp']); // attention, on ne met pas le mdp en dur comme ça dans la bdd, avant : il faut le "hasher"
            // confirmMpd on l'a enlevé : pas besoin de le stocker dans la bdd
            $civility = trim($_POST['civility']);
            

            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            // Cette fonction PHP crée un hachage sécurisé d'un mot de passe en utilisant un algorithme de hachage fort : génère une chaîne de caractères unique à partir d'une entrée. C'est un mécanisme unidirectionnel dont l'utilité est d'empêcher le déchiffrement d'un hash. Lors de la connexion, il faudra comparer le hash stocké dans la base de données avec celui du mot de passe fourni par l'internaute.
                // PASSWORD_DEFAULT : constante indique à password_hash() d'utiliser l'algorithme de hachage par défaut actuel c'est le plus recommandé car elle garantit que le code utilisera toujours le meilleur algorithme disponible sans avoir besoin de modifications.
                // debug($mdpHash);
                // debug($mdp);
            

            $emailExist = checkEmailUser($email);
            // debug($emailExist);
            // $pseudoExist = checkPseudoUser($pseudo);
            // debug($pseudoExist);
            // $userExist = checkPseudoEtEmailUser($pseudo, $email);
            // debug($userExist);

            // die;


            if ($emailExist) { // on vérifie si l'email existe dans la BDD //En gros on va : "SELECT * FROM users WHERE (email = email input du formulaire)"
                
                $info = message("Ce mail n'est pas disponible", "danger");
            }

            // elseif ($pseudoExist) { // on vérifie si le pseudo existe dans la BDD

            //     $info = message("Ce pseudo n'est pas disponible", "danger");
            // }

            // if ($userExist) { // on vérifie si l'email ET le pseudo correspondent au même utilisateur

            //     $info = message("Vous avez déjà un compte", "danger");
            // }

            elseif (empty($info)) {

                addUser($lastName, $firstName, $email, $mdpHash, $civility);

                $info = message("Vous êtes bien inscrit, vous pouvez vous connecter <a href='authentication.php' class='text-danger fw-bold'>ici</a>", 'success');

            }

        }

    }

}
// debug($_POST);
// print_r($_POST);
require_once "inc/header.inc.php";

?>

<main style="background:url(assets/img/5818.png) no-repeat; background-size: cover; background-attachment: fixed;">

    <div class="w-75 m-auto p-5" style="background: rgba(211, 206, 206, 0.9);">
        <h2 class="text-center mb-5 p-3">Créer un compte</h2>
        <?php
        echo $info;

        // echo alert("test pour les terragois", "success");
        ?>
<!-- action dans un form, c'est le chemin de la page sur laquelle on veut faire le traitement des données ! -->
<!-- l'attribut "name" permet de faire le lien entre input html et php POST ! -->
        <form action="" method="post" class="p-5"> 
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="lastName" class="form-label mb-3">Nom</label>
                    <input type="text" class="form-control fs-5" id="lastName" name="lastName">
                </div>
                <div class="col-md-6 mb-5">
                    <label for="firstName" class="form-label mb-3">Prenom</label>
                    <input type="text" class="form-control fs-5" id="firstName" name="firstName">
                </div>
            </div>
            <div class="row mb-3">
               
                <div class="col-md-4 mb-5">
                    <label for="email" class="form-label mb-3">Email</label>
                    <input type="text" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                </div>
                

            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label for="mdp" class="form-label mb-3">Mot de passe</label>
                    <input type="password" class="form-control fs-5" id="mdp" name="mdp" placeholder="Entrer votre mot de passe">
                </div>
                <div class="col-md-6 mb-5">
                    <label for="confirmMdp" class="form-label mb-3">Confirmation mot de passe</label>
                    <input type="password" class="form-control fs-5 mb-3" id="confirmMdp" name="confirmMdp" placeholder="Confirmer votre mot de passe ">
                    <input type="checkbox" onclick="myFunction()"> <span class="text-danger">Afficher/masquer le mot de passe</span>
                </div>


            </div>
            <div class="row mb-3">
                <div class="col-md-6 mb-5">
                    <label class="form-label mb-3">Civilité</label>
                    <select class="form-select fs-5" name="civility">
                        <option value="h">Homme</option>
                        <option value="f">Femme</option>
                    </select>
                </div>
                
            <div class="row mt-5">
                <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">S'inscrire</button>
                <p class="mt-5 text-center">Vous avez dèjà un compte ! <a href="authentication.php" class=" text-danger">connectez-vous ici</a></p>
            </div>
        </form>
    </div>



</main>


<!-- <script>
    alert('vous etes connecté');
</script> -->

<?php

require_once "inc/footer.inc.php";

?>