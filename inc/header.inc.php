<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Site e-commerce projet</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/headers/"> -->
    <!-- <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->
   
</head>
<body>

<header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="http://localhost/projetEcommerce/index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="82" fill="currentColor" class="bi bi-bootstrap-fill d-block mx-auto mb-1" viewBox="0 0 16 16">
                <path d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375z"/>
                <path d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396z"/>
            </svg>
          </a>

            <form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto d-flex justify-content-end form">
                <input type="search" class="form-control" placeholder="MSI, Asus, Acer..." aria-label="Search">
            </form>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
              <a href="http://localhost/projetEcommerce/catalogue.php" class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-table d-block mx-auto mb-1" viewBox="0 0 16 16">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z"/>
                </svg>
                Catalogue
              </a>
            </li>
            <li>
              <a href="http://localhost/projetEcommerce/profil.php" class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill d-block mx-auto mb-1" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
                Profil
              </a>
            </li>
            <li>
              <a href="http://localhost/projetEcommerce/boutique/panier.php" class="nav-link text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag-fill d-block mx-auto mb-1" viewBox="0 0 16 16">
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                </svg>
                Panier
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid bg-dark">
        <ul class="nav nav-underline m-auto d-flex justify-content-around w-50">
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="http://localhost/projetEcommerce/configurateur.php">PC sur mesure</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="http://localhost/projetEcommerce/promotions.php">Promotions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="http://localhost/projetEcommerce/aide.php">Besoin d'aide ?</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="http://localhost/projetEcommerce/quisommesnous.php">Qui sommes-nous ?</a>
            </li>
        </ul>
    </div>
    

    


</header>


<main>   