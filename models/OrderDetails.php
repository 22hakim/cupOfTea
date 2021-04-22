<?php 

namespace CupOftea\models;

Use PDO;
Use CupOftea\core\Connect;


class OrderDetails extends Connect{
    
    protected $_pdo;
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    // 6 methode addOrderDetail a remplir 
    public function addOrderDetail(array $data)
    {
        // Bonus à faire chez vous si vous avez envie verifier d'abord que la commande n'a pas été enregistré 
        // var_dump($data);
        // preparation 
        $sql = "INSERT INTO `orderDetails`(`order_id`, `product_id`, `quantity_ordered`, `price`) 
                VALUES (:orderId,:productId,:quantity,:price)";
        $q = $this->_pdo->prepare($sql);
        $q->execute([
                        ':orderId' => $data['order_id'],
                        ':productId'=> $data["product_id"],
                        ':quantity' => $data["quantity_ordered"],
                        ':price' => $this->recupPriceProduct($data["product_id"])*$data["quantity_ordered"]
                    ]);  
        
        // execution  
            // attention le prix sera recuperer dans la methode -> recupPriceProduct
    }
    

    // 7 la methode recup price recupere l'id du produit et retourne le prix 
    public function recupPriceProduct(int $idProduct){
        
        $sql = "SELECT `price` FROM `product` WHERE `id` = :id";
        $q = $this->_pdo->prepare($sql);
        $q->execute([
                        ':id'=> $idProduct
                    ]); 
        $value = $q->fetch(PDO::FETCH_ASSOC);

        return $value['price'];
        // on peut pratiquement proceder au paiement 
        
    }


    public function recupOrderDetail(int $idOrder)
    {
        // preparation 
        $sql = "SELECT `product_id`, `quantity_ordered`, `price` 
                FROM `orderDetails` 
                WHERE `order_id` = :orderId";
        $q = $this->_pdo->prepare($sql);
        $q->execute([
                        ':orderId' => $idOrder
                    ]);  
        
        return $q->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recupTotalAmount(int $idOrder){

        $prices = $this->recupOrderDetail($_GET['orderId']);

        $totalamount = 0;
        foreach ($prices as $price) {
            $totalamount += $price["quantity_ordered"]*$price["price"];
        }

        return $totalamount;

    }
    
    public function updateOrder(array $data){
        
        
        
    }

}