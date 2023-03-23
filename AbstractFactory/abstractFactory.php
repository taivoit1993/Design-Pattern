<?php

abstract class abstractProductFactory{
  public abstract AbstractCar createCar();

}

abstract class AbstractCar
{
}

abstract class AbstractShip
{
  public abstract void Interact(AbstractProductA a);
}
