<?php

namespace App\Handler;

use App\Entity\{
  Milk,
  Sugar
};

class IngredientHandler
{
  protected Milk $milk;
  protected Sugar $sugar;

  public function __construct()
  {
    $this->setMilk()
      ->setSugar();
  }

  public function getMilkLevel(): int
  {
    return $this->getMilk()->getLevel();
  }

  public function getSugarLevel(): int
  {
    return $this->getSugar()->getLevel();
  }

  public function addMilk(): self
  {
    $this->getMilk()->add();

    return $this;
  }

  public function addSugar(): self
  {
    $this->getSugar()->add();

    return $this;
  }

  public function setMilk(): self
  {
    $this->milk = new Milk();

    return $this;
  }

  public function getMilk(): Milk
  {
    return $this->milk;
  }

  public function setSugar(): self
  {
    $this->sugar = new Sugar();

    return $this;
  }

  public function getSugar(): Sugar
  {
    return $this->sugar;
  }
}
