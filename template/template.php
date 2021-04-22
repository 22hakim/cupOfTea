<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="un texte de 150 caractères maxi">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Chosissez votre thé - Cup of Tea</title>

        <link href="https://fonts.googleapis.com/css?family=Amaranth" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <link rel="stylesheet" href="public/css/normalize.css">
        <link rel="stylesheet" href="public/css/flexslider.css">
        <link rel="stylesheet" href="public/css/style.css">
        
 
        
    </head>
    <body>
        <header>
            <p>Livraison offerte à partir de 65€ d'achat&nbsp;!</p>

            <div class="container">
                <div> <!--flex-->
                    <a href="index.php?action=home"><img src="public/img/logo.png" alt="Logo du site Cup Of Tea"></a>
                    <p class="panier">
                        <a href="index.php?action=shopCart">mon panier <strong></strong></a>
                    </p>
                </div>

                <nav> <!--flex-->
                    <a href="index.php?action=listing">thés</a>
                    <a href="index.php?action=about">notre histoire</a>
                    <?php if($http->isOnline() === false ) : ?>
                    <a href="index.php?action=register">s'enregitrer</a>
                    <a href="index.php?action=login">connexion</a>
                    <?php else : ?>
                    <a href="index.php?action=account">Mon compte</a>
                    <a href="index.php?action=logout">déconnexion</a>
                    <?php endif; ?>
                </nav>
            </div>

            <div id="ribbon">
                <img src="public/img/ribbon.svg" alt="Elu meilleur thé">
            </div>
        </header>
        <div class="container">
            <?php require 'views/'.$path ?>
        </div>
        <footer>
            <nav>
                <div class="container">
                    <a href="#"><i class="fas fa-lock"></i> paiement sécurisé</a>
                    <a href="#"><i class="fas fa-truck"></i> livraison offerte</a>
                    <a href="#"><i class="fas fa-money-bill-alt"></i> carte fidélité</a>
                    <a href="#"><i class="fas fa-phone"></i> service client</a>
                    <a href="#"><i class="fas fa-check-circle"></i> garantie qualité</a>
                </div>
            </nav>

            <nav>
                <div class="container">
                    <ul>
                        <li><h3>cup of tea</h3></li>
                        <li><a href="#">Notre histoire</a></li>
                        <li><a href="#">Nos boutiques</a></li>
                        <li><a href="#">Le thé de A à Z</a></li>
                        <li><a href="#">Espace Clients Professionnels</a></li>
                        <li><a href="#">Recrutement</a></li>
                        <li><a href="#">Contactez-nous&nbsp;!</a></li>
                        <li><a href="#">L'Ecole du thé</a></li>
                    </ul>
                
                    <ul>
                        <li><h3>commandez en ligne</h3></li>
                        <li><a href="#">Première visite</a></li>
                        <li><a href="#">Aide - FAQ</a></li>
                        <li><a href="#">Service client</a></li>
                        <li><a href="#">Suivre ma commande</a></li>
                        <li><a href="#">Conditions générales de vente</a></li>
                        <li><a href="#">Informations légales</a></li>
                    </ul>
                
                    <ul>
                        <li><h3>suivez-nous</h3></li>
                        <li><a href="#">Notre histoire</a></li>
                        <li><a href="#">Nos boutiques</a></li>
                        <li><a href="#">le Thé de A à Z</a></li>
                        <li><a href="#">Espace clients professionnels</a></li>
                    </ul>
                </div>
            </nav>
            
            <div>
                <div class="container">
                    <img src="public/img/big.png" alt="logo3wa"/>
                    <p>Cet exercice de <a href="https://3wa.fr/">3W Academy</a> est mis à disposition <a href="#">pour l'usage personnel des étudiants</a>. Pas de Rediffusion- Attribution- Pas d'Utilisation Commerciale - Pas de modification - International" pour l'usage personnel des étudiants.<br/>
                    Pas de Rediffusion- Attribution- Pas d'Utilisation Commerciale - Pas de modification - International. autorisations au-delà du champ de cette licence peuvent être obtenues auprès de <a href="mailto:contact@3wa.fr">contact@3wa.fr</a>. Les maquettes ont été réalisées par <a href="#">Justine Muller.</a></p>
                </div>
            </div>
        </footer>
        <script type="module" src="public/js/formControl.js"></script>
        <script type="module" src="public/js/main.js"></script>
        
        <?php if(array_key_exists("action",$_GET) && $_GET['action'] == 'paiement') : ?>
        <!-- stripe -->
        <script src="https://js.stripe.com/v3/"></script>
        <script type="module" src="public/js/stripe.js"></script>
        <?php endif; ?>

    </body>
</html>