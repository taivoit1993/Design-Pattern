<?php
// Không áp dụng Factory Method
// class Logistics
// {
//     private $name;
//     private $weight;
//     private $price;
//     function __construct($type)
//     {
//         if($type === "Road"){
//             $this->name = "Truck 101";
//             $this->weight = "100kg";
//             $this->price = "100.000";
//         } 
//         if($type === "Sea"){
//             $this->name = "Ship 102";
//             $this->weight = "50kg";
//             $this->price = "20.000";
//         }
      
//     }

//     public function getMessage()
//     {
//         printf("Name = " . $this->name . ", Weight = " . $this->weight . ", Price = " . $this->price);
//     }
// }

// $road = new Logistics("Road");
// print("Road Logictics Service\n");
// $road->getMessage();
// print("\n");

// $ship = new Logistics("Sea");
// print("Road Logictics Service\n");
// $ship->getMessage();

//Áp dụng Factory Method
class Truck {
    private $name;
    private $weight;
    private $price;
    function __construct()
    {
        $this->name = "Truck 101";
        $this->weight = "100kg";
        $this->price = "100.000";
    }
    public function getMessage()
    {
        printf("Name = " . $this->name . ", Weight = " . $this->weight . ", Price = " . $this->price);
    }
}

abstract class LogisticsFactory{
    protected $name;
    protected $weight;
    protected $price;
    abstract public function factoryMethod();

    public function someOperation(){
        return $this->factoryMethod();
    }

    public function getMessage(){
        $this->factoryMethod()->getMessage();
    }

}

class TruckService extends LogisticsFactory{
    public function factoryMethod(){
        return new Truck();
    }
}

function clienCode(LogisticsFactory $factory){
    $factory->getMessage();
}

class Ship{
    private $name;
    private $weight;
    private $price;
    function __construct()
    {
        $this->name = "Ship 102";
        $this->weight = "50kg";
        $this->price = "35.000";
    }
    public function getMessage()
    {
        printf("Name = " . $this->name . ", Weight = " . $this->weight . ", Price = " . $this->price);
    }
}

class ShipService extends LogisticsFactory{
    public function factoryMethod(){
        return new Ship();
    }
}
clienCode(new ShipService());
print("\n");
clienCode(new TruckService());
