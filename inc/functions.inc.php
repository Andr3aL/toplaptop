<?php
session_start(); // on démarre la session pour pouvoir utiliser $_SESSION

if (!isset($_SESSION['panier']) || !is_array($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

define("RACINE_SITE", "http://localhost/projetEcommerce/");


// Fonction message

function message(string $contenu, string $class) : string {
    return "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
    $contenu
    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
}


// Fonction debug

function debug ($var) {
    echo '<pre class= "border border-dark bg-light text-danger fw-bold w-50 p-5 mt-5">';

        var_dump($var);

    echo '</pre>';
}


// Connexion à la base de données

define("DBHOST", "localhost");

define("DBUSER", "root");

define("DBPASS", "");

define("DBNAME", "toplaptop");


function connexionBdd() : object {

    $dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";

    try {

        $pdo = new PDO($dsn, DBUSER, DBPASS); 

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    } catch(PDOException $e) {

        die("Erreur : " .$e->getMessage());

    }

    return $pdo;

}


// Création des tables

// function createTableUsers() : void {

//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS users(
//         id_user INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//         lastName VARCHAR(50) NOT NULL, firstName VARCHAR(50) NOT NULL,
//         email VARCHAR(100) NOT NULL, mdp VARCHAR(255) NOT NULL, civility ENUM('f', 'h') NOT NULL, birthday DATE,  phone VARCHAR(30), address VARCHAR(50), zip VARCHAR(50), city VARCHAR(50), country VARCHAR(50), role ENUM('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER', payment ENUM('Carte bleue', 'Paypal', 'Paiement en 3 fois') DEFAULT 'Carte bleue'
//         )";

//     $request = $cnx->exec($sql);

// }

// createTableUsers();




// function createTableProducts() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS products(
//         id_product INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, brand_id INT(11) NOT NULL,
//         name VARCHAR(50) NOT NULL, price INT(11) NOT NULL, infos VARCHAR(255) NOT NULL, description TEXT NOT NULL, category ENUM('Gamer', 'Ultrabooks', 'Hybrides', 'Entrées de gamme'))";

//     $request = $cnx->exec($sql);
// }

// createTableProducts();



// function createTableOrders() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS orders(
//         id_order INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT(11) NOT NULL, cart_id INT(11) NOT NULL,
//         order_number BIGINT NOT NULL, status ENUM('En attente', 'En cours', 'Expédiée', 'Livrée', 'Annulée'), date DATE NOT NULL)";

//     $request = $cnx->exec($sql);
// }

// createTableOrders();

// function createTableCart() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS cart(
//         id_cart INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, user_id INT(11) NOT NULL, total INT NOT NULL)";

//     $request = $cnx->exec($sql);
// }

// createTableCart();


// function createTableCart_product() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS cart_product(
//         id_cart_product INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, cart_id INT(11) NOT NULL, product_id INT(11) NOT NULL, quantity INT NOT NULL)";

//     $request = $cnx->exec($sql);
// }

// createTableCart_product();


// function createTableImage() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS image(
//         id_image INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, product_id INT(11) NOT NULL, src TEXT NOT NULL, position INT NOT NULL)";

//     $request = $cnx->exec($sql);
// }

// createTableImage();


// function createTableBrand() : void {


//     $cnx = connexionBdd();

//     $sql = "CREATE TABLE IF NOT EXISTS brand(
//         id_brand INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50) NOT NULL)";

//     $request = $cnx->exec($sql);
// }

// createTableBrand();

// ########################################## Création des clés étrangères #################################################



// function foreignKeyUserCart(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyUserCart('cart', 'user_id', 'users', 'id_user');


// function foreignKeyUserOrders(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyUserOrders('orders', 'user_id', 'users', 'id_user');


// function foreignKeyCartOrders(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyCartOrders('orders', 'cart_id', 'cart', 'id_cart');


// function foreignKeyCartCart_product(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyCartCart_product('cart_product', 'cart_id', 'cart', 'id_cart');


// function foreignKeyProductsCart_product(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyProductsCart_product('cart_product', 'product_id', 'products', 'id_product');


// function foreignKeyProductsImage(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyProductsImage('image', 'product_id', 'products', 'id_product');


// function foreignKeyBrandProducts(string $tableFK, string $keyFK, string $tablePK, string $keyPK) : void {

//     $cnx = connexionBdd();

//     $sql = "ALTER TABLE $tableFK ADD FOREIGN KEY ($keyFK) REFERENCES $tablePK ($keyPK)";

//     $request = $cnx->exec($sql);

// }

// foreignKeyBrandProducts('products', 'brand_id', 'brand', 'id_brand');









if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {

    unset($_SESSION['client']); // on supprime la session client (on déconnecte l'utilisateur)
    header('location:'.RACINE_SITE.'index.php');

}



/*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                PRODUCTS                     ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ 
                          
*/




function addProduct(string $brand_id, string $name, string $price, string $infos, string $description, string $category) : void {
    $data = [
        'brand_id' => $brand_id,
        'name' => $name,
        'price' => $price,
        'infos' => $infos,
        'description' => $description,
        'category' => $category
    ];

    foreach($data as $key => $value){

        $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $cnx = connexionBdd();
    $sql = "INSERT INTO products(brand_id, name, price, infos, description, category) VALUES (:brand_id, :name, :price, :infos, :description, :category)";
    // (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ----> Des fois, sur internet, on peut trouver cette notation pour les VALUES

    $request = $cnx->prepare($sql);
    $request->execute($data);

}

function allProducts() : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT * FROM products";
    $request = $cnx->query($sql);
    $result = $request->fetchAll(); // on veut tous les utilisateurs (on récupère toutes les lignes à la fois), donc on utilise fetchAll(), car fetch() ne donne qu'un élement
    return $result;

}


// function showUserId(string $name) : mixed {

//     $cnx = connexionBdd();
//     $sql = "SELECT id_product FROM products WHERE name = :name";
//     $request = $cnx->query($sql);
//     $result = $request->fetch();
// }

function showProductById(string $name) : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT id_product FROM products WHERE name = :name";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':name' => $name,

    ));

    $result = $request->fetch();
    return $result;

}


function showProductByName(string $name) : mixed {
    $cnx = connexionBdd();
    $sql = "SELECT name FROM products WHERE name = :name";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":name" => $name,

    ));
    $result = $request->fetch();
    return $result;
}


function checkProduct(string $name) : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT name FROM products WHERE name = :name";
    $request = $cnx->prepare($sql);
    $request->bindValue('name', $name, PDO::PARAM_STR);

    $request->execute();
    $result = $request->fetch();

    return $result;

}

function updateProduct(int $id, string $name, int $price, string $infos, string $description, string $category) : void {

    $cnx = connexionBdd();
    $sql = "UPDATE products SET
     
    name = :name,
    price = :price,
    infos = :infos,
    description = :description,
    category = :category
    
    WHERE id_product = :id";

    $request = $cnx->prepare($sql);
    
    $request->execute(array(

        ':id' => $id,
        ':name' => $name,
        ':price' => $price,
        ':infos' => $infos,
        ':description' => $description,
        ':category' => $category
    ));
}

function showIdProduct(int $id) : mixed {
    $cnx = connexionBdd();
    $sql = "SELECT * FROM products WHERE id_product= :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":id" => $id,

    ));
    $result = $request->fetch();
    return $result;
}


function showProductByBrand() : mixed {
    $cnx = connexionBdd();
    $sql = "SELECT * FROM products WHERE brand_id = :id";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;
}

function deleteFilm(int $id) : void {
    $cnx = connexionBdd();
    $sql = "DELETE FROM products WHERE id_product = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ':id' => $id

    ));

}

function all3Products() : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT * FROM products ORDER BY id_product DESC LIMIT 3";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;
}

function initPanier() {
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }
}

// gestion de la déconnexion
if (isset($_GET['action']) && $_GET['action'] === 'deconnexion') {
    // Vider le panier avant de se déconnecter
    $_SESSION['panier'] = array();
    // Supprimer l'indice 'client' de la session
    unset($_SESSION['client']);
    // Redirection
    header('location:'.RACINE_SITE.'index.php');
    exit;
}


/*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                USERS                        ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ 
                          
*/


function addUser(string $lastName, string $firstName, string $email, string $mdp, string $civility) : void {

    $data = [
        'lastName' => $lastName,
        'firstName' => $firstName,

        'email' => $email,

        'mdp' => $mdp,
        'civility' => $civility

    ];



foreach($data as $key => $value){

    $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
   

}


    $cnx = connexionBdd();
    $sql = "INSERT INTO users (lastName, firstName, email, mdp, civility) VALUES (:lastName, :firstName, :email, :mdp, :civility)";
   

    $request = $cnx->prepare($sql);

    $request->execute($data);

}




function checkEmailUser(string $email) : mixed { // soit on récupère un tableau avec un seul champ (mais c'est bien un tableau), soit on récupère un booléen qui donne false

    $cnx = connexionBdd();
    $sql = "SELECT email FROM users WHERE email = :email";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ':email' => $email
    ));

    $result = $request->fetch(); // transforme l'objet qu'on récupère en tableau !

    return $result; // car on veut le tableau

}

function allUsers() : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT * FROM users";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;

}

function showUser(int $id) : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT * FROM users WHERE id_user = :id";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':id' => $id,

    ));

    $result = $request->fetch();
    return $result;

}


function updateRole(string $role, int $id) : void {

    $cnx = connexionBdd();
    $sql = "UPDATE users SET role = :role WHERE id_user = :id";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':role' => $role,
        ':id' => $id

    ));
}

function deleteUser(int $id) : void {

    $cnx = connexionBdd();
    $sql = "DELETE FROM users WHERE id_user = :id";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':id' => $id

    ));

}


/*
                          ╔═════════════════════════════════════════════╗
                          ║                                             ║
                          ║                BRANDS                       ║
                          ║                                             ║
                          ╚═════════════════════════════════════════════╝ 
                          
*/

function showBrand(string $name) : mixed {
    $cnx = connexionBdd();
    $sql = "SELECT * FROM brand WHERE name = :name";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":name" => $name,

    ));
    $result = $request->fetch();
    return $result;
}


function addBrand(string $name) {
    $data = [
        'name' => $name
    ];

    foreach ($data as $key => $value) {
        $data[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    $cnx = connexionBdd();
    $sql = "INSERT INTO brand name VALUES :name";
    $request = $cnx->prepare($sql);
    $request->execute($data);

}

function allBrand($order = "") : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT * FROM brand $order";
    $request = $cnx->query($sql);
    $result = $request->fetchAll();
    return $result;

}


function showIdBrand(int $id) : mixed {
    $cnx = connexionBdd();
    $sql = "SELECT * FROM brand WHERE id_brand = :id";
    $request = $cnx->prepare($sql);
    $request->execute(array(

        ":id" => $id,

    ));
    $result = $request->fetch();
    return $result;
}

function updateBrand(int $id, string $name) : void {

    $cnx = connexionBdd();
    $sql = "UPDATE brand SET name = :name WHERE id_brand = :id";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':id' => $id,
        ':name' => $name

    ));
}
function selectBrand(int $id, string $name) : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT name = :name WHERE id_brand = :id";
    $request = $cnx->prepare($sql);

    $request->execute(array(

        ':id' => $id,
        ':name' => $name

    ));
    $result = $request->fetch();
    return $result;
}




?>