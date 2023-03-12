<?php
class Promotion {
    function calc($price){
        return $price * 0.9;
    }
}

class Shipping {
    function calc(){
        return 500;
    }
}


class Fee {
    function calc($price){
        return $price * 1.05;
    }
}
class ShoppingFacdePattern{
    private $promotion;
    private $shipping;
    private $fee;
    function __construct(){
        $this->promotion = new Promotion();
        $this->shipping = new Shipping();
        $this->fee = new Fee();
    }

    function calc($price){
        $price = $this->promotion->calc($price);
        $price += $this->shipping->calc();
        $price = $this->fee->calc($price);
        return $price;
    }
}

$shopping = new ShoppingFacdePattern();
printf("price: ". $shopping->calc(1200000));
?>