import Refresh from './classes/utilities/Refresh.js';
import Orders from './classes/order/Orders.js';

const od = new Orders();

document.addEventListener('DOMContentLoaded', ()=>{

    // mes variables 
    const publicKey = Stripe('pk_test_kX5YAGvqZjShllOiYuKgC3c500toOKx1vM')
    let elements = publicKey.elements() // ELEMENT DU CLIENT
    const titulaire = document.querySelector('#titulaireCarte');
    const button = document.querySelector('button')
    const clientSecret = button.dataset.secret;

    // création du formulaire 
    const card = elements.create('card',{ hidePostalCode : true} )
    card.mount('#FormStripe')

    // m'indique si ma carte est une visa/ master/ n'existe pas
    card.addEventListener('change',(event) =>{
        document.querySelector("#card-errors").textContent = event.error ? event.error.message : "";
    })

    // gestion du paiement 
    button.addEventListener("click", () => {

        publicKey.handleCardPayment(
            clientSecret, card, {
                payment_method_data: {
                    billing_details: {name: titulaire.value}
                }
            }
        ).then((result) => {
            if(result.error){
                document.getElementById("errors").innerText = result.error.message
            }else{
                // je vide mon panier 
                od.UpdatePayment();
                new Refresh([]);
                // document.location.href = 'index.php?action=success'
            }
        })
    })
})

