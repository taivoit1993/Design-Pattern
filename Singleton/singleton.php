<?php
class RoundRobin{
  private $server;
  private $index;
  public static $instance;
  function __construct()
  {
    self::$instance = $this;
    $this->server  = [];
    $this->index = 0;
  }
  public static function getInstance(){
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  function getNextServer(){
    $this->index ++;
    return $this->index % count($this->server);
  }

  function addServer($server){
    array_push($this->server,$server);
  }
}

$roundbin1  = RoundRobin::getInstance();
$roundbin2  = RoundRobin::getInstance();
 if($roundbin1 === $roundbin2){
  echo "True";
 }
else{
  echo "False";
}

$roundbin1->addServer("a");
$roundbin1->addServer("b");
$roundbin1->addServer("c");

printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));
printf("Server ". ($roundbin1->getNextServer() + 1));