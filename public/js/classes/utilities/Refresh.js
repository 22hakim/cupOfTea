import Cart from '../product/Cart.js';
import IconCart from '../product/IconCart.js';


export default class Refresh {

    constructor(cart = false){

        this.cartName = cart;
        this.cart = new Cart();
        this.IconCart = new IconCart();
        

        this.refresh();
        
    }

    refresh(){
        
        if( this.cartName !== false ){

            this.cart.saveCart(this.cartName);

        }  

        this.IconCart.DisplayAmount();
        
    }

   

}