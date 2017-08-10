<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Decors &amp; Partners</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Decors & Partners est spécialisé en décoration intérieure, peinture et pose de revêtements de sols et de murs en milieu professionnel et pour particuliers." />

<meta name="google-site-verification" content="AzJF05_G8r6hItrijR0dD6fQFiS8Xlm0EnGWhPstR0I" />

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css" />
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>

        <link rel="stylesheet" href="css/style.min.css">
    </head>
    <body>
        <header class="header">
            <div class="container">
                <h1 class="logo">
                    <a href="index.php">
                        <img src="assets/logo_dp_min.svg" alt="Decors &amp; Partners Logo" />
                    </a>
                </h1>
                <div class="mobile-nav-toggle" id="mobile-nav-toggle">
                    <span class="mobile-nav-toggle__bar"></span>
                </div>
                <nav class="navigation" id="navigation">
                    <ul class="navigation__list">
                        <li class="navigation__item <?php if($currentPage === "about") echo "active"?>"><a href="index.php">Accueil</a></li>
                        <li class="navigation__item <?php if($currentPage === "gallery") echo "active"?>"><a href="gallery.php">Nos réalisations</a></li>
                        <li class="navigation__item <?php if($currentPage === "contact") echo "active"?>"><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="container">
