import Cart from "./../product/Cart.js";


export default class Order{
    
    constructor(){

        this.cart = new Cart();
        
    }
    // 2 je definis la methode saveOrderDetail -> index.php
    saveOrderDetail(){
        // je récupere le panier 
        const card = this.cart.loadCart();

        // je fais mon formData
        let formdata = new FormData()
        let orderId = document.querySelector('#orderId').dataset.order;// je récupere le num de la commande 
            
        formdata.append('action','save-order');
            // j'ajoute un champ qui me permettra de savoir quel fonction lancer dans AjaxController ex: formData.append('action','save-order')
            // index.php va le recevoir comme $_POST['action'] = 'save-order'
        // console.log(card)
        // pour chaque produit commandé je fais une requete fetch pour l'ajouter dans la bdd 
        for(let product of card){

            // j'ajoute chaque champ de mon panier 
            formdata.append(`order_id`,orderId); // l'id de la commande
            formdata.append(`product_id`,product.id); // l'id du produit
            formdata.append(`quantity_ordered`,product.quantity); // l'id du produit

            fetch('index.php?ajax=req', { method : 'POST' , body :formdata})
            .then(response => response.text())
            .then(res => console.log(res))


        }

        // je redirige vers le paiement
        document.location.href = `index.php?action=paiement&orderId=${orderId}`;
    }

    UpdatePayment(amount,orderNumber) 
    {
        // j'utiliserai cette fonction apres le paiement pour changer le champ paid a Yes 
        // et ajouter le montant
    }
}