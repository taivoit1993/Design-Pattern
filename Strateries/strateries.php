<?php

class GetPriceStrateries{
    const GetPriceType = [
        "8thang3" => array('GetPriceStrateries','getPrice8Thang3'),
        "20thang10" => array('GetPriceStrateries','getPrice20Thang10'),
        "30thang4" => array('GetPriceStrateries','getPrice30Thang4'),
        "1thang5" => array('GetPriceStrateries','getPrice1Thang5'),
        "2thang9" => array('GetPriceStrateries','getPrice2Thang9')
    ];
    static function getPrice8Thang3($price){
        return $price * 0.8;
    }

    static function getPrice20Thang10($price){
        return $price * 0.9;
    }

    static function getPrice30Thang4($price){
        return $price * 0.5;
    }

    static function getPrice1Thang5($price){
        return $price * 0.5;
    }

    static function getPrice2Thang9($price){
        return $price * 0.6;
    }

    function getPrice($price, $type){
        
        return self::GetPriceType[$type]($price);
    }
}

$priceStrateries = new GetPriceStrateries();
printf("price = ".$priceStrateries->getPrice(100,"8thang3"));