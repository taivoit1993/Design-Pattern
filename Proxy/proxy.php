<?php

class Leader {
    function receiveRequest($offer){
        printf("Boss said!:OK::".$offer);
    }
}

class Secretary {
    private $leader;
    function __construct()
    {
        $this->leader = new Leader();
    }

    function receiveRequest($offer){
        $this->leader->receiveRequest($offer);
    }
}

class Developer {
    private $offer;
    function __construct($offer)
    {
        $this->offer = $offer;
    }

    function applyFor($target){
        $target->receiveRequest($this->offer);
    }
}

$devCui = new Developer("Up to Salary 5000 USD");
$devCui->applyFor(new Secretary());