<?php 

namespace CupOftea\models;

Use PDO;
Use CupOftea\core\Connect;


class Orders extends Connect{
    
    protected $_pdo;
    
    public function __construct(){
        
        $this->_pdo = $this->connexion();
    }
    
    public function addOne(int $id_user) :int{

        // preparation 
        $sql='INSERT INTO `orders` (`user_id`) VALUES (:id_user)';
        $q = $this->_pdo->prepare($sql);
        $q->execute([':id_user' => $id_user ]);  
        
        return $this->_pdo->lastInsertId();
    }
    
    public function updateOrder(array $data){
        
        $sql = "UPDATE `orders` 
                SET 
                    `amount`= :amount,
                    `paid`= :paid
                WHERE `id` = :id";
        $q = $this->_pdo->prepare($sql);
        $q->execute([
                        ':amount' => $data['amount'],
                        ':paid'   => $data['paid'],
                        ':id'     => $data['order_id']
                    ]);  
        
        return 'commande payée';
        
    }

}
