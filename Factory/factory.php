<?php

class Car{
  public $name;
  private $door;
  private $price;
  private $customerInfo;

  function __construct($customerInfo){
    $this->name = "Ford Rander 2023";
    $this->door = 4;
    $this->price = '200 VNĐ';
    $this->customerInfo = $customerInfo;
  }

  function toString(){
    printf(json_encode($this->customerInfo));
  }
}

class CarLogistics{
   private $transportClass = Car::class;

   public function setTransportClass($instance){
    $this->transportClass = $instance;
   }

   public function getTransport($customerInfo){
    return new $this->transportClass($customerInfo);
   }  
}
$item = new stdClass();
$item->name = "taivo";
$item->address = "15 vo van kiet";
$carService = new CarLogistics();
// print("CarService :");
// var_dump($carService->getTransport($item));

class truck{
  public $name;
  private $door;
  private $price;
  private $customerInfo;

  function __construct($customerInfo){
    $this->name = "Container 2000";
    $this->door = 4;
    $this->price = '500 VNĐ';
    $this->customerInfo = $customerInfo;
  }

  function toString(){
    printf(json_encode($this->customerInfo));
  }
}

class TruckService extends CarLogistics{
  private $transportClass = Truck::class;
}

$truckService = new TruckService();
print("TruckService : ". $truckService->name);
var_dump($truckService->getTransport($item));

