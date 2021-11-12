<?php

namespace App\Entity;

use App\{
  Interfaces\DrinkInterface,
  Traits\EnforcerTrait
};

abstract class Drink implements DrinkInterface
{
  use EnforcerTrait;

  public const PRICE = 'abstract';
  protected int $price;
  protected int $milkLevel;
  protected int $sugarLevel;

  public function __construct()
  {
    $this->addEnforcer(__CLASS__, get_called_class());
    $this->setPrice(self::PRICE);
  }

  public function setPrice(int $price): self
  {
    $this->price = $price;

    return $this;
  }

  public function getPrice(): int
  {
    return $this->price;
  }

  public function setMilkLevel(int $level): self
  {
    $this->milkLevel = $level;

    return $this;
  }

  public function getMilkLevel(): int
  {
    return $this->milkLevel;
  }

  public function setSugarLevel(int $level): self
  {
    $this->sugarLevel = $level;

    return $this;
  }

  public function getSugarLevel(): int
  {
    return $this->sugarLevel;
  }
}
