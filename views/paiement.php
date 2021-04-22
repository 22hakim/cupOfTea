<h2>Commande numero <span><?= $_GET['orderId'] ?></span></h2>

<form class = "stripe-form">
    <div>
        <p id="total-amount" data-amount="<?= $totalamount?>">Montant à payer : <?= $totalamount?> €</p>   
    </div>
    <!-- si paiement refusé -->
    <div id="errors"></div>
    <input type="text" id="titulaireCarte" placeholder="Titulaire de la carte">
    <!-- formulaire de saisie de carte que stripe va créer -->
    <div id="FormStripe"></div>
    <!-- certaines erreurs  -->
    <div id="card-errors" role="alert"></div>
    <!-- 5 - button sur lequel il y aura un evenement j'ai ajouté type boutton pour eviter qu'il soumet l'evenement
        comme si j'avais fait event.preventDefault()
    -->
    <button id="card-button" type="button" data-secret="<?= $intention['client_secret'] ?>">Procéder au paiement</button>
</form>