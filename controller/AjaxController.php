<?php

namespace CupOftea\controller;

Use CupOftea\models\{User,OrderDetails,Orders};
Use CupOftea\Controller\FormController;


class AjaxController {
    
    
    public function changePassword(array $data)
    {
        $form = new FormController(new User());
        $message = $form->formNewPass($data);
        return $message;
    }

    public function formUpInfo(array $data) 
    {
        $form = new FormController(new User());
        $message = $form->formUpInfo($data);
        return $message;
    }

    // 5 je remplis ma methode et appelle la bonne methode de la classe OrderDetail 
    public function saveOrder(array $post){
        // j'oublie pas le use en haut puis -> orderDetails.php
        $odetails = new OrderDetails();
        $odetails->addOrderDetail($post);

    }

    public function updateOrder(array $data){

        $od = new Orders();
        return $od->updateOrder($data);


    }
    
}