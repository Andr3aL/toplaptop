<?php

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


function addProduct(string $name, string $price, string $infos, string $description, string $category) : void {
    $data = [
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
    $sql = "INSERT INTO products(name, price, infos, description, category) VALUES (:name, :price, :infos, :description, :category)";
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

function showUserId(string $name) : mixed {

    $cnx = connexionBdd();
    $sql = "SELECT id_product FROM products WHERE name = :name";
    $request = $cnx->prepare($sql); // prepare est utilisée pour des requetes qui se répètent plusieurs fois (préférentiellement)

    $request->execute(array(

        ':name' => $name,

    ));

    $result = $request->fetch(); // fetch et non fetchAll car on veut un identifiant unique
    return $result;

}

?>