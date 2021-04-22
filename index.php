<?php 
session_start();

Use CupOftea\Autoloader;
Use CupOftea\Core\{Cookies,Https};
Use CupOftea\Controller\{FormController, AjaxController};
Use CupOftea\Models\{Product,Category,User,Orders,OrderDetails};

require_once 'Core/Autoloader.php';

Autoloader::register();


// j'intancie mes classes 
$userModel       = new User();
$http            = new Https();
$cookies         = new Cookies();
$productModel    = new Product();
$categoryModel   = new Category();
$orderModel      = new Orders();
$formController  = new FormController($userModel); // voir php3 -> exercice composition 


// pour le format de mes valeurs 
$fmt = new NumberFormatter( 'fr_FR', NumberFormatter::CURRENCY );

if(array_key_exists('ajax',$_GET)){
    
    // redirige vers home s'il n'y a pas de $_POST
    if(!array_key_exists('action', $_POST)) 
        $http->redirect('index.php?action=home');
    
    $ajax = new AjaxController();
    
    switch($_POST['action']) 
    {
        case 'upPass':
            // var_dump($_POST);
            echo $ajax->changePassword($_POST);
        break;

        case 'upInfo':
            $message = $ajax->formUpInfo($_POST);
            echo json_encode($message);
        break;

        // 3 j'ajoute le case qui me permet d'enregistrer ma commande 
            // 4 dans les instruction j'appelle la bonne methode -> AjaxController.php
        case 'save-order':
            $ajax->saveOrder($_POST);
        break;
        case 'update-order':
            $mes = $ajax->updateOrder($_POST);
            echo $mes;
        break;



    }
    
}
elseif(array_key_exists('action',$_GET)){
    
    switch($_GET['action']){
        
        
        // case qui affiche la page a propos de nous 
        case 'about':
            $path = 'about.php'; // attention la premiere partie du chemin du fichier et dans le template 
        break;
        
        // case qui affiche la page d'accueil 
        case 'home':
            $categories = $categoryModel->findAll(); // récupere chaque catégorie 
            $path = 'home.php';
        break;
        
        // cases qui impliquent affichage de tous les produits et affichage d'un produit 
        case 'listing':
            $categorieNames = $categoryModel->findAll(); // récupere chaque catégorie 
            $path = 'listing.php';
        break;
        
        // case qui m'affiche la page ou il y a un produit 
        case 'product':
            
            $product = $productModel->findOne($_GET['pId']); // récupere un produit 
            $path = 'product.php';
        break;

        // cases qui impliquent la création de compte, connexion et deconnexion  
        case 'register':
            //  s'il est en ligne redirigé vers accueil sinon on fait rien 
            ($http->isOnline()) ? $http->redirect('index.php') : '' ; 

            /* equivalent à 
            if($http->isOnline() == true){
                $http->redirect('index.php');
            }*/

            if($_POST):
                $message = $formController->controlRegister($_POST); // controler le formulaire d'enregistrement 
                //var_dump($message);
            endif;
            $path = 'register.php';
        break;
        case 'login':
            // voir explication case register 
            ($http->isOnline()) ? $http->redirect('index.php') : '' ; 

            if($_POST):
                $message = $formController->controlLogin($_POST); // controler le formulaire de connexion 
                //var_dump($message);
            endif;
            $path = 'login.php';
        break;
        case 'logout':
            session_destroy();
            $http->redirect('index.php');
        break;

        // case qui implique la gestion du profil 
        case 'account':
            $path = 'account.php';
            
        break;

        // case lié au panier 
        case 'shopCart':
            $path = 'shopCart.php';
        break;

        // étape intermediare, si il est en ligne alors dans ce cas la on dirige vers la page de paiement sinon on renvoi vers la page shopCart
        case 'confirmCart':
            if($http->isOnline()) {
                // j'enregistre la commande 
                $numOrder = $orderModel->addOne($_SESSION['id']);
                
                // je redirige vers une page qui affichera ma commande confirmée 
                $http->redirect('index.php?action=order&orderId='.$numOrder);
                
            }else{ 
                // si pas connecté je le redirige vers la page qui affiche le panier 
                $http->redirect('index.php?action=shopCart');
                
            }
        break;
        // page qui va permettre la validation de la commande 
        case 'order':
                        
            $path = 'order.php';
        break;
        // page qui va gerer mon paiement 
        case 'paiement':
            if(array_key_exists('orderId',$_GET)){
                $od = new OrderDetails();
                $totalamount = $od->recupTotalAmount($_GET['orderId']);
                require_once './controller/PaiementController.php';

            }else{
                $http->redirect('index.php?action=order'); 
            }
            $path = 'paiement.php';
        break;
        case 'success':
            $path = 'success.php';
        break;
        default:
        $http->redirect('index.php');
    
    }
     

    // récuperation du template 
    require 'template/template.php';

}else{
    
    $http->redirect('index.php?action=home');
    
}



