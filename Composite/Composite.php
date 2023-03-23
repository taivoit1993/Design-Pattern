<?php

abstract class Component{
  protected $parent;

  public function setParent(?Component $parent){
    $this->parent = $parent;
  }

  public function getParent(){
    return $this->parent;
  }
}